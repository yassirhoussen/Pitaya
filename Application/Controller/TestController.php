<?php

namespace Application\Controller;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

use Core\BaseController;
use Application\DAO\UserDao;

class TestController extends BaseController {
		
	private $dao = null;
	
	public function index() {
		if (isset($_POST) && !empty($_POST)) 
			$this->doPost();
		else 
			$this->view->render('test');
	}
	
	private function doPost() {
		echo "<pre>";
		echo "method::doPost()<br/>";
		print_r($_POST);
		$this->dao = new UserDao();
		$this->dao->read();
		echo "</pre>";
	}
	
	
	public function doGet() {
		
	}
}