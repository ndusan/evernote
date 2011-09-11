<?php
//Site
define('SITE', 'http://evernote.localhost');
//App root
define('APP_ROOT', '');
define('IN_DEV', true);

//DB params
define('DB_HOST', 'localhost');
define('DB_NAME', 'evernote');
define('DB_USER', 'root');
define('DB_PASS', '');

define('BASE_PATH', SITE.DS.APP_ROOT);

//Cookie life (by default 15min)
define('COOKIE_LIFE', 15*60*60);

//Paths
define('CONTROLLER_PATH', 'app'.DS.'controllers'.DS);
define('MODEL_PATH', 'app'.DS.'models'.DS);
define('VIEW_PATH', 'app'.DS.'views'.DS);
define('LAYOUT_PATH', 'app'.DS.'views'.DS.'layout'.DS);

//Logs
define('LOG_PATH', 'tmp'.DS.'logs'.DS);

//Public paths
define('IMAGE_PATH', DS.'public'.DS.'images'.DS);
define('CSS_PATH', DS.'public'.DS.'css'.DS);
define('JS_PATH', 'public'.DS.'js'.DS);

//Assets
define('ASSETS_CSS_PATH', DS.'public'.DS.'assets'.DS.'css'.DS);
define('ASSETS_JS_PATH', DS.'public'.DS.'assets'.DS.'js'.DS);

//Cache properties
define('TIME_TO_LIVE_CACHE', 60);
define('CACHE_PATH', 'tmp'.DS.'cache'.DS);