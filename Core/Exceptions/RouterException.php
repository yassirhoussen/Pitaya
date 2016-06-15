<?php
namespace Core\Exceptions;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

use Core\Exceptions\FrameworkException;

class RouterException extends FrameworkException {

	public function __construct($message) {
		parent::__construct($message);
	}
}
