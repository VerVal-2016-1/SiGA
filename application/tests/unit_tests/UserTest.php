<?php

require_once 'UnitCaseTest.php';

class UserTest extends UnitCaseTest {

    public function setUp(){ 
        parent::setUp(); 
    }

    public function testCreateUserWithIdAndName(){

        $id = 1;
        $name = "John Doe";

        $user = new User($id, $name);

        $this->assertEquals($name, $user->getName());
    }
 
    public function testCreateUserWithValidRandomId(){

        $id = rand(1, PHP_INT_MAX);
        $name = "John Doe";

        $user = new User($id, $name);

        $this->assertEquals($id, $user->getId());
    }

    public function testCreateUserWithValidStringNumberId(){

        $id = "2";
        $name = "John Doe";

        $user = new User($id, $name);

        $this->assertEquals($id, $user->getId());
    }

    /**
     * @expectedException UserException
     */
    public function testCreateUserWithInvalidId0(){

        $id = 0;
        $name = "John Doe";

        $user = new User($id, $name);
    }

    /**
     * @expectedException UserException
     */
    public function testCreateUserWithInvalidRandomId(){

        $id = rand(PHP_INT_MAX + 1, 0);
        $name = "John Doe";

        $user = new User($id, $name);
    }

    /**
     * @expectedException UserException
     */
    public function testCreateUserWithInvalidNullId(){

        $id = NULL;
        $name = "John Doe";

        $user = new User($id, $name);
    }

    /**
     * @expectedException UserException
     */
    public function testCreateUserWithInvalidBlankId(){

        $id = "";
        $name = "John Doe";

        $user = new User($id, $name);
    }

    /**
     * @expectedException UserException
     */
    public function testCreateUserWithInvalidFalseId(){

        $id = FALSE;
        $name = "John Doe";

        $user = new User($id, $name);
    }


    /**
     * @expectedException UserException
     */
    public function testCreateUserWithInvalidNotNumberId(){

        $id = "notnumber";
        $name = "John Doe";

        $user = new User($id, $name);
    }


    // Name tests

    public function testCreateUserWithValidFullName(){

        $id = 1;
        $name = "John Doe Silva";

        $user = new User($id, $name);

        $this->assertEquals($name, $user->getName());
    }

    public function testCreateUserWithValidFullNameWithAccent(){

        $id = 1;
        $name = "João Doé da Silva";

        $user = new User($id, $name);

        $this->assertEquals($name, $user->getName());
    }


    /**
     * @expectedException UserException
     */
    public function testCreateUserWithInvalidBlankName(){

        $id = 1;
        $name = "";

        $user = new User($id, $name);
    }

    /**
     * @expectedException UserException
     */
    public function testCreateUserWithInvalidNullName(){

        $id = 1;
        $name = NULL;

        $user = new User($id, $name);
    }

    /**
     * @expectedException UserException
     */
    public function testCreateUserWithInvalidNotAlphaName(){

        $id = 1;
        $name = "1234";

        $user = new User($id, $name);
    }

    /**
     * @expectedException UserException
     */
    public function testCreateUserWithInvalidNotAlphaPartialName(){

        $id = 1;
        $name = "Marina 45Rui";

        $user = new User($id, $name);
    }

}