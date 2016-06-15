<?php

namespace Core\Database;

use Core\Database\Couch\Couch;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

class DatabaseFactory {
	
	private $connector 		= null;
	private $typeDatabase 	= null;
	
	public function __construct($database = null) {
		$this->typeDatabase = !is_null($database) ? strtolower($database) : 'couch'; 
	}
	
	// return the current connector used for the request database
	public function getConnector() {
		$this->initConnector();
		return $this->connector;
	}
	
	public function setTypeDatabase($db) {
		$this->typeDatabase = $db;
	}
	
	// factory method to init and get the connector
	private function initConnector() {
		switch ($this->typeDatabase) {
			case 'couch' :
				$this->connector = Couch::getInstance()->getCouch();
				break;
			case 'mysql' : 
				break;
		}
		
	}
}
