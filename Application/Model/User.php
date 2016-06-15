<?php

namespace Application\Model;

if(!defined('DIRECT_ACCESS')) {
	die("Direct access is forbidden.");
}

use Core\BaseModel;

class User extends BaseModel {
	
	private $id 		= null;
	private $firstName 	= null;
	private $lastName 	= null;
	private $userName 	= null;
	private $email 		= null;
	private $password 	= null;
	private $passwordReset 		= null;
	private $validEmail 		= null;
	private $tokenValidation 	= null;
	private $level 				= null;
	private $position 			= null;
	private $department 		= null;
	private $createdAt 			= null;
	private $accessGranted 		= null;
	private $validateBy 		= null;
	private $validateOn 		= null;
	
	public function __construct() {}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getFirstName(){
		return $this->firstName;
	}
	
	public function setFirstName($firstName){
		$this->firstName = $firstName;
	}
	
	public function getLastName(){
		return $this->lastName;
	}
	
	public function setLastName($lastName){
		$this->lastName = $lastName;
	}
	
	public function getUserName(){
		return $this->userName;
	}
	
	public function setUserName($userName){
		$this->userName = $userName;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function getPassword(){
		return $this->password;
	}
	
	public function setPassword($password){
		$this->password = $password;
	}
	
	public function getPasswordReset(){
		return $this->passwordReset;
	}
	
	public function setPasswordReset($passwordReset){
		$this->passwordReset = $passwordReset;
	}
	
	public function getValidEmail(){
		return $this->validEmail;
	}
	
	public function setValidEmail($validEmail){
		$this->validEmail = $validEmail;
	}
	
	public function getTokenValidation(){
		return $this->tokenValidation;
	}
	
	public function setTokenValidation($tokenValidation){
		$this->tokenValidation = $tokenValidation;
	}
	
	public function getLevel(){
		return $this->level;
	}
	
	public function setLevel($level){
		$this->level = $level;
	}
	
	public function getPosition(){
		return $this->position;
	}
	
	public function setPosition($position){
		$this->position = $position;
	}
	
	public function getDepartment(){
		return $this->department;
	}
	
	public function setDepartment($department){
		$this->department = $department;
	}
	
	public function getCreatedAt(){
		return $this->createdAt;
	}
	
	public function setCreatedAt($createdAt){
		$this->createdAt = $createdAt;
	}
	
	public function getAccessGranted(){
		return $this->accessGranted;
	}
	
	public function setAccessGranted($accessGranted){
		$this->accessGranted = $accessGranted;
	}
	
	public function getValidateBy(){
		return $this->validateBy;
	}
	
	public function setValidateBy($validateBy){
		$this->validateBy = $validateBy;
	}
	
	public function getValidateOn(){
		return $this->validateOn;
	}
	
	public function setValidateOn($validateOn){
		$this->validateOn = $validateOn;
	}
	
	
}