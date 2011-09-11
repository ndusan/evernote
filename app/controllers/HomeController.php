<?php
class HomeController extends Controller

{
    
    public function indexAction()
    {
        //Set session for security reason
        $_SESSION['page'] = 1;
        $_SESSION['token'] = parent::setToken(10);

        //Inject start in db
        
        
    }
    
    public function quizAction($params)
    {
        //Quiz should not start if there is no session token
        if(!parent::checkToken($_SESSION)) parent::redirect ('', '');
        
        if(!empty($params['choice'])){//data posted
            if(parent::isAjax()){
                //Ajax call

                
                
                
            }else{
                //Reglar post call - Ajax off
            
                
                
            }
            $_SESSION['page'] += 1;
        }
        
        parent::set('page', $_SESSION['page']);
        parent::set('token', $_SESSION['token']);
    }
}