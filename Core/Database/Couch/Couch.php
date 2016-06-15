<?php

namespace Core\Database\Couch;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

use Core\Traits\SingletonTrait;
use Core\Config;
use Core\Database\Couch\CouchDB;
// use Core\Database\ICrud;

class Couch  { //implements ICrud {
	
	use SingletonTrait;	
	
	private $config 	= null;
	protected $couch 	= null;
	
	public function init () {
		$this->config = Config::getInstance()->getDatabaseConfig()->couch;
		$this->couchInstance();
	}

	public function getCouch() {
		return $this->couch;
	}
	
	private function initDns() {
		return $this->config['protocole'].'://'.$this->config['username'].':'.$this->config['password'].'@'.$this->config['host']. ':'. $this->config['port'].'/';
	}
	
	private function couchInstance() {
		$this->couch = new CouchDB($this->initDns());
		foreach ($this->config['database'] as $database)
			if (!$this->couch->databaseExist($database))
				$this->couch->createDatabase($database);		
	}

// 	public function read($id = null) {
// 		if (is_null($id))	
// 			return $this->couch->getAllDocuments();
// 	}
		
// 	public function create($object) {
		
// 	}
// 	public function update($object) { 
		
// 	}
	
// 	public function delete($id) {
		
// 	}
	
// 	public function rawQuery($query) {
		
// 	}
	
// 	public function findBy($criteria) {
		
// 	}
	
// 	// need to make the 
// 	public function setTable($tableName) {
// 		$this->couch->useDatabase($tableName);
// 	}
	
// 	public function setView($view) {
		
// 	}
	
// 	public function viewQuery($viewName, $params) {
		
// 	}
		
}