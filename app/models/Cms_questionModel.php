<?php

class Cms_questionModel extends Model
{
    
    private $tableLevel = 'levels';
    private $tableQuestion = 'questions';
    private $tableAnswer = 'answers';

    public function getLevels()
    {
        try{
            $query = sprintf("SELECT * FROM %s ORDER BY `rating` ASC", $this->tableLevel);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function findQuestion($id)
    {
        
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableQuestion);
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function findAnswers($questionId)
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
    
    
    public function createQuestion($params)
    {
        try{
            $query = sprintf("INSERT INTO %s SET `title`=:title, `text`=:text, `level_id`=:levelId, `open_field`=:openField", $this->tableQuestion);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':title', $params['question']['title'], PDO::PARAM_STR);
            $stmt->bindParam(':text', $params['question']['text'], PDO::PARAM_STR);
            $stmt->bindParam(':levelId', $params['question']['level_id'], PDO::PARAM_INT);
            
            $openField = ($params['question']['level_id'] > 5 ? 1 : 0);
            $stmt->bindParam(':openField', $openField, PDO::PARAM_INT);
            
            $stmt->execute();
            $newId = $this->dbh->lastInsertId();
            
            $this->updateQuestionAmountOnLevel($params['question']['level_id']);
            
            //Add answers
            foreach($params['answer']['status'] as $key => $status){
                $query = sprintf("INSERT INTO %s SET `text`=:text, `status`=:status, `question_id`=:questionId", $this->tableAnswer);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':text', $params['answer']['text'][$key], PDO::PARAM_STR);
                $stmt->bindParam(':status', $status, PDO::PARAM_STR);
                $stmt->bindParam(':questionId', $newId, PDO::PARAM_INT);
                $stmt->execute();
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function updateQuestion($params)
    {
        try{
            $query = sprintf("UPDATE %s SET `title`=:title, `text`=:text, `level_id`=:levelId, `open_field`=:openField WHERE `id`=:id", $this->tableQuestion);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':title', $params['question']['title'], PDO::PARAM_STR);
            $stmt->bindParam(':text', $params['question']['text'], PDO::PARAM_STR);
            $stmt->bindParam(':levelId', $params['question']['level_id'], PDO::PARAM_INT);
            
            $openField = ($params['question']['level_id'] > 5 ? 1 : 0);
            $stmt->bindParam(':openField', $openField, PDO::PARAM_INT);
            $stmt->bindParam(':id', $params['question']['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $this->updateQuestionAmountOnLevel($params['question']['level_id']);
            
            //Edit answers
            foreach($params['answer']['status'] as $key => $status){
                $query = sprintf("UPDATE %s SET `text`=:text, `status`=:status WHERE `id`=:id AND `question_id`=:questionId", $this->tableAnswer);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':text', $params['answer']['text'][$key], PDO::PARAM_STR);
                $stmt->bindParam(':status', $status, PDO::PARAM_STR);
                $stmt->bindParam(':id', $params['answer']['id'][$key], PDO::PARAM_INT);
                $stmt->bindParam(':questionId', $params['question']['id'], PDO::PARAM_INT);
                $stmt->execute();
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function findQuestions()
    {
        try{
            $query = sprintf("SELECT `a`.`id`, `a`.`title`, `a`.`text`, `a`.`created`, `a`.`status`, `b`.`name`, `b`.`rating` FROM %s AS `a`
                                LEFT JOIN %s AS `b` ON `b`.`id`=`a`.`level_id` ORDER BY `a`.`created` DESC", $this->tableQuestion, $this->tableLevel);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function updateQuestionAmountOnLevel($levelId)
    {
        try{
            //Count for given id
            $query = sprintf("SELECT COUNT(id) AS `total` FROM %s WHERE `level_id`=:levelId", $this->tableQuestion);
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':levelId', $levelId, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch();

            $query = sprintf("UPDATE %s SET `total_questions`=:totalQuestions WHERE `id`=:id", $this->tableLevel);
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':totalQuestions', $result['total'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $levelId, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function updateStatusQuestion($params)
    {
        try{
            $query = sprintf("UPDATE %s SET status=1-status WHERE `id`=:id", $this->tableQuestion);
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
}