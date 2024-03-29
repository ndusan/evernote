<?php

/**
 * Default controller
 * @author Dusan Novakovic (ndusan@gmail.com)
 *
 */
class Controller
{

        protected $_template;
        protected $db;
        
        public $renderHTML = 1;
        
        /**
         * Constructor
         * @param String $controller
         * @param String $action
         * @param String $layout
         * @return void
         */
        public function __construct($controller, $action, $layout)
        {
                
                //Check if cms for session
                if($layout == 'cms')
                {
                    $this->userInfoAndSession();
                }
                
                //Model file
                $modelFile = ucfirst($controller)."Model.php";
                $modelName = ucfirst($controller)."Model";
                
                //Create model object
                if(file_exists('libraries'.DS.'model.class.php')) require_once 'libraries'.DS.'model.class.php';
                
                if(file_exists(MODEL_PATH.$modelFile)) require_once MODEL_PATH.$modelFile;
                $this->db = new $modelName;

                //Create template object
                if(file_exists('libraries'.DS.'template.class.php')) require_once 'libraries'.DS.'template.class.php';
                $this->_template = new Template($controller, str_replace('Action', '', $action), $layout);

        }
        
        /**
         * Check session
         * @return void
         */
        public function userInfoAndSession()
        {
            if(!isset($_SESSION['cms'])){
                $this->redirect(BASE_PATH.'login'.DS, '');
            }
            
        }
        
        public function getSession()
        {
            
            return $_SESSION['cms'];        
        }
        
        /**
         * Set variables
         * @param String $name
         * @param Array $value
         * @return void
         */
        public function set($name, $value)
        {
                $this->_template->set($name, $value);
        }
        
        /**
         * Default array of css files
         * @param $array
         * @return void
         */
        public function defaultCss($array)
        {
                $this->_template->defaultCss($array);
        }
        
        /**
         * Default array of js files
         * @param $array
         * @return void
         */
        public function defaultJs($array)
        {
                $this->_template->defaultJs($array);
        }
        
        /**
         * Redirect
         * @param String $url
         * @return void
         */
        public function redirect($url, $msg)
        {

                $url = "Location: ".BASE_PATH.(empty($url) ? '' : $url.DS).(isset($msg) && !empty($msg) ? '?q='.$msg : "");
                header($url);
                exit;
        }
        
        /**
         * Desctructor
         * @return void
         */
        public function __destruct()
        {
                $this->_template->render($this->renderHTML);
        }
        
        /**
         * Set status
         * @param type $status 
         */
        public function setRenderHTML($status)
        {
                $this->renderHTML = $status;
        }
        
        /**
         * Is ajax
         * @return type 
         */
        protected function isAjax()
        {

            return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ? true : false;
        }
        
        
        protected function setToken($length = "")
        {	
            $code = md5(uniqid(rand(), true));
            if ($length != ""){
                
                return substr($code, 0, $length).'-'.time();
            }else{
                
                return $code.'-'.time();
            }
        }
        
        protected function checkToken($session)
        {
            
            return isset($session['token']) && !empty($session['token']) ? true : false; 
        }
}