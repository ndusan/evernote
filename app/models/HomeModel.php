<?php

class HomeModel extends Model
{
    
    private $tableParticipant = 'participants';
    private $tableQuestion = 'questions';
    private $tableLevel = 'levels';
    private $tableAnswer = 'answers';
    
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
    
    
    
    
    public function getQuestion($page)
    {
        try{
            //Level
            $opt = array('1'=>'1','2'=>'1','3'=>'2','4'=>'2','5'=>'3','6'=>'3','7'=>'4','8'=>'4','9'=>'5','10'=>'5');
            $level = $opt[$page];

            $query = sprintf("SELECT FROM %s AS `a` INNER JOIN %s AS `b` ON `b`.`id`=`a`.`level_id` 
                                WHERE `b`.`rating`=:rating AND `a`.`status`=:status", $this->tableQuestion, $this->tableLevel);
            $stmt = $this->dbh->prepare($query);

            $status = 1;
            $stmt->bindParam(':rating', $level, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getAnswers($questionId)
    {
        try{
            $query = sprintf("SELECT FROM %s WHERE `question_id`=:questionId", $this->tableAnswer);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':questionId', $questionId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
}
