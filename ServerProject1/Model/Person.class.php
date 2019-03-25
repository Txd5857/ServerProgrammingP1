<?php
/**
 * Created by PhpStorm.
 * User: tenzinkhedup
 * Date: 2019-03-24
 * Time: 04:02
 */

class Person {
    private $PersonID;
    private $LastName;
    private $FirstName;
    private $NickName;

    public function whoAmI(){
        return "I am {$this->FirstName} {$this->LastName} and my nick name is {$this->NickName}";
    }

    public function getPersonID(){
        return $this->PersonID;
    }

    public function getLastName(){
        return $this->LastName;
    }

    public function getFirstName(){
        return $this->FirstName;
    }

    public function getNickName(){
        return $this->NickName;
    }
}