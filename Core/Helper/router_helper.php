<?php

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

use Core\Router\AltoRouter;

if (! function_exists( 'router_generate' ) ) {
	function router_generate($routeName) {
		return AltoRouter::getInstance()->generate($routeName);
	}
}

if (! function_exists( 'route')) {
	function route($routeName) {
		return substr(BASE_URL, 0, -1) . router_generate($routeName);
	}
}
