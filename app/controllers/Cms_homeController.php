<?php

class Cms_homeController extends Controller
{    

    public function indexAction($params)
    {
        
        
        parent::set('participantCollection', $this->db->findParticipants($params));
    }
    
}