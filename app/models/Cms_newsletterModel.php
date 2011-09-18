<?php

class Cms_newsletterModel extends Model
{
    private $tableParticipant = 'participants';
    private $tableParticipantQuestion = 'participant_question';
    
    
    public function findParticipantsForNewsletter($params)
    {
        try{
            $query = sprintf("SELECT `a`.* FROM %s AS `a` 
                                INNER JOIN %s AS `b` ON `b`.`participant_id`=`a`.id
                                WHERE `a`.`newsletters`='1' GROUP BY `a`.`id`",
                                $this->tableParticipant,
                                $this->tableParticipantQuestion
                    );
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
}
