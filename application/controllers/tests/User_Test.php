<?php 

require_once("TestCase.php");
require_once(APPPATH."/data_types/User.php");
require_once(APPPATH."/exception/UserException.php");

class User_Test extends TestCase{
    
    public function __construct(){
        parent::__construct($this);
    }

    public function shouldCreateUserOnlyWithIdAndName(){

        $id = 1;
        $name = "John Doe";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if creates a blank user object.";

        if ($user !== FALSE) {
            $expected = $user->getId();
        }else{
            $expected = FALSE;
        }

        $this->unit->run($id, $expected, $test_name, $notes);
    }

    public function shouldCreateUserWithValidRandomId(){

        $id = rand(1, PHP_INT_MAX);
        $name = "John Doe";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if creates a user with id ".$id;

        if ($user !== FALSE) {
            $expected = $user->getId();
        }else{
            $expected = FALSE;
        }

        $this->unit->run($id, $expected, $test_name, $notes);
    }

    public function shouldCreateUserWithValidStringNumberId(){

        $id = "2";
        $name = "John Doe";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if creates a user with string id ".$id;

        if ($user !== FALSE) {
            $expected = $user->getId();
        }else{
            $expected = FALSE;
        }

        $this->unit->run($id, $expected, $test_name, $notes);
    }

    public function shouldNotCreateUserWithInvalidId0(){

        $id = 0;
        $name = "John Doe";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if do not creates a user with id ".$id;

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotCreateUserWithInvalidRandomId(){

        $id = rand(PHP_INT_MAX + 1, 0);
        $name = "John Doe";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if do not creates a user with id ".$id;

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithInvalidNullId(){

        $id = NULL;
        $name = "John Doe";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if do not creates a user with null id ";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithInvalidBlankId(){

        $id = "";
        $name = "John Doe";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if do not creates a user with blank id ";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithInvalidFalseId(){

        $id = FALSE;
        $name = "John Doe";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if do not creates a user with false id ";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithInvalidNotNumberId(){

        $id = "notnumber";
        $name = "John Doe";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if do not creates a user with id ".$id;

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    // Name tests

    public function shouldInstantiateWithValidFullName(){

        $id = 1;
        $name = "Carlos Batista da Silva";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        if ($user !== FALSE) {
            $expected = $user->getName();
        }else{
            $expected = FALSE;
        }

        $test_name = "Test if creates a user with a full name ";

        $this->unit->run($name, $expected, $test_name, $notes);
    }

    public function shouldInstantiateWithValidFullNameWithAccent(){

        $id = 1;
        $name = "João Batista da Silva";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        if ($user !== FALSE) {
            $expected = $user->getName();
        }else{
            $expected = FALSE;
        }

        $test_name = "Test if creates a user with a full name ";

        $this->unit->run($name, $expected, $test_name, $notes);
    }

    public function shouldNotInstantiateWithInvalidBlankName(){

        $id = 1;
        $name = "";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if do not creates a user with blank name ";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithInvalidNullName(){

        $id = 1;
        $name = NULL;

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if do not creates a user with null name ";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithInvalidFalseName(){

        $id = 1;
        $name = FALSE;

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if do not creates a user with false name ";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithInvalidArrayName(){

        $id = 1;
        $name = array();

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if do not creates a user with array name ";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithInvalidNotAlphaName(){

        $id = 1;
        $name = "1234";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if do not creates a user with not alpha name ";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }

    public function shouldNotInstantiateWithInvalidNotAlphaPartialName(){

        $id = 1;
        $name = "Marina 45Rui";

        $notes = "";
        try{
            $user = new User($id, $name);
        }catch(UserException $e){
            $user = FALSE;
            $notes = "<b>Thrown Exception:</b> <i>".get_class($e)."</i> - ".$e->getMessage();
        }

        $test_name = "Test if do not creates a user with not alpha partial name ";

        $this->unit->run($user, FALSE, $test_name, $notes);
    }
}