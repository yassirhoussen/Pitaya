<?php 
if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}


function is_https() {
	return
	(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
	|| $_SERVER['SERVER_PORT'] == 443;
}

$base_url = null;

if (isset($_SERVER['SERVER_NAME'])) { 
	if (strpos($_SERVER['SERVER_NAME'], ':') !== FALSE) 
		$server_addr = '['.$_SERVER['SERVER_NAME'].']';
	else
		$server_addr = $_SERVER['SERVER_NAME'];
	
	$base_url = (is_https() ? 'https' : 'http').'://'.$server_addr
	.substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
}
else
	$base_url = 'http://localhost/';



#------------------------- SETTING FOR FRAMEWORK STARTS -------------------------------------------------------#
// default settings
define('DS',		DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systeme.
define('BASE_URL',  $base_url);
define('BASE_PATH', dirname(__DIR__).DS);
define('HOME_DIR', 	pathinfo(BASE_PATH)['basename']);
define('APP_PATH', 	BASE_PATH . 'Application'.DS);
define('CORE_PATH', BASE_PATH . 'Core'.DS);
define('CONF_PATH', BASE_PATH . 'Config'.DS);

// application settings
define('BL_PATH', 			APP_PATH . 'BL'.DS);
define('DAO_PATH', 			APP_PATH . 'DAO'.DS);
define('MODEL_PATH', 		APP_PATH . 'Model'.DS);
define('VIEW_PATH', 		APP_PATH . 'View'.DS);
define('CONTROLLER_PATH', 	APP_PATH . 'Controller'.DS);

//controller specification 
define('CONTROLLER_PREFIX', 	'');
define('CONTROLLER_SUFFIX', 	'Controller');

define('CONTROLLER_NAMESPACE', 	'\\Application\\Controller\\');
define('MODEL_NAMESPACE',		'\\Application\\Model\\');
define('DAO_NAMESPACE',			'\\Application\\Dao\\');
define('BL_NAMESPACE',			'\\Application\\Bl\\');

// Make it blank if you don't need / at the end of your url
define('NEED_SLASH', '/');

define ('MODE', 'DEVELOPMENT');