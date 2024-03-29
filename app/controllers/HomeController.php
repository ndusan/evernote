<?php
class HomeController extends Controller
{
    
    public function indexAction($params)
    {
        
    }
    
    
    public function quizAction($params)
    {

        if(isset($params['start']) && $params['start'] == 'quiz'){
            $this->createParticipant();
        } 
        
        if(!parent::checkToken($_SESSION['quiz'])) parent::redirect('', 'session_expire');
       
        $displayContent = true;
        
        if(!empty($params['choice']) && parent::isAjax()){//data posted
            
            if(!$this->processStep($params, $_SESSION['quiz'])) parent::redirect('', 'session_expire');
            //Increment page
            $_SESSION['quiz']['page'] += 1;
            
            //If end => check if there is need for extra question
            if($_SESSION['quiz']['page'] > 10){
                $displayContent = false;
                if($this->goToExtraQuestion($_SESSION['quiz'])){
                    //Allow going to extra page
                    $_SESSION['quiz']['extraPage'] = true;
                    $link = 'extra';
                }else{
                    //Allow going to form page
                    $_SESSION['quiz']['formPage'] = true;
                    $link = 'form';
                }
                parent::set('link', $link);
            }
        }
        
        //Get question
        $question = $this->db->getQuestion($_SESSION['quiz']);
        
        parent::set('displayContent', $displayContent);
        parent::set('question', $question);
        parent::set('answers', $this->db->getAnswers($question['id']));
        parent::set('page', $_SESSION['quiz']['page']);
        parent::set('token', $_SESSION['quiz']['token']);
    }
    
    
    public function extraAction($params)
    {
        //Check if user can go to this page
        $this->checkAccess('extraPage', 'not_allowed');
        
        //Allow going to form page
        $_SESSION['quiz']['formPage'] = true;
        
        //Get random question
        $question = $this->db->getExtraQuestion();
        parent::set('question', $question);
        parent::set('page', $_SESSION['quiz']['page']);
        parent::set('token', $_SESSION['quiz']['token']);
    }
    
    
    
    public function formAction($params)
    {
        //Check if user can go to this page
        $this->checkAccess('formPage', 'not_allowed');
        
        if(!empty($params['open_choice'])){//data posted
            
            $this->processExtraStep($params, $_SESSION['quiz']);
        }
        
        //Allow going to form page
        $_SESSION['quiz']['scorePage'] = true;
        
        parent::set('token', $_SESSION['quiz']['token']);
    }
    
    
    
    public function scoreAction($params)
    {
        //Check if user can go to this page
        $this->checkAccess('scorePage');
        
        if(!empty($params['participant'])){//data posted
            
            $this->db->saveParticipant($params['participant'], $_SESSION['quiz']);
        }
        
        parent::set('result', $this->db->getParticipantResult($_SESSION['quiz']));
        
        //Clear session
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
    
    
    private function createParticipant()
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
}