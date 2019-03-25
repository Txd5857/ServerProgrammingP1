<?php
/**
 * Created by PhpStorm.
 * User: tenzinkhedup
 * Date: 2019-03-25
 * Time: 06:31
 */
class event {
    private $idevent;
    private $name;
    private $datestart;
    private $dateend;
    private $numberallowed;
    private $venue;


    public function getIDEvent(){
        return $this->idevent;
    }

    public function getName(){
        return $this->name;
    }

    public function getDateStart(){
        return $this->datestart;
    }
    public function getDateEnd(){
        return $this->dateend;
    }

    public function getNumberAllowed(){
        return $this->numberallowed;
    }

    public function getVenue(){
        return $this->venue;
    }


}