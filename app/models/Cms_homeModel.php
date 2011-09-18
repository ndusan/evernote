<?php

class Cms_homeModel extends Model
{
    private $tableParticipant = 'participants';
    private $tableParticipantQuestion = 'participant_question';
    
    
    public function findParticipants($params)
    {
        try{
            $query = sprintf("SELECT `a`.* FROM %s AS `a` 
                                INNER JOIN %s AS `b` ON `b`.`participant_id`=`a`.id
                                GROUP BY `a`.`id`",
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
