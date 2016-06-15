<?php

namespace Core;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

//use Core\Traits\SingletonTrait;
use Core\ViewLoader;

class BaseController {
	
	public function __construct() {
		$this->init();
	} 
	
	//use SingletonTrait; // Yes, it will be singleton
	protected $view = null;
	
	public function init () {
		$this->view = ViewLoader::getInstance();
	}
	
	public function getViewLoader() {
		return $this->view;
	}
	
}