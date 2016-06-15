<?php

namespace Core\Router;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

use Core\Router\AltoRouter;
use Core\Exceptions\RouterException;

class Dispatcher {
	
	private $router 		= null;
	
	function __construct(AltoRouter $router) {
		$this->router = $router;
	}
	
	function handle() {
		$this->router->mapRoute();
		$handler = $this->router->match();
// 		echo "<pre>";
// 			print_r($this->router);
// 			print_r($handler);
// 		echo "</pre>";
		if (!$handler) {
			throw new RouterException("Could not find your resource!");
			return;
		}
		
		/*
		* A sily way to handle to handle the
		* the request from client about everything in the public folder
		*/
		// We check first if the route name request is different than the public one.
		// if it is, we do that as a dispatcher
		// if not it means that we are requesting some simple file 
		// case here the target is array like (c => 'controllerName', a => 'actionName') 
		if ($handler['name'] !== 'public') {
			if(!empty($handler['target'])) {
				$class = new \ReflectionClass(CONTROLLER_NAMESPACE.$handler['target']['c']);				
				$controller = $class->newInstanceArgs();
				if (method_exists($controller, $handler['target']['a']))
					if (!empty($handler['params']))
						call_user_func(array($controller, $handler['target']['a']), $handler['params']);
					else 
						call_user_func(array($controller, $handler['target']['a']));
			}
		} 
		else {
			if (!empty($handler['params'])) {
				$extention = pathinfo($handler['params']['trailing'])['extension']; 
				switch ($extention) {
					case 'css' :
						header("Content-type: text/css", true);
						echo file_get_contents(asset_path() .$handler['params']['trailing']);
						break;
					case 'js':
						header("Content-type: text/javascript", true);
						echo file_get_contents(asset_path() .$handler['params']['trailing']);
						break;
					case 'jpeg':
					case 'jpg' :	
						header("Content-type: image/jpeg", true);
						header('Content-Length: ' . filesize(asset_path() .$handler['params']['trailing']));
						echo file_get_contents(asset_path() .$handler['params']['trailing']);
						break;
					case 'bmp' :
					case 'gif' :
					case 'png' : 
						header("Content-type: image/".$extension , true);
						header('Content-Length: ' . filesize(asset_path() .$handler['params']['trailing']));
						echo file_get_contents(asset_path() .$handler['params']['trailing']);
						break;
				}
				
			}
		}
		
	}
	
}