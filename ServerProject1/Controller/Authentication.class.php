<?php

class Authentication{
    private $dbh;

    function __construct() {
        try {
            $this->dbh = new PDO("mysql:host={$_SERVER['DB_SERVER']};dbname={$_SERVER['DB']}", $_SERVER['DB_USER'],$_SERVER['DB_PASSWORD']);
        } catch (PDOException $e) {
            die('Ooops');
        }
    }

    function login($username,$password){
        try {
            $data= $this->getAllObjects($username);
            foreach ($data as $row){
                if( $password == $row->getPassword()){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $row->getName();
                    $_SESSION['role'] = $row->getRole();
                    switch ($_SESSION['role']){
                        case 1:
                            header("Location: ../View/Admin/admin.php");
                            break;
                        case 2:
                            header("Location: View/admin.php");
                            break;
                        case 3:
                            header("Location: ../View/Admin/admin.php");
                            break;
                    }
                    var_dump($_SESSION['username']);

                }
                else{
                    echo "<script>alert('Login Not Successfully')</script>";

                }
            }
        }
        catch (PDOException $e){
            echo $e->getMessage();
            die();
        }
    }

    function getAllObjects($username){
        try {
            include "../Model/Attendee.class.php";
            $data = array();
            $stmt = $this->dbh->prepare("select * from attendee where name = :username");
            $stmt -> bindParam(":username",$username,PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS,"Attendee");
            while ($person = $stmt->fetch()) {
                $data[] = $person;
            }
            return $data;

        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}




?>

