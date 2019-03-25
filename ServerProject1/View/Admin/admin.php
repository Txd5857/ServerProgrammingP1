<?php
/**
 * Created by PhpStorm.
 * User: tenzinkhedup
 * Date: 2019-03-24
 * Time: 02:43
 */

require_once("../../Model/admin.class.php");
require_once("../../Controller/DB.class.php");

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

echo buildhead();

echo buildfoot();

?>