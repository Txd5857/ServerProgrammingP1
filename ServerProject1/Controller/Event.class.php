<?php
/**
 * Created by PhpStorm.
 * User: tenzinkhedup
 * Date: 2019-03-25
 * Time: 10:01
 */

class Event
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

    function getallEvent(){
        try {
            include "../../Model/event.class.php";
            $data = array();
            $stmt = $this->dbh->prepare("select * from event");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS,"event");
            while ($event = $stmt->fetch()) {
                $data[] = $event;
            }
            return $data;

        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }

    }

    function getAllVenuesAsTable(){
        $data = $this->getAllVenue();
        $count = count($data);
        echo "<hr>";
        echo "<h5 style='text-align: center;'> $count Venues Recorded </h5>";
        $role = $_SESSION['role'];

        switch($role){
            case 1:
                $table = '<br><table id="dt-select" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 20%">Venue_ID</th>
                                <th style="width: 30%">Venue_Name</th>
                                <th style="width: 30%">Venue_Capacity</th>
                                <th style="width: 20%"> Edit </th>
                            </tr>
                        </thead><tbody style="height:50%;overflow-y: auto">';
                foreach ($data as $make) {
                    $table .= '<tr><td style="width: 20%"><a>' . $make->getIDVenue() . '</a></td><td style="width: 20%"><a>' . $make->getName() . '</a></td><td style="width: 20%"><a>' . $make->getCapacity() . '</a></td>
                               <td style="text-align:center;"><button class="btn btn-success" data-toggle="modal" data-target="#myModal" contenteditable="false">Edit</button>
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
}