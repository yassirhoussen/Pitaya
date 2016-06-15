<?php

$config = array();

$config['credential'] = array(
	'author' 		=> 'Yassir Houssen Abdullah',
	'token'			=> ''
);


$config['csrf_token'] = array();

$config['session']	  = array();

// database information
$config['database'] = array(
	'couch'	=> array(
			'protocole' =>  'http',
			'host' 		=> 'localhost',
			'port' 		=> '5984',  //by default
			'username' 	=> 'lyos',
			'password' 	=> 'ab.46ge',
			'database'  => ['sjmrc_client', 'sjmnrc_user', 'sjmnrc_volonteer', 'sjmnrc_event']
	),
	'mysql'	=> array (
			'host' 		=> 'localhost',
			'port'		=> '',
			'dbname' 	=> '',
			'username'  => '',
			'password'	=> ''
			
	)	
);

return $config;