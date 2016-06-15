<?php

namespace Core;

/*
 * TODO
 * terminer les methodes (CRUD) pour les appels du connecteur 
 * creer une interface CRUD commune a chaque connecteur
 *  DONE - chaque connecteur doit s'assurer que la dataTable exist pour performer les requetes
 *  - transformer les objets en tableau et vis-versa selon le model utilise
 * - ajouter a couchDB la possibitite de joindre deux datatables pour requete : JOIN, LEFT, OUTTER, INNER, RIGHT
 *    http://docs.couchdb.org/en/1.6.1/couchapp/index.html 
 * - helper populate object from array
 * 
 */
if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

use Core\Database\DatabaseManager;
use Core\Exceptions\FrameworkException;
use Core\Exceptions\DatabaseException;


class BaseDao {

	protected $connector 		= null;	
	private   $_dataTable 		= null;
	private   $_typeDataBase 	= null;
	
	/**
	 * construtor is taking two argument. The fist one is the DataTable 
	 * where all the request will be done.
	 * The second one is the database, to load the correct connector.
	 * 
	 * We absolutely need the fisrt one to be sure that the table we are requesting exist.
	 * 
	 * @param string $dataTable
	 * @param string $typeDatabase
	 */
	public function __construct($dataTable, $typeDataBase) {
		$this->setDataTable($dataTable);
		$this->setTypeDataBase($typeDataBase);
		$this->getDatabaseInstance();
	}

	private function getDatabaseInstance() {
		$this->connector =  DatabaseManager::getInstance()->getConnector($this->_typeDataBase);	
		$this->connector->useDatabase($this->_dataTable);
	}
	
	//if id is null then we request all the entries in Datatable
	protected function _read($id = null) {
		if (!is_null($id)) {
			$temp = $this->connector->getDocument($id);
			print_r($temp);
			if (!in_array('error', array_keys($temp)))
				return $this->toObject($temp);
			else 
				throw new DatabaseException('Unable to acess to that document. Please check the id again');
		} else {
			$res = [];
			$a = $this->connector->getAllDocuments();
			foreach ($a as $arr)
				$res[] = $this->toObject($arr);
			return $res;
		}
	}
	
	// $object must not be null. if empty then throw exception
	protected function _insert(&$object) {
		if (!is_object($object))
			throw new FrameworkException("_insert need an object in argument to work");
		else {
			return ( !empty($object->getId()) ? $this->connector->storeDocument($object, $object->getId()) : $this->connector->storeDocument($object) );
		}
	}
	
	// $object must not be null. if empty then throw exception
	// if $object->id is null then find first all the entries with 
	// the method findBy, where criterias will be the object values
	protected function _update(&$object) {
		if (!is_object($object))
			throw new FrameworkException("_update need an object in argument to work");
			else {
				return $this->connector->updateDocument($object->getId(), $object);
			}
	}
	
	// $id must not be null. if empty then throw exception
	protected function _delete($object) {
		if (!is_object($object))
			throw new FrameworkException("_delete need an object in argument to work");
		else {
			return $this->connector->deleteDocument($object->getId());
		}
	}
	
	// criterias is an associative array.
	protected function findBy(&$criterias) {
		
	}
	
	protected function defineViews(&$views) {
		
	}
	
	protected function queryViews(&$criterias) {
		
	}
	
	
	// private method from transforming a data array to 
	// an object
	private function toObject(&$array) {
		if(is_array($array)) {
			$reflect = new \ReflectionClass(MODEL_NAMESPACE . $this->associateModel);
			//get all class properties from model
			$props   = array_map (
							function($prop) {return $prop->getName();},
							$reflect->getProperties( \ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED)
						);
			// get a model instance
			$class= $reflect->newInstance();
			foreach ($array as $key => $value) {
				//echo $key . "<br/>";
				if ($key === '_id')
					$class->{ 'set'.ucfirst('id') } ($value);
				else 
					if (in_array($key, $props) && $key !== 'id')
						$class->{ 'set'.ucfirst($key) } ($value);
			}
			return $class;
		} else 
			throw new FrameworkException("toOBject Method need an array in argument to work");
	}
	
	private function setDataTable($dataTable) {
		$this->_dataTable = $dataTable;
	}
	
	private function setTypeDataBase($typeDataBase) {
		$this->_typeDataBase = $typeDataBase;
	}
	
}