<?php

require_once(APPPATH."/exception/UserException.php");
require_once(APPPATH."/data_types/basic/Phone.php");

class User{

	const INVALID_ID = "O ID do usuário informado é inválido. O ID deve ser maior que zero.";
	const INVALID_NAME = "O nome do usuário informado é inválido. Deve conter apenas caracteres alfabéticos e espaços em branco.";
	const NULL_CPF = "O CPF não pode ser nulo ou vazio.";
	const NULL_EMAIL = "O email não pode ser nulo ou vazio.";
	const NULL_LOGIN = "O login não pode ser nulo ou vazio.";
	const NULL_PASSWORD = "A senha não pode ser nula ou vazia.";
	const NULL_PHONE = "O telefone não pode ser nulo ou vazio.";
	const NULL_GROUP = "Os grupos não podem ser nulos ou vazios.";
	const MINIMUN_ID = 1;

	private $id;
	private $name;
	private $cpf;
	private $email;
	private $login;
	private $password;
	private $groups;
	private $homePhone;
	private $cellPhone;
	
	public function __construct($id, $name, $cpf = FALSE, $email = FALSE, $login = FALSE, $password = FALSE, $groups = FALSE, $homePhone = FALSE, $cellPhone = FALSE){
		$this->setId($id);
		$this->setName($name);
		$this->setCpf($cpf);
		$this->setEmail($email);
		$this->setLogin($login);
		$this->setPassword($password);
		$this->setGroups($groups);
		$this->setHomePhone($homePhone);
		$this->setCellPhone($cellPhone);
	}
	
	// public function addGroup($group){
	// 	if(is_object($group)){
	// 		if(get_class($group) === Group::class){
	// 			$this->groups[] = $group;
	// 		}else{
	// 			throw new UserException(self::INVALID_GROUP);
	// 		}
	// 	}else{
	// 		throw new UserException(self::INVALID_GROUP);
	// 	}
	// }

	// Setters
	private function setId($id){
		// Id must be a number or a string number
		if(is_numeric($id)){
			// Id must be greater than zero
			if($id >= self::MINIMUN_ID){
				$this->id = $id;
			}else{
				throw new UserException(self::INVALID_ID);
			}
		}else{
			throw new UserException(self::INVALID_ID);
		}
	}

	public function setName($name){
		if(is_string($name)){
			if(!empty($name)){
				// Split the first, middle and last name into a array
				$nameParts = explode(" ", $name);
				$nameIsOk = TRUE;
				foreach($nameParts as $part){
					// Check if is only letters
					if(ctype_alpha($part)){
						continue;
					}else{
						$nameIsOk = FALSE;
						break;
					}
				}
				if($nameIsOk){
					$this->name = $name;
				}else{
					throw new UserException(self::INVALID_NAME);
				}
			}else{
				throw new UserException(self::INVALID_NAME);
			}
		}else{
			throw new UserException(self::INVALID_NAME);
		}
	}

	private function setCpf($cpf){

		if($cpf !== FALSE){	
			if (!is_null($cpf) && !empty($cpf)) {
				$this->cpf = $cpf;
			}
			else{
				throw new UserException(self::NULL_CPF);
				
			}
		}
		else{
			$this->cpf = $cpf;
		}
	}

	private function setEmail($email){

		if($email !== FALSE){

			if (!is_null($email) && !empty($email)) {
				$this->email = $email;	
			}
			else{
				throw new UserException(self::NULL_EMAIL);
			}
		}
		else{
			$this->email = $email;
		}
	}

	private function setLogin($login){
		
		if($login !== FALSE){

			if (!is_null($login) && !empty($login)) {
				$this->login = $login;
			}
			else{
				throw new UserException(self::NULL_LOGIN);
			}
		}
		else{
			$this->login = $login;
		}

	}

	private function setPassword($password){

		if($password !== FALSE){
			if (!is_null($password) && !empty($password)) {
				$this->password = $password;
			}
			else{
				throw new UserException(self::NULL_PASSWORD);
			}
		}
		else{
			$this->password = $password;
		}
	}

	private function setGroups($groups){
		if($groups !== FALSE){
			if(!is_null($groups) && !empty($groups)){

				$this->groups = $groups;
			} 
			else{
				throw new UserException(self::NULL_GROUP);
				
			}
		}
		else{
			$this->groups = array();
		}
	}
	private function setHomePhone($homePhone){
		if($homePhone !== FALSE){

			if (!is_null($homePhone) && !empty($homePhone)) {
				try {
					$number = new Phone($homePhone);	
					$this->homePhone = $number;
				}
				catch (Exception $error) {
					throw new UserException($error->getMessage());
				}	
			}
			else{
				throw new UserException(self::NULL_PHONE);
			}
		}
		else{
			$this->homePhone = $homePhone;		
		}
	}

	private function setCellPhone($cellPhone){
		
		if($cellPhone !== FALSE){

			if (!is_null($cellPhone) && !empty($cellPhone)) {
				try {
					$number = new Phone($cellPhone);
					$this->cellPhone = $number;
				}
				catch (Exception $error) {
					throw new UserException($error->getMessage());
				}	
			}
			else{
				throw new UserException(self::NULL_PHONE);
			}
		}
		else{
			$this->cellPhone = $cellPhone;
		}
	}

	// Getters
	
	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getLogin(){
		return $this->login;
	}

	public function getPassword(){
		return $this->password;
	}
	
	public function getGroups(){
		return $this->groups;
	}

	public function getHomePhone(){
		$homePhone = $this->homePhone;
		if($homePhone !== FALSE){
			$homePhone = $homePhone->getNumber();
		}
		return $homePhone;
	}
	public function getCellPhone(){
		$cellPhone = $this->cellPhone;
		if($cellPhone !== FALSE){
			$cellPhone = $cellPhone->getNumber();
		}
		return $cellPhone;
	}
}