<?php

class HomeModel extends Model
{
    
    private $tableParticipant = 'participants';
    
    public function addParticipant($token, $server = array())
    {
        
        $query = sprintf("INSERT INTO %s SET `token`=:token, `ip`=:ip, `agent`=:agent", $this->tableParticipant);
        $stmt = $this->dbh->prepare($query);

        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->bindParam(':ip', $server['REMOTE_ADDR'], PDO::PARAM_STR);
        $stmt->bindParam(':agent', $server['HTTP_USER_AGENT'], PDO::PARAM_STR);
        $stmt->execute();
        $participantId = $this->dbh->lastInsertId();
        
        
    }
}
