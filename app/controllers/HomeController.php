<?php
class HomeController extends Controller
{
    
    public function indexAction()
    {
        
        $this->clearSession();
        
        //First time
        $_SESSION['quiz'] = array('page'        => 1, 
                                  'token'       => parent::setToken(10), 
                                  'questions'   => $this->db->getQuestionIds(),
                                  'formPage'    => false,
                                  'extraPage'   => false,
                                  'scorePage'   => false);
        //Inject in DB
        $this->db->addParticipant($_SESSION['quiz']['token'], $_SERVER);
    }
    
    
    
    public function quizAction($params)
    {
        if(!parent::checkToken($_SESSION['quiz'])) parent::redirect ('', 'session_expire');

        if(!empty($params['choice']) && parent::isAjax()){//data posted
            
            if(!$this->processStep($params, $_SESSION['quiz'])) parent::redirect('', 'session_expire');
            //Increment page
            $_SESSION['quiz']['page'] += 1;
            
            //If end => check if there is need for extra question
            if($_SESSION['quiz']['page'] > 10){
                
                if($this->goToExtraQuestion($_SESSION['quiz'])){
                    //Allow going to extra page
                    $_SESSION['quiz']['extraPage'] = true;
                    parent::redirect ('quiz'.DS.'extra', '');
                }else{
                    //Allow going to form page
                    $_SESSION['quiz']['formPage'] = true;
                    parent::redirect ('quiz'.DS.'form', '');
                }
            }
        }
        
        //Get question
        $question = $this->db->getQuestion($_SESSION['quiz']);
        
        parent::set('question', $question);
        parent::set('answers', $this->db->getAnswers($question['id']));
        parent::set('page', $_SESSION['quiz']['page']);
        parent::set('token', $_SESSION['quiz']['token']);
    }
    
    
    
    public function extraAction($params)
    {
        //Check if user can go to this page
        //$this->checkAccess('extraPage', 'not_allowed');
        
        
        
        if(!empty($params['open_choice']) && parent::isAjax()){//data posted
            
            $this->processExtraStep($params, $_SESSION['quiz']);
            
            //Allow going to form page
            $_SESSION['quiz']['formPage'] = true;
            parent::redirect ('quiz'.DS.'form', '');
        }
        
        //Get random question
        $question = $this->db->getExtraQuestion();
        parent::set('question', null);
        parent::set('page', $_SESSION['quiz']['page']);
        parent::set('token', $_SESSION['quiz']['token']);
    }
    
    
    
    public function formAction($params)
    {
        //Check if user can go to this page
        //$this->checkAccess('formPage', 'not_allowed');
        
        
        if(!empty($params['participant']) && parent::isAjax()){//data posted
        
            $this->db->saveParticipant($params['participant'], $_SESSION['quiz']);
            
            //Allow going to form page
            $_SESSION['quiz']['scorePage'] = true;
            parent::redirect ('quiz'.DS.'score', '');
        }
    }
    
    
    
    public function scoreAction($params)
    {
        //Check if user can go to this page
        //$this->checkAccess('scorePage');
        
        parent::set('result', $this->db->getParticipantResult($_SESSION['quiz']));
        
        //Remove session for this user
        $this->clearSession();
    }
    
    
    
    private function checkAccess($page, $msgType = '')
    {
        
        if(!isset($_SESSION['quiz'][$page]) || true !== $_SESSION['quiz'][$page]){
            parent::redirect ('', $msgType);
        }
    }
    
    
    
    private function clearSession()
    {
        
        $_SESSION['quiz'] = null;
    }
    
    
    
    private function goToExtraQuestion($session = array())
    {
        
        //Checkt if user has rights for extra question
        return $this->db->goToExtraQuestion($session);
    }
    
    
    
    private function processStep($params = array(), $session = array())
    {
        
        //Process regular step
        return $this->db->processStep($params, $session);
        
    }
    
    
    
    private function processExtraStep($params = array(), $session = array())
    {
        
        //Process extra step
        $this->db->processExtraStep($params, $session);
    }
}