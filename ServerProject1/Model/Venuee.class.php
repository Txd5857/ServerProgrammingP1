<?php
/**
 * Created by PhpStorm.
 * User: tenzinkhedup
 * Date: 2019-03-25
 * Time: 05:52
 */

class Venuee {
    private $idvenue;
    private $name;
    private $capacity;

    public function getIDVenue(){
        return $this->idvenue;
    }

    public function getName(){
        return $this->name;
    }

    public function getCapacity(){
        return $this->capacity;
    }

}