<?php
/**
 * Created by PhpStorm.
 * User: tenzinkhedup
 * Date: 2019-03-24
 * Time: 06:53
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
echo "<h1 style='text-align: center;'> Manage Users </h1>";
echo buildaddform();

echo $db->getAllAttendeeAsTable();
echo buildmodal();
echo buildfoot();

?>
<script>
    $(".btn[data-target='#myModal']").click(function() {
        var columnHeadings = $("thead th").map(function() {
            return $(this).text();
        }).get();
        columnHeadings.pop();
        var columnValues = $(this).parent().siblings().map(function() {
            return $(this).text();
        }).get();
        var modalBody = $('<div id="modalContent"></div>');
        var modalForm = $('<form role="form" name="modalForm" action="adminusers.php" method="post"></form>');
        $.each(columnHeadings, function(i, columnHeader) {
            var formGroup = $('<div class="form-group"></div>');
            formGroup.append('<label for="'+columnHeader+'">'+columnHeader+'</label>');
            formGroup.append('<input class="form-control" name="'+columnHeader+i+'" id="'+columnHeader+i+'" value="'+columnValues[i]+'" />');
            console.log(columnHeader+i);
            modalForm.append(formGroup);
        });
        modalForm.append('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="submit" class="btn btn-default" name="test">Delete User</button><button type="submit" class="btn btn-primary" name="modalForm">Save changes</button> ');

        modalBody.append(modalForm);
        $('.modal-body').html(modalBody);
    });


</script>

<?php
include ('../../Controller/Edit.class.php');

if (isset($_REQUEST['modalForm'])) {
        $attendeeID = filter_var($_REQUEST['AttendeeID0'], FILTER_SANITIZE_STRING);
        $username = filter_var($_REQUEST['Username1'], FILTER_SANITIZE_STRING);
        $password = filter_var($_REQUEST['Password2'], FILTER_SANITIZE_STRING);
        $role = filter_var($_REQUEST['Role3'], FILTER_SANITIZE_STRING);
        if($role == 0 || $role > 3 ){
            echo "<script>alert('No such Role')</script>";
            die;
        }
        $update = new Edit();
        $update->updateAttendee($attendeeID,$username, hash('SHA256', $password),$role);
}

elseif (isset($_POST['test'])){
        $attendeeID = filter_var($_REQUEST['AttendeeID0'], FILTER_SANITIZE_STRING);

        $delete = new Edit();
        $delete->deleteAttendee($attendeeID);

}

include ('../../Controller/Register.class.php');
if (isset($_REQUEST['addform'])) {
    $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);
    $role = $_POST['role'];
    $add = new Register();
    $add->addnewuser($username,hash(SHA256,$password),$role);

}
?>




