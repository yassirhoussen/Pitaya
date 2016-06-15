<?php

/**
 * Copyright (C) 2016 YASSIR HOUSSEN ABDULLAH
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Core\Traits;

use Core\Exceptions\FrameworkException;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

trait SingletonTrait {
	
	private static $instance;
	
	/**
	 * Create the single instance of class
	 *
	 * @param none
	 * @return Object self::$singleInstance Instance
	 */
	public static function getInstance() {
		if(!self::$instance instanceof self) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	/**
	 * Keep the constructor private
	 */
	private function __construct() {
		self::init();
	}
	
	
	/**
	 * Stop serialization
	 *
	 * @throws FrameworkException
	 */
	public function __sleep() {
		throw new FrameworkException('Serializing instances of this class is forbidden.');
	}
	
	/**
	 * Stop serialization
	 *
	 * @throws FrameworkException
	 */
	public function __wakeup() {
		throw new FrameworkException('Serializing and unserializing instances of this class is forbidden.');
	}
	
	/**
	 * Override clone method to stop cloning of the object
	 *
	 * @throws FrameworkException
	 */
	private function __clone() {
		throw new FrameworkException("Cloning is not supported in singleton class.");
	}
	
	/**
	 * Help to override the constructor method in adding any 
	 * specific traitement needed.
	 * It's necessary to overrdie this method in the class using the Trait for 
	 * any specific traitement in the class.
	 * 
	 */
	protected static function init() {}
	
	
	/**
	 * final method to clean up the static object.
	 * This final will reset everything.
	 * 
	 * @return \Core\Traits\SingletonTrait
	 */
	final public static function clean()
	{
		return static::$instance = new static;
	}
}