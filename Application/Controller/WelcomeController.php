<?php

namespace Application\Controller;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

use Core\BaseController;

class WelcomeController extends BaseController {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->view->render('welcome');
	}
	
}