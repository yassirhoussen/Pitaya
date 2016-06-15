<?php

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

$route = array();

/**
 * 
 * How tot define a route
 * HTTP VERBS are : GET, POST, PUT, DELETE, PATCH
 * in the route it's possible to pipe two differents http verbs 
 * $route[] = array($HTTP VERB, $pattern,  array (c => controller, a => action), $nameRoute);
 */ 

// never ever delete that route
//*==============*/ $route[] = array('GET', '/public/[**:trailing]', null, 'public');
// never ever delete that

$route[] = array ('GET', '/', array('c' => 'WelcomeController', 'a' => 'index'), 'home');

$route[] = array ('GET|POST', '/user/login', array('c' => 'UserController', 'a' => 'login'), 'userLogin');

$route[] = array ('GET|POST', '/user/lostpassword', array('c' => 'UserController', 'a' => 'lostPassword'), 'userLostPasseword');
$route[] = array ('GET|POST', '/user/validate/[**:trailing]', array('c' => 'UserController', 'a' => 'validateAccount'), 'userValidateAccount');

$route[] = array ('POST', '/users/[i:id]', array('c' => 'WelcomeController', 'a' => 'postData'), 'postHome');
$route[] = array ('GET','/users/[i:id]/[a:delete]', array('c' => 'WelcomeController', 'a' => 'delete'), 'userHome');

// test route
$route[] = array ('GET|POST', '/test', array('c' => 'TestController', 'a' => 'index'), 'testHome');
// test route

return $route;