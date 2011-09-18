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
    array(  'url'        => '/^quiz\/extra\/?$/', 
            'controller' => 'home', 
            'action'     => 'extra', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^quiz\/form\/?$/', 
            'controller' => 'home', 
            'action'     => 'form', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^quiz\/score\/?$/', 
            'controller' => 'home', 
            'action'     => 'score', 
            'layout'     => 'default'
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
    array(  'url'        => '/^cms\/users\/?$/', 
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
    //CMS questions page
    array(  'url'        => '/^cms\/questions\/?$/', 
            'controller' => 'cms_question', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/newsletters\/?$/', 
            'controller' => 'cms_newsletter', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/question\/add\/?$/', 
            'controller' => 'cms_question', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/question\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cms_question', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/question\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cms_question', 
            'action'     => 'delete', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/question\/status\/(?P<id>\d*)\/?$/', 
            'controller' => 'cms_question', 
            'action'     => 'status', 
            'layout'     => 'cms'
    ),
);