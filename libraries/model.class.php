<?php
/**
 * Model
 * @author Dusan Novakovic (ndusan@gmail.com)
 *
 */
class Model
{
        
        protected $_dbHandle;
        
        /**
         * Contructor
         * @return boolean
         */
        function __construct()
        {
                $this->_dbHandle = @mysql_connect(DB_HOST, DB_USER, DB_PASS);
        if ($this->_dbHandle != 0) {
            if (mysql_select_db(DB_NAME, $this->_dbHandle)){
                @mysql_query("SET NAMES 'utf8'", $this->_dbHandle);
                @mysql_query("SET CHARACTER_SET_CLIENT=utf8", $this->_dbHandle);
                @mysql_query("SET CHARACTER_SET_RESULTS=utf8", $this->_dbHandle);
                @mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $this->_dbHandle);
                
                return true;   
            }else{
                
                return false;
            }
        } else{
            
            return false;
        }
        }

        /**
         * Get error string
         * @return string
         */
        function getError() 
        {
        
            return mysql_error($this->_dbHandle);
        }
    
        /**
         * Password generator
         * @param int $len
         * @return string
         */
        function passwordGenerator($len = 6)
        {
                $r = '';
                for($i=0; $i<$len; $i++){
                    $r .= chr(rand(0, 25) + ord('a'));
                }
                
                return $r;
        }

}