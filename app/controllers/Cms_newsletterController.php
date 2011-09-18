<?php

class Cms_newsletterController extends Controller
{    

    public function indexAction($params)
    {
        
        parent::set('participantCollection', $this->db->findParticipantsForNewsletter($params));
    }
    
}