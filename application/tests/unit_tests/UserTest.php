<?php

require_once 'UnitCaseTest.php';

class UserTest extends UnitCaseTest {

	public function setUp(){ 

 		parent::setUp(); 

 		$this->id = 1;
 		$this->name = "Joao";
 		$this->cpf = "03382175129";
 		$this->email = "joao@joao.com";
 		$this->login = "joao";
 		$this->password = "joao";
 		$this->groups = array(1 => $student);
 		$this->homephone = "32215647";
 		$this->cellphone = "84215647";

 	}

 	public function testIfInstantiateWithValidCPF(){

 		$user = new User($this->id, $this->name, $this->cpf);

	 	$expected =	$user->getCpf();

 		$this->assertEquals($this->cpf, $expected);

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_CPF
     */
 	public function testIfNotInstantiateWithBlankCPF(){

 		$user = new User($this->id, $this->name, "");

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_CPF
     */
 	public function testIfNotInstantiateWithNullCPF(){

 		$user = new User($this->id, $this->name, NULL);
 		
 	}

 	public function testIfInstantiateWithValidEmail(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email);

	 	$expected =	$user->getEmail();

 		$this->assertEquals($this->email, $expected);

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_EMAIL
     */
 	public function testIfNotInstantiateWithBlankEmail(){

 		$user = new User($this->id, $this->name, $this->cpf, "");

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_EMAIL
     */
 	public function testIfNotnstantiateWithNullEmail(){

 		$user = new User($this->id, $this->name, $this->cpf, NULL);
 		
 	}

 	public function testIfInstantiateWithValidLogin(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, $this->login);

	 	$expected =	$user->getLogin();

 		$this->assertEquals($this->login, $expected);

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_LOGIN
     */
 	public function testIfNotInstantiateWithBlankLogin(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, "");

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_LOGIN
     */
 	public function testIfNotInstantiateWithNullLogin(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, NULL);
 		
 	}

 	public function testIfInstantiateWithValidPassword(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, 
 						$this->login, $this->password);

	 	$expected =	$user->getPassword();

 		$this->assertEquals($this->password, $expected);

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_PASSWORD
     */
 	public function testIfNotInstantiateWithBlankPassword(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, $this->login, "");

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_PASSWORD
     */
 	public function testIfNotInstantiateWithNullPassword(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, $this->login, NULL);
 		
 	}

 	public function testIfInstantiateWithValidGroups(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, 
 						$this->login, $this->password, $this->groups);

	 	$expected =	$user->getGroups();

 		$this->assertEquals($this->groups, $expected);

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_GROUP
     */
 	public function testIfNotInstantiateWithBlankGroups(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, $this->login, $this->password, "");

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_GROUP
     */
 	public function testIfNotInstantiateWithNullGroups(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, $this->login, $this->password, NULL);
 		
 	}

 	public function testIfInstantiateWithValidHomePhoneMinLength(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, 
 						$this->login, $this->password, $this->groups, $this->homephone);

	 	$expected =	$user->getHomePhone();

 		$this->assertEquals($this->homephone, $expected);

 	}

 	public function testIfInstantiateWithValidHomePhoneMaxLength(){

 		$homephone = $this->homephone."123";
 		$user = new User($this->id, $this->name, $this->cpf, $this->email, 
 						$this->login, $this->password, $this->groups, $homephone);

	 	$expected =	$user->getHomePhone();

 		$this->assertEquals($homephone, $expected);

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_PHONE
     */
 	public function testIfNotInstantiateWithBlankHomePhone(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, $this->login, $this->password, $this->groups, "");

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_PHONE
     */
 	public function testIfNotInstantiateWithNullHomePhone(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, $this->login, $this->password, $this->groups, NULL);
 		
 	}

 	public function testIfInstantiateWithValidCellPhoneMinLength(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, 
 						$this->login, $this->password, $this->groups, $this->homephone, $this->cellphone);

	 	$expected =	$user->getCellPhone();

 		$this->assertEquals($this->cellphone, $expected);

 	}

 	public function testIfInstantiateWithValidCellPhoneMaxLength(){

 		$cellphone = $this->cellphone."123";
 		$user = new User($this->id, $this->name, $this->cpf, $this->email, 
 						$this->login, $this->password, $this->groups, $this->homephone, $cellphone);

	 	$expected =	$user->getCellPhone();

 		$this->assertEquals($cellphone, $expected);

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_PHONE
     */
 	public function testIfNotInstantiateWithBlankCellPhone(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, $this->login, 
 						$this->password, $this->groups, $this->homephone, "");

 	}

 	/**
     * @expectedException        UserException
     * @expectedExceptionMessage User::NULL_PHONE
     */
 	public function testIfNotInstantiateWithNullCellPhone(){

 		$user = new User($this->id, $this->name, $this->cpf, $this->email, $this->login,
 						 $this->password, $this->groups, $this->homephone, NULL);
 		
 	}

}