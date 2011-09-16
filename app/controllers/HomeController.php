<?php
class HomeController extends Controller

{
    
    public function indexAction()
    {
        //Check if session
        if(!isset($_SESSION['quiz'])){
            //First time
            
            $_SESSION['quiz'] = array('page' => 1, 'token' => parent::setToken(10));
            //Inject in DB
            $this->db->addParticipant($_SESSION['quiz']['token'], $_SERVER);
        }else{
            //Same user
            
            $_SESSION['quiz'] = array('page' => 1, 'token' => $_SESSION['quiz']['token']);
            //Inject in DB
            $this->db->addParticipant($_SESSION['quiz']['token'], $_SERVER);
        }
        
        
    }
    
    public function quizAction($params)
    {
        //Quiz should not start if there is no session token
        if(!parent::checkToken($_SESSION['quiz'])) parent::redirect ('', 'warning');
        
        if(!empty($params['choice'])){//data posted
            if(parent::isAjax()){
                //Ajax call

                
                
                
            }else{
                //Reglar post call - Ajax off
            
                
                
            }
            $_SESSION['quiz']['page'] += 1;
        }
        
        parent::set('page', $_SESSION['quiz']['page']);
        parent::set('token', $_SESSION['quiz']['token']);
    }
}