<?php

class DB{
    private $dbh;

    function __construct() {
        try {
            $this->dbh = new PDO("mysql:host={$_SERVER['DB_SERVER']};dbname={$_SERVER['DB']}", $_SERVER['DB_USER'],$_SERVER['DB_PASSWORD']);
        } catch (PDOException $e) {
            die('Ooops');
        }
    }


    function getAllPeopleAsTable()
    {
        $data = $this->getAllObjects();
        $countt =  count($data);
        echo "<h1> Records found: $countt </h1>";
        if (count($data) > 0) {
            $bigString = "<table border='1'>\n
                            <tr>\n
                            <th>ID</th><th>First</th><th>Last</th><th>Nick</th>
                            </tr>\n";
            foreach ($data as $row) {
                $bigString .= "<tr><td><a href='Lab4_4.php?id={$row->getPersonID()}'>{$row->getPersonID()}</a></td>
                                <td>{$row->getFirstName()}</td><td>{$row->getLastName()}</td>
                                <td>{$row->getNickName()}</td></tr>";

            }


            $bigString .= "<table>\n";
        }
        else {
            $bigString = "<h2>No people exist.</h2>";
        }
        return $bigString;
    }

    function getAllAttendeeAsTable(){
        $data = $this->getAllAttendee();
        $count = count($data);
        echo "<hr>";
        echo "<h5 style='text-align: center;'> $count Users Recorded </h5>";
        $role = $_SESSION['role'];

        switch($role){
            case 1:
                $table = '<br><table id="dt-select" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 20%">AttendeeID</th>
                                <th style="width: 20%">Username</th>
                                <th style="width: 20%">Password</th>
                                <th style="width: 10%">Role</th>
                                <th> Edit </th>
                            </tr>
                        </thead><tbody style="height:50%;overflow-y: auto">';
                        foreach ($data as $make) {
                            $table .= '<tr><td style="width: 20%"><a>' . $make->getattendeeID() . '</a></td><td style="width: 20%"><a>' . $make->getName() . '</a></td><td style="width: 20%"><a>' . $make->getPassword() . '</a></td>
                                        <td style="width: 15%"><a>' . $make->getRole() . '</a></td><td style="text-align:center;">
                <button class="btn btn-success" data-toggle="modal" data-target="#myModal" contenteditable="false">Edit</button>
            </td></tr>';
                        }
                        $table .= '</tbody></table> ';
                return $table;
            case 3:
                $table = '<h1> you have no authority here dog</h1>';
                return $table;

        }
        var_dump($_POST["edit"]);

    }

    function getAllAttendee(){
        try {
            include "../../Model/Attendee.class.php";
            $data = array();
            $stmt = $this->dbh->prepare("select * from attendee");
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

