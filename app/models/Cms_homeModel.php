<?php

class Cms_homeModel extends Model
{
    private $tableParticipant = 'participants';
    private $tableParticipantQuestion = 'participant_question';
    
    
    public function findParticipants($params)
    {
        try{
            $query = sprintf("SELECT `a`.*, `b`.`open_answer` FROM %s AS `a` 
                                INNER JOIN %s AS `b` ON `b`.`participant_id`=`a`.id
                                WHERE `a`.`registered`=:registered GROUP BY `a`.`id`",
                                $this->tableParticipant,
                                $this->tableParticipantQuestion
                    );
            
            $registered = 'known';
            
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':registered', $registered, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
}
