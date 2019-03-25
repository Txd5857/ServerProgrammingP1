<?php
/**
 * Created by PhpStorm.
 * User: tenzinkhedup
 * Date: 2019-03-24
 * Time: 04:12
 */

class Attendee {
    private $idattendee;
    private $name;
    private $password;
    private $role;

    public function getattendeeID(){
        return $this->idattendee;
    }

    public function getName(){
        return $this->name;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getRole(){
        return $this->role;
    }
}