<?php

namespace Core\Exceptions;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

class FrameworkException extends \Exception {
	
	/**
	 * Override the constructor
	 * @param string $message
	 * @param number $code
	 */
	public function __construct($message = null, $code = 0)	{
		$this->code = $code;
		if (!$message) {
			throw new $this('Unknown '. get_class($this));
		}
		parent::__construct($message, $code);
	}
	
	/**
	 * @see Exception::__toString()
	 */
	public function __toString() {
		return $this->formatMessage(get_class($this), $this->message, $this->file, $this->line, $this->getTraceAsString(), $this->code);
	}
	
	private function formatMessage($class, $message, $file, $line, $stack, $code) {
		return 
			 "class : $class \n"
			. "message: $message\n"
			. "file: $file\n"
			. "line: $line \n"
			. (!empty($stack) ? print_r($stack) : "")
			. (!empty($code) ? print_r($code) : "")
			;
	}
	
}