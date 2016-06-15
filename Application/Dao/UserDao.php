<?php

namespace Application\Dao;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

use Core\BaseDao;
use Application\Model\User;

class UserDao extends BaseDao {
	
	// Mandatory to know, never, ever change the name of this 3 variables
	protected $associateModel 	= 'User';
	private $typeDataBase 		= 'couch';
	private $dataTable  		= 'sjmnrc_user';
	
	
	public function __construct() {
		parent::__construct($this->dataTable, $this->typeDataBase);
	}
	
	/*
	 * CRUD - METHOD
	 */
	public function read($id = null) {
		return	$this->_read($id);
	}
	
	public function update(&$object) {
		return	$this->_update($object);
	}
	
	public function create(&$object) {
		return $this->_insert($object);
	}
	
	public function delete(&$object) {
		return $this->_delete($object);
	}
	
	/*
	 *OTHER METHODS - SEE the BASE DAO CLASS 
	 */
}
