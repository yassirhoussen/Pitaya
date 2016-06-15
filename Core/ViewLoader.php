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

namespace Core;

use Core\Traits\SingletonTrait;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

class ViewLoader {
	use SingletonTrait;
	
	public function __construct() {
		
	}
	
	// render the template file with the current data 
	public function render($_template, $_data = null, $_echo = true) {
		if (file_exists(VIEW_PATH .  $_template.'.php')) {
			// each key of data are now a variable
			if (!is_null($_data) && !empty($_data))
				foreach ($_data as $key => $v) 
					${$key} = $v;
			
			if (!$_echo) 
				ob_start();
			
			require_once(VIEW_PATH .  $_template.'.php');
			
			// Return output
			if(!$_echo) {
				$content = ob_get_contents();
				ob_end_clean();
				return $content;
			}
		} else {
			throw new FrameworkException("Template request do not exist: ". $_template.'.php');
		} 
	}
	
	public function redirect($_template) {
		header("Location: ". VIEW_PATH . $_template);
		exit();
	}
	
	public function redirectWithTime($_template, $time) {
		header("refresh:{$time}; url={.VIEW_PATH . $template}");
		exit;
	}

}
