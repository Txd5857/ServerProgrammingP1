<?php
/**
 * Created by PhpStorm.
 * User: tenzinkhedup
 * Date: 2019-03-25
 * Time: 06:25
 */


require_once("../../Model/admin.class.php");
require_once("../../Controller/DB.class.php");

session_start();
$db = new DB();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}


echo buildhead();
echo "<h1 style='text-align: center;'> Manage Events </h1>";
echo buildaddEvent();

//echo $db->getAllAttendeeAsTable();
//echo buildmodal();
echo buildfoot();
?>

<script type="text/javascript" src="../../js/please.js"></script>
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>