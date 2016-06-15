<?php

namespace Application\Controller;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

use Core\BaseController;

class UserController extends BaseController {
	
	public function __construct() {
		parent::__construct();
	}
	
	
	public function login($param = null) {
		if (isset ($_POST) && !empty($_POST))
			$this->doLogin();
		else
			$this->view->render('user/login');
	}
	
	public function doLogin($param = null) {
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		$this->view->render('user/login');
	}
	
	public function lostPassword($param = null) {
		if (isset ($_POST) && !empty($_POST))
			$this->doLost();
		else
			$this->view->render('user/lost');
	}
	
	public function doLost($param = null) {
		
	}
}