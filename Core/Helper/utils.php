<?php

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

// convert object to 
if ( ! function_exists('convertToObject') ) {
	function convertToObject(&$array) {
		$object = new stdClass();
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				$value = convertToObject($value);
			}
			$object->$key = $value;
		}
		return $object;
	}
}

if (! function_exists( 'toAssociativeArray' )) {
	function toAssociateArray(&$object) {
		return json_decode(json_encode($object), true);
	}
}

if (! function_exists( 'randomString' )) {
	function randomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
}
}
