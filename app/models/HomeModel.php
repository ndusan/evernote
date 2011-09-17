<?php

class HomeModel extends Model
{
    
    private $tableParticipant = 'participants';
    private $tableQuestion = 'questions';
    private $tableLevel = 'levels';
    private $tableAnswer = 'answers';
    private $tableParticipantQuestion = 'participant_question';
    
    public function addParticipant($token, $server = array())
    {
        try{
            $query = sprintf("INSERT INTO %s SET `token`=:token, `ip`=:ip, `agent`=:agent", $this->tableParticipant);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':token', $token, PDO::PARAM_STR);
            $stmt->bindParam(':ip', $server['REMOTE_ADDR'], PDO::PARAM_STR);
            $stmt->bindParam(':agent', $server['HTTP_USER_AGENT'], PDO::PARAM_STR);
            $stmt->execute();
            $participantId = $this->dbh->lastInsertId();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getQuestionIds()
    {
        try{
            
            //Select possible IDs
            $query = sprintf("SELECT `a`.`id`, `b`.`rating` FROM %s AS `a` LEFT JOIN %s AS `b` ON `b`.`id`=`a`.`level_id`
                                WHERE `a`.`status`=:status AND `a`.`open_field`=:openField
                                ORDER BY `b`.`rating` ASC", $this->tableQuestion, $this->tableLevel);
            $stmt = $this->dbh->prepare($query);
            
            $status = 1;
            $openField = 0;
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->bindParam(':openField', $openField, PDO::PARAM_INT);
            $stmt->execute();
            
            $results = $stmt->fetchAll();
            
            if(empty($results)) return false;
            
            $output = array();
            foreach($results as $r){
                $output[$r['rating']][] = $r['id'];
            }

            foreach ($output as $key=>$val){
                if(count($val)>1){
                    $tmpKeyArray = array_rand($val, 2);
                }else{
                    //There min one question for this level rating
                    $tmpKeyArray = array('0'=>'0','1'=>'0');
                }
                $output[$key] = array($val[$tmpKeyArray[0]], $val[$tmpKeyArray[1]]);
            }

            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getQuestion($session = array())
    {
        try{
            //Page => Level rating
            $opt = array('1'=>'1', '2'=>'1','3'=>'2','4'=>'2','5'=>'3','6'=>'3','7'=>'4','8'=>'4','9'=>'5','10'=>'5');
            
            $realPage = $session['page'];
            $mappingPage = $opt[$realPage];//there are 2pages for same level question
            $questionNum = $realPage%2;
            
            //If no question set
            if(!isset($session['questions'][$mappingPage][$questionNum])) return false;
            
            $questionId = $session['questions'][$mappingPage][$questionNum];

            //Select possible IDs excluding those that are already used
            $query = sprintf("SELECT `a`.* FROM %s AS `a` LEFT JOIN %s AS `b` ON `b`.`id`=`a`.`level_id`
                                WHERE `a`.`id`=:questionId", $this->tableQuestion, $this->tableLevel);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':questionId', $questionId, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    
    public function getAnswers($questionId)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `question_id`=:questionId", $this->tableAnswer);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':questionId', $questionId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getExtraQuestion()
    {
        try{
            $query = sprintf("SELECT `a`.* FROM %s AS `a` LEFT JOIN %s AS `b` ON `b`.`id`=`a`.`level_id`
                                WHERE `b`.`rating`=:rating ORDER BY RAND() LIMIT 0,1", $this->tableQuestion, $this->tableLevel);
            $stmt = $this->dbh->prepare($query);
            
            //This is hardcoded
            $rating = 11;
            
            $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function goToExtraQuestion($session = array())
    {
     
        //Check if participant has all correct answers
        return $this->getAmountOfCorrectAnswers($session) >= 10 ? true : false;
    }
    
    
    
    public function processStep($params = array(), $session = array())
    {
        
        try{
            
            $participantId = $this->getParticipant($session['token']);
            
            //Inject response
            $query = sprintf("INSERT INTO %s SET `participant_id`=:participantId, 
                                                 `question_id`=:questionId,
                                                 `status`=:status", $this->tableParticipantQuestion);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':participantId', $paticipantId, PDO::PARAM_INT);
            $stmt->bindParam(':questionId', $params['q_id'], PDO::PARAM_INT);
            $stmt->bindParam(':status', $this->checkAnswer($params['choice']), PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
        
    }
    
    
    
    public function processExtraStep($params = array(), $session = array())
    {
        
        try{

            $paticipantId = $this->getParticipant($session['token']);
            
            //Inject response
            $query = sprintf("INSERT INTO %s SET `participant_id`=:participantId, 
                                                 `question_id`=:questionId,
                                                 `status`=:status,
                                                 `open_answer`=:openAnswer", $this->tableParticipantQuestion);
            $stmt = $this->dbh->prepare($query);

            $status = 'correct';
            
            $stmt->bindParam(':participantId', $paticipantId, PDO::PARAM_INT);
            $stmt->bindParam(':questionId', $params['q_id'], PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':openAnswer', $params['open_choice'], PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    
    public function saveParticipant($participant = array(), $session = array())
    {
        try{
            $query = sprintf("UPDATE %s SET `firstname`=:firstname, `lastname`=:lastname, `email`=:email, `location`=:location
                                `tac`=:tac, `newsletters`=:newsletters, `registered`=:registered 
                                `correct_amount`=:correctAmount WHERE `token`=:token", $this->tableParticipant);
            $stmt = $this->dbh->prepare($query);

            $tac = (!empty($participant['tac']) ? 1 : 0);
            $newsletters = (!empty($participant['newsletters']) ? 1 : 0);
            $registered = 'known';
            
            $correctAmount = $this->getAmountOfCorrectAnswers($session);
            
            $stmt->bindParam(':firstname', $participant['firstname'], PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $participant['lastname'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $participant['email'], PDO::PARAM_STR);
            $stmt->bindParam(':location', $participant['location'], PDO::PARAM_STR);
            $stmt->bindParam(':tac', $tac, PDO::PARAM_INT);
            $stmt->bindParam(':newsletters', $neswletters, PDO::PARAM_INT);
            $stmt->bindParam(':registered', $registered, PDO::PARAM_STR);
            $stmt->bindParam(':correctAmount', $correctAmount, PDO::PARAM_INT);
            $stmt->bindParam(':token', $session['token'], PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getParticipantResult($session = array())
    {
        try{
            $query = sprintf("SELECT `b`.*, COUNT(`a`.*) AS `sum` FROM %s AS `a` INNER JOIN %s AS `b` ON `b`.`id`=`a`.`participan_id`
                                WHERE `b`.`token`=:token", $this->tableParticipantQuestion, $this->tableParticipant);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':token', $session['token'], PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    private function getAmountOfCorrectAnswers($session = array())
    {

        try{
            $query = sprintf("SELECT COUNT(`a`.*) AS `sum` FROM %s AS `a` INNER JOIN %s AS `b` ON `b`.`id`=`a`.`participan_id`
                                WHERE `b`.`token`=:token", $this->tableParticipantQuestion, $this->tableParticipant);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':token', $session['token'], PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch();
            
            return $result['sum'];
        }catch(Exception $e){
            
            return 0;
        }
    }
    
    
    
    private function checkAnswer($answerId = 0)
    {
        try{
            $query = sprintf("SELECT `status` FROM %s WHERE `id`=:answerId", $this->tableAnswer);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':answerId', $answerId, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch();
            
            return $result['status'];
        }catch(Exception $e){
            
            return 'wrong';
        }
    }
    
    
    private function getParticipant($token)
    {
        
        try{
            $query = sprintf("SELECT `id` FROM %s WHERE `token`=:token", $this->tableParticipant);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':token', $token, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
}
