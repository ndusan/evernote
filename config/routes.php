<?php
$routes = array(
    //Home page
    array(  'url'        => '/^\/?$/', 
            'controller' => 'home', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^quiz\/?$/', 
            'controller' => 'home', 
            'action'     => 'quiz', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^quiz.json\/?$/', 
            'controller' => 'home', 
            'action'     => 'quiz', 
            'layout'     => 'ajax'
    ),
    //Login page
    array(  'url'        => '/^login\/?$/', 
            'controller' => 'login', 
            'action'     => 'index', 
            'layout'     => 'login'
    ),
    //Logout page
    array(  'url'        => '/^logout\/?$/', 
            'controller' => 'login', 
            'action'     => 'logout', 
            'layout'     => 'empty'
    ),
    //CMS home page
    array(  'url'        => '/^cms\/?$/', 
            'controller' => 'cms_home', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    //CMS user page
    array(  'url'        => '/^cms\/user\/?$/', 
            'controller' => 'cms_user', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/user\/add\/?$/', 
            'controller' => 'cms_user', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/user\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cms_user', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/user\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cms_user', 
            'action'     => 'delete', 
            'layout'     => 'cms'
    ),
);