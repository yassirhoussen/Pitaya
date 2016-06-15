<?php

namespace Core\Database;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

use Core\Traits\SingletonTrait;
use Core\Database\DatabaseFactory;


class DatabaseManager {
	
	use SingletonTrait;
	
	private static $databaseFactory = null;
	private static $isLoaded = FALSE;
	
	public function init() {
		if (!self::$isLoaded)  {
			self::$databaseFactory = new DatabaseFactory();
			self::$isLoaded = true;
		}
	}
	
	public function getConnector($database = null) {
		!is_null($database) ? self::$databaseFactory->setTypeDatabase(strtolower($database)) : ''; 
		return self::$databaseFactory->getConnector();
	}
}