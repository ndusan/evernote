<?php

class Cms_homeModel extends Model
{
    private $tableParticipant = 'participants';
    private $tableParticipantQuestion = 'participant_question';
    private $tableQuestion = 'question';
    
    
    public function findParticipants($params)
    {
        try{
            $query = sprintf("SELECT `a`.* FROM %s AS `a` 
                                LEFT JOIN %s AS `b` ON `b`.`participant_id`=`a`.id
                                LEFT JOIN %s AS `c` ON `c`.`id`=`b`.`question_id`",
                                $this->tableParticipant,
                                $this->tableParticipantQuestion,
                                $this->tableQuestion
                    );
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
}
