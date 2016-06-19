<?php 

require_once("TestCase.php");
require_once(APPPATH."/data_types/User.php");
require_once(APPPATH."/exception/UserException.php");

class User_Test extends TestCase{
    
    public function __construct(){
        parent::__construct($this);
    }

    // public function shouldCreateUserOnlyWithIdAndName(){

    //     $id = 1;
    //     $name = "John Doe";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if creates a blank user object.";

    //     if ($user !== FALSE) {
    //         $expected = $user->getId();
    //     }else{
    //         $expected = FALSE;
    //     }

    //     $this->unit->run($id, $expected, $test_name, $notes);
    // }

    // public function shouldCreateUserWithValidRandomId(){

    //     $id = rand(1, PHP_INT_MAX);
    //     $name = "John Doe";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if creates a user with id ".$id;

    //     if ($user !== FALSE) {
    //         $expected = $user->getId();
    //     }else{
    //         $expected = FALSE;
    //     }

    //     $this->unit->run($id, $expected, $test_name, $notes);
    // }

    // public function shouldCreateUserWithValidStringNumberId(){

    //     $id = "2";
    //     $name = "John Doe";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if creates a user with string id ".$id;

    //     if ($user !== FALSE) {
    //         $expected = $user->getId();
    //     }else{
    //         $expected = FALSE;
    //     }

    //     $this->unit->run($id, $expected, $test_name, $notes);
    // }

    // public function shouldNotCreateUserWithInvalidId0(){

    //     $id = 0;
    //     $name = "John Doe";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if do not creates a user with id ".$id;

    //     $this->unit->run($user, FALSE, $test_name, $notes);
    // }

    // public function shouldNotCreateUserWithInvalidRandomId(){

    //     $id = rand(PHP_INT_MAX + 1, 0);
    //     $name = "John Doe";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if do not creates a user with id ".$id;

    //     $this->unit->run($user, FALSE, $test_name, $notes);
    // }

    // public function shouldNotInstantiateWithInvalidNullId(){

    //     $id = NULL;
    //     $name = "John Doe";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if do not creates a user with null id ";

    //     $this->unit->run($user, FALSE, $test_name, $notes);
    // }

    // public function shouldNotInstantiateWithInvalidBlankId(){

    //     $id = "";
    //     $name = "John Doe";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if do not creates a user with blank id ";

    //     $this->unit->run($user, FALSE, $test_name, $notes);
    // }

    // public function shouldNotInstantiateWithInvalidFalseId(){

    //     $id = FALSE;
    //     $name = "John Doe";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if do not creates a user with false id ";

    //     $this->unit->run($user, FALSE, $test_name, $notes);
    // }

    // public function shouldNotInstantiateWithInvalidNotNumberId(){

    //     $id = "notnumber";
    //     $name = "John Doe";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if do not creates a user with id ".$id;

    //     $this->unit->run($user, FALSE, $test_name, $notes);
    // }

    // // Name tests

    // public function shouldInstantiateWithValidFullName(){

    //     $id = 1;
    //     $name = "Carlos Batista da Silva";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     if ($user !== FALSE) {
    //         $expected = $user->getName();
    //     }else{
    //         $expected = FALSE;
    //     }

    //     $test_name = "Test if creates a user with a full name ";

    //     $this->unit->run($name, $expected, $test_name, $notes);
    // }

    // public function shouldInstantiateWithValidFullNameWithAccent(){

    //     $id = 1;
    //     $name = "João Batista da Silva";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     if ($user !== FALSE) {
    //         $expected = $user->getName();
    //     }else{
    //         $expected = FALSE;
    //     }

    //     $test_name = "Test if creates a user with a full name ";

    //     $this->unit->run($name, $expected, $test_name, $notes);
    // }

    // public function shouldNotInstantiateWithInvalidBlankName(){

    //     $id = 1;
    //     $name = "";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if do not creates a user with blank name ";

    //     $this->unit->run($user, FALSE, $test_name, $notes);
    // }

    // public function shouldNotInstantiateWithInvalidNullName(){

    //     $id = 1;
    //     $name = NULL;

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if do not creates a user with null name ";

    //     $this->unit->run($user, FALSE, $test_name, $notes);
    // }

    // public function shouldNotInstantiateWithInvalidFalseName(){

    //     $id = 1;
    //     $name = FALSE;

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if do not creates a user with false name ";

    //     $this->unit->run($user, FALSE, $test_name, $notes);
    // }

    // public function shouldNotInstantiateWithInvalidArrayName(){

    //     $id = 1;
    //     $name = array();

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if do not creates a user with array name ";

    //     $this->unit->run($user, FALSE, $test_name, $notes);
    // }

    // public function shouldNotInstantiateWithInvalidNotAlphaName(){

    //     $id = 1;
    //     $name = "1234";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if do not creates a user with not alpha name ";

    //     $this->unit->run($user, FALSE, $test_name, $notes);
    // }

    // public function shouldNotInstantiateWithInvalidNotAlphaPartialName(){

    //     $id = 1;
    //     $name = "Marina 45Rui";

    //     $notes = "";
    //     try{
    //         $user = new User($id, $name);
    //     }catch(UserException $e){
    //         $user = FALSE;
    //         $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
    //     }

    //     $test_name = "Test if do not creates a user with not alpha partial name ";

    //     $this->unit->run($user, FALSE, $test_name, $notes);
    // }

    public function shouldInstantiateWithValidCPF(){
        $id = 1;
        $name = "John Doe";
        $cpf = "03382156478";
        
        $notes = "";
        try{
            $user = new User($id, $name, $cpf);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if creates a user object with valid cpf";

        if ($user !== FALSE) {
            $expected = $user->getCpf();
        }
        else{
            $expected = FALSE;
        }

        $this->unit->run($cpf, $expected, $test_name, $notes);
    }

    public function shouldNotInstantiateWithBlankCPF(){
        $id = 1;
        $name = "John Doe";
        $cpf = "";
        
        $notes = "";
        try{
            $user = new User($id, $name, $cpf);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if not creates a user object with blank cpf";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithNullCPF(){
        $id = 1;
        $name = "John Doe";
        $cpf = NULL;
        
        $notes = "";
        try{
            $user = new User($id, $name, $cpf);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if not creates a user object with a null cpf";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldInstantiateWithValidEmail(){
        $id = 1;
        $name = "John Doe";
        $email = "john@john.com";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, $email);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if creates a user object with a valid email";

        if ($user !== FALSE) {
            $expected = $user->getEmail();
        }
        else{
            $expected = FALSE;
        }

        $this->unit->run($email, $expected, $test_name, $notes);
    }

    public function shouldNotInstantiateWithBlankEmail(){
        $id = 1;
        $name = "John Doe";
        $email = "";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, $email);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if not creates a user object with a blank email";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithNullEmail(){
        $id = 1;
        $name = "John Doe";
        $email = NULL;
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, $email);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if not creates a user object with a null email";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldInstantiateWithValidLogin(){
        $id = 1;
        $name = "John Doe";
        $login = "john";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, $login);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if creates a user object with a valid login";

        if ($user !== FALSE) {
            $expected = $user->getLogin();
        }
        else{
            $expected = FALSE;
        }

        $this->unit->run($login, $expected, $test_name, $notes);
    }

    public function shouldNotInstantiateWithBlankLogin(){
        $id = 1;
        $name = "John Doe";
        $login = "";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, $login);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if not creates a user object with a blank login";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithNullLogin(){
        $id = 1;
        $name = "John Doe";
        $login = NULL;
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, $login);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if not creates a user object with a null login";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldInstantiateWithValidPassword(){
        $id = 1;
        $name = "John Doe";
        $password = "john";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, $password);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if creates a user object with a valid password";

        if ($user !== FALSE) {
            $expected = $user->getPassword();
        }
        else{
            $expected = FALSE;
        }

        $this->unit->run($password, $expected, $test_name, $notes);
    }

    public function shouldNotInstantiateWithBlankPassword(){
        $id = 1;
        $name = "John Doe";
        $password = "";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, $password);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if not creates a user object with a blank password";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithNullPassword(){
        $id = 1;
        $name = "John Doe";
        $password = NULL;
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, $password);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if not creates a user object with a null password";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldInstantiateWithValidGroups(){
        $id = 1;
        $name = "John Doe";
        $groups = array(1 => "student");
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, FALSE, $groups);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if creates a user object with a valid groups";

        if ($user !== FALSE) {
            $expected = $user->getGroups();
        }
        else{
            $expected = FALSE;
        }

        $this->unit->run($groups, $expected, $test_name, $notes);
    }

    public function shouldNotInstantiateWithBlankGroups(){
        $id = 1;
        $name = "John Doe";
        $groups = "";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, FALSE, $groups);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }
       
        $test_name = "Test if not creates a user object with a blank groups";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithNullGroups(){
        $id = 1;
        $name = "John Doe";
        $groups = NULL;
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, FALSE, $groups);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }
    
        $test_name = "Test if not creates a user object with a null groups";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldInstantiateWithValidHomePhoneMinLength(){
        $id = 1;
        $name = "John Doe";
        $homephone = "32541856";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, FALSE, FALSE, $homephone);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if creates a user object with a valid homephone with 8 numbers";

        if ($user !== FALSE) {
            $expected = $user->getHomePhone();
        }
        else{
            $expected = FALSE;
        }

        $this->unit->run($homephone, $expected, $test_name, $notes);
    }

    public function shouldInstantiateWithValidHomePhoneMaxLength(){
        $id = 1;
        $name = "John Doe";
        $homephone = "32541856125";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, FALSE, FALSE, $homephone);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if creates a user object with a valid homephone with 11 numbers";

        if ($user !== FALSE) {
            $expected = $user->getHomePhone();
        }
        else{
            $expected = FALSE;
        }

        $this->unit->run($homephone, $expected, $test_name, $notes);
    }

    public function shouldNotInstantiateWithInvalidHomePhone(){
        $id = 1;
        $name = "John Doe";
        $phone = "123456";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, FALSE, FALSE, $phone);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }
       
        $test_name = "Test if not creates a user object with a invalid homephone";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithBlankHomePhone(){
        $id = 1;
        $name = "John Doe";
        $phone = "";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, FALSE, FALSE, $phone);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }
       
        $test_name = "Test if not creates a user object with a blank homephone";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithNullHomePhone(){
        $id = 1;
        $name = "John Doe";
        $phone = NULL;
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, FALSE, FALSE, $phone);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }
    
        $test_name = "Test if not creates a user object with a null homephone";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldInstantiateWithValidCellPhoneWithMinLength(){
        $id = 1;
        $name = "John Doe";
        $phone = "82541856";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, $phone);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if creates a user object with a valid cellphone with 8 numbers";

        if ($user !== FALSE) {
            $expected = $user->getCellPhone();
        }
        else{
            $expected = FALSE;
        }

        $this->unit->run($phone, $expected, $test_name, $notes);
    }

    public function shouldInstantiateWithValidCellPhoneWithMaxLength(){
        $id = 1;
        $name = "John Doe";
        $phone = "82541856251";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, $phone);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if creates a user object with a valid cellphone with 11 numbers";

        if ($user !== FALSE) {
            $expected = $user->getCellPhone();
        }
        else{
            $expected = FALSE;
        }

        $this->unit->run($phone, $expected, $test_name, $notes);
    }

    public function shouldNotInstantiateWithInvalidCellPhone(){
        $id = 1;
        $name = "John Doe";
        $phone = "123456";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, $phone);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }
       
        $test_name = "Test if not creates a user object with a invalid cellphone";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithBlankCellPhone(){
        $id = 1;
        $name = "John Doe";
        $phone = "";
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, $phone);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }
       
        $test_name = "Test if not creates a user object with a blank cellphone";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithNullCellPhone(){
        $id = 1;
        $name = "John Doe";
        $phone = NULL;
        
        $notes = "";
        try{
            $user = new User($id, $name, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, $phone);
        }
        catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }
    
        $test_name = "Test if not creates a user object with a null homephone";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }
}