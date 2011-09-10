<?php
/**
 * HTML 
 * @author Dusan Novakovic (ndusan@gmail.com)
 *
 */
class HTML
{
        
        /**
         * Custom made css
         * @param array $array
         * @return string
         */
        function customCss($array)
        {
                $string = "";
                if(isset($array) && !empty($array))
                for($i=0; $i<count($array); $i++){
                        $string .= $this->css($array[$i]);
                }
                
                return $string;
        }
        
        /**
         * Include JS
         * @param $fileName
         * @return string
         */
        function customJs()
        {
                $string = '';
                foreach (glob(JS_PATH.'*.js') as $fileName)
                {
                    $string .= "<script src='/".$fileName."' type='text/javascript'></script>\n";
                }

                return $string;
        }


        /**
         * Include CSS
         * @param $fileName
         * @return string
         */
        function css($fileName) 
        {
                $data = "<link href='".CSS_PATH.$fileName.".css' rel='stylesheet' type='text/css'/>\n";
                
                return $data;
        }
        
        /**
         * Include JS
         * @param $fileName
         * @return string
         */
        function js($fileName) 
        {
                $data = "<script src='".ASSETS_JS_PATH.$fileName."' type='text/javascript'></script>\n";
                
                return $data;
        }
        
        /**
         * Display message
         * @param String $text
         * @return String
         */
        function msg($text)
        {
                
                if(!isset($text) || empty($text))
                {
                    
                    return false;
                }
                
                $txt = "";
                switch($text){
                        //Error
                        case 'error':
                                                $txt = "<div class='error'>".ERROR_MSG."</div>";
                                                break;
                        //Success
                        case 'success':
                                                $txt = "<div class='success'>".SUCCESS_MSG."</div>";
                                                break;
                        default:        
                                                $txt = "<div class='error'>".$text."</div>";
                                                break;
                }
                
                return $txt;
        }
}
