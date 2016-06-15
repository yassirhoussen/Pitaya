<?php

namespace Core;
use Core\Traits\SingletonTrait;

class Loader {
	
	use SingletonTrait;
	private static $DirectoryContent = null;
	private $helperDirectory = CORE_PATH . 'Helper' . DS;
	
	
	private function init() {
		self::$DirectoryContent = $this->directoryToArray($this->helperDirectory);
	}
	
	public function loadHelper() {
		foreach (self::$DirectoryContent as $file)
			require $file;
	}
	
	public function loadLibraries() {
		
	}
	
	/**
	 * Get an array that represents directory tree
	 * @param string $directory     Directory path
	 * @param bool $recursive       Include sub directories
	 * @param bool $listDirs        Include directories on listing
	 * @param bool $listFiles       Include files on listing
	 * @param regex $exclude        Exclude paths that matches this regex
	 */
	private function directoryToArray($directory, $recursive = true, $listDirs = true, $listFiles = true, $exclude = '') {
		$arrayItems = array();
		$skipByExclude = false;
		$handle = opendir($directory);
		if ($handle) {
			while (false !== ($file = readdir($handle))) {
				preg_match("/(^(([\.]){1,2})$|(\.(svn|git|md))|(Thumbs\.db|\.DS_STORE))$/iu", $file, $skip);
				if($exclude){
					preg_match($exclude, $file, $skipByExclude);
				}
				if (!$skip && !$skipByExclude) {
					if (is_dir($directory. DS . $file)) {
						if($recursive) {
							$arrayItems = array_merge($arrayItems, directoryToArray($directory. DS . $file, $recursive, $listDirs, $listFiles, $exclude));
						}
						if($listDirs){
							$file = $directory . DS . $file;
							$arrayItems[] = $file;
						}
					} else {
						if($listFiles){
							$file = $directory . DS . $file;
							$arrayItems[] = $file;
						}
					}
				}
			}
			closedir($handle);
		}
		return $arrayItems;
	}
	
}