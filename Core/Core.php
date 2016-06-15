<?php

namespace Core;
use Core\Router\AltoRouter;
use Core\Router\Dispatcher;
use Core\Loader;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

class Core {
	
	public function __construct() {}
	
	public function start() {
		$router = AltoRouter::getInstance(); 
		
		// load all helper and libraries
		Loader::getInstance()->loadHelper();
		
		// start the front controller, who is charge of
		// responding the request done by the router
		$dispatcher = new Dispatcher($router);
		$dispatcher->handle();
	}
	
}
// load the loader

// load all the helpers

// load the Config object

// load the Router, Controller, the BL, the DAO Factory, the ViewLoader
