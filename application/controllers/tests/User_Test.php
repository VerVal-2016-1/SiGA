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
}