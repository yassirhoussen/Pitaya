<?php

namespace Core;
use Core\Traits\SingletonTrait;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

class Config {
	
	use SingletonTrait;
	
	/**
	 * List of all loaded config value
	 *
	 * @var	array
	 */
	private $config = null;
	
	/**
	 * List of all loaded config files
	 *
	 * @var	boolean
	 */
	private $is_loaded =	false;
	
	public function init() {
		$this->config = (object) require_once BASE_PATH . 'Config' . DS . 'config.php';
	}
	
	public function getConfig() {
		return $this->config;
	}
	
	public function getDatabaseConfig() {
		return (object) $this->config->database;
	}

}