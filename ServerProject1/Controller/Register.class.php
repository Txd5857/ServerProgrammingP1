<?php
/**
 * Created by PhpStorm.
 * User: tenzinkhedup
 * Date: 2019-03-24
 * Time: 05:13
 */class Register{
    private $dbh;

    function __construct() {
        try {
            $this->dbh = new PDO("mysql:host={$_SERVER['DB_SERVER']};dbname={$_SERVER['DB']}", $_SERVER['DB_USER'],$_SERVER['DB_PASSWORD']);
        } catch (PDOException $e) {
            die('Ooops');
        }
    }

    function register($username,$password){
        try {
            $defaultrole = 3;
            $stmt = $this->dbh->prepare("INSERT INTO `attendee` (`name`, `password`,`role`) VALUES (:name, :password, :role);");
            $stmt->bindParam(":name",$username);
            $stmt->bindParam(":password",$password);
            $stmt->bindParam(":role",$defaultrole);
            if($stmt->execute()){
                echo "<script>alert('Registered Successfully')</script>";
            };
        }

        catch (PDOException $e){
            echo $e->getMessage();
            die();
        }
    }

    function addnewuser($username,$password,$role){
        try {
            $stmt = $this->dbh->prepare("INSERT INTO `attendee` (`name`, `password`,`role`) VALUES (:name, :password, :role);");
            $stmt->bindParam(":name",$username);
            $stmt->bindParam(":password",$password);
            $stmt->bindParam(":role",$role);
            if($stmt->execute()){
                echo "<meta http-equiv='refresh' content='0'>";
                die();
            };
        }

        catch (PDOException $e){
            echo $e->getMessage();
            die();
        }
    }

    function addnewvenue($name,$capacity){
        try {
            $stmt = $this->dbh->prepare("INSERT INTO `venue` (`name`, `capacity`) VALUES (:name, :capacity);");
            $stmt->bindParam(":name",$name);
            $stmt->bindParam(":capacity",$capacity);
            if($stmt->execute()){
                echo "<meta http-equiv='refresh' content='0'>";
                die();
            };
        }

        catch (PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
}




?>

