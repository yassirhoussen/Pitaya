<?php

namespace Core;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

abstract class BaseModel implements \JsonSerializable {
	
	public function __construct() {}
	
	public function jsonSerialize() {
		$reflect = new \ReflectionClass($this);
		$array = [];
		$props   = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED);
		foreach ($props as $prop) {
			$array[$prop->name] = $this->{'get'.ucfirst($prop->name)}();
		}
		return $array;
	}
}