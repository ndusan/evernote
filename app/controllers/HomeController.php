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
        if(!parent::checkToken($_SESSION['quiz'])) parent::redirect ('', 'session_expire');
        
        //Get question
        $question = $this->db->getQuestion($_SESSION['quiz']['page']);
        parent::set('question', $question);
        parent::set('answers', $this->db->getAnswers($question['id']));
        
        if(!empty($params['choice']) && parent::isAjax()){//data posted
            
            if(!$this->processStep($params, $_SESSION['quiz'])) parent::redirect('', 'session_expire');
            $_SESSION['quiz']['page'] += 1;
        }
        
        parent::set('page', $_SESSION['quiz']['page']);
        parent::set('token', $_SESSION['quiz']['token']);
    }
    
    
    
    
    public function processStep($params = array(), $session = array())
    {
        
        
    }
}