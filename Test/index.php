<?php

define("DIRECT_ACCESS", TRUE);

require_once("../Config/define.php");
require_once '../Autoloader.php';
Autoloader::register();

require_once CORE_PATH . 'Helper/utils.php';

if (MODE === "DEVELOPMENT") {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

use Core\Database\DatabaseManager;
use Application\Dao\UserDao;
use Application\Model\User;

echo "<pre>";
// create object with random data
$temp = new User();
$reflect = new ReflectionClass($temp);
$props   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED);
foreach ($props as $prop) {
	if ($prop->name !== 'id') {
		$set = 'set'.ucfirst($prop->name);
		$temp->{'set'.ucfirst($prop->name)}(randomString());
	}
}
//########################################## CRUD METHOD DAO###############################################
// echo "random object created <br/>";

// $userDao = new UserDao();
// test DAO create
// set id to 111111 to finding it simply
// echo ">>>>> CREATE >>>> <br/>";
// $temp->setId('11111');
// echo ">>>>> obect to create >>>> <br/>";
// print_r($temp);
// $r = $userDao->create($temp);
// echo ">>>>> result method >>>> <br/>";
// print_r($r);
// // test read
// echo ">>>>> READ >>>> <br/>";
// $r = $userDao->read('11111');
// echo ">>>>> object read >>>> <br/>";
// print_r($r);
// echo ">>>>>> UPDATE >>>>> <br/>";
// $r->setFirstName('TEST 1234');
// echo ">>>>> obect to update >>>> <br/>";
// print_r($r);
// $temp = $r;
// $r = $userDao->update($r);
// echo ">>>>> result method >>>> <br/>";
// print_r($r);
// echo ">>>>>> DELETE >>>>> <br/>";
// echo ">>>>> object to delete >>>> <br/>";
// print_r($temp);
// $r = $userDao->delete($temp);
// echo ">>>>> result method >>>> <br/>";
// print_r($r);
// $r = $userDao->read('11111');
// echo ">>>>> object read >>>> <br/>";
// print_r($r);
// die();
//########################################## CRUD METHOD DAO###############################################

//########################################## VIEW METHOD ###############################################

$connector = DatabaseManager::getInstance()->getConnector('couch');
$connector->useDatabase('sjmnrc_user');
$designDocumentName = '_design/view';
$viewName 			= 'toto';
$viewFn = 'function(doc) { emit(doc.id, doc._rev); }';
$connector->queryView($designDocumentName, $viewName);
