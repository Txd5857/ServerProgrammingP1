<?php

class Edit
{
    private $dbh;

    function __construct()
    {
        try {
            $this->dbh = new PDO("mysql:host={$_SERVER['DB_SERVER']};dbname={$_SERVER['DB']}", $_SERVER['DB_USER'], $_SERVER['DB_PASSWORD']);
        } catch (PDOException $e) {
            die('Ooops');
        }
    }
    /*Update and Delete Attendee*/
    function updateAttendee($attendeeID, $username, $password, $role){
        if ($username == "Tenzin" && $role == 1){
            echo "<script>alert('You cannot edit super admin')</script>";
            die();
        }
        else {
            $queryString = "UPDATE `attendee` SET `name` = :name, `password` = :password, `role` = :role WHERE `idattendee` = :id;";

            $stmt = $this->dbh->prepare($queryString);
            $stmt->bindParam(":name", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":role", $role);
            $stmt->bindParam(":id", $attendeeID);
            if ($stmt->execute()) {
                echo "<meta http-equiv='refresh' content='0'>";
                die();
            };
        }

    }
    function deleteAttendee($attendeeID){
        $queryString = "DELETE FROM`attendee` WHERE `idattendee` = :id;";

        $stmt = $this->dbh->prepare($queryString);
        $stmt->bindParam(":id",$attendeeID);
        if($stmt->execute()){
            echo "<meta http-equiv='refresh' content='0'>";
            die();
        };

    }
    /*Update and Delete for Venue*/
    function updateVenue($id,$name, $capacity){
            $queryString = "UPDATE `venue` SET `name` = :name, `capacity` = :capacity WHERE `idvenue` = :id;";

            $stmt = $this->dbh->prepare($queryString);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":capacity", $capacity);
            $stmt->bindParam(":id", $id);
            if ($stmt->execute()) {
                echo "<meta http-equiv='refresh' content='0'>";
                die();
            };
        }

    function deleteVenue($id){
        $queryString = "DELETE FROM `venue` WHERE `idvenue` = :id;";

        $stmt = $this->dbh->prepare($queryString);
        $stmt->bindParam(":id",$id);
        if($stmt->execute()){
            echo "<meta http-equiv='refresh' content='0'>";
            die();
        };

    }

    /*update and Delete for Event*/
    function deleteEvent($id){
        $queryString = "DELETE FROM `event` WHERE `idevent` = :id;";

        $stmt = $this->dbh->prepare($queryString);
        $stmt->bindParam(":id",$id);
        if($stmt->execute()){
            echo "<meta http-equiv='refresh' content='0'>";
            die();
        };

    }
    /*Update and Delete for Venue*/
    function updateEvent($id,$name,$start,$end,$numberallowed,$venue){
        $queryString = "UPDATE `event` SET `name` = :name, `datestart` = :datestart, `dateend` = :dateend, `numberallowed` = :number, `venue` = :venue WHERE `idevent` = :id;";

        $stmt = $this->dbh->prepare($queryString);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":datestart", $start);
        $stmt->bindParam(":dateend", $end);
        $stmt->bindParam(":number", $numberallowed);
        $stmt->bindParam(":venue", $venue);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            echo "<meta http-equiv='refresh' content='0'>";
            die();
        };
    }
}

?>