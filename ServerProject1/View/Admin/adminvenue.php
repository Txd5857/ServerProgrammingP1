<?php
/**
 * Created by PhpStorm.
 * User: tenzinkhedup
 * Date: 2019-03-25
 * Time: 05:35
 */

require_once("../../Model/admin.class.php");
require_once("../../Controller/Venue.class.php");

session_start();
$db = new Venue();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

echo buildhead();
echo "<h1 style='text-align: center;'> Manage Venues </h1>";
echo buildaddvenue();
echo $db->getAllVenuesAsTable();
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
    var modalForm = $('<form role="form" name="modalForm" action="adminvenue.php" method="post"></form>');
    $.each(columnHeadings, function(i, columnHeader) {
        var formGroup = $('<div class="form-group"></div>');
        formGroup.append('<label for="'+columnHeader+'">'+columnHeader+'</label>');
        formGroup.append('<input class="form-control" name="'+columnHeader+i+'" id="'+columnHeader+i+'" value="'+columnValues[i]+'" />');
        console.log(columnHeader+i);
        modalForm.append(formGroup);
    });
    modalForm.append('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="submit" class="btn btn-default" name="test">Delete Venue</button><button type="submit" class="btn btn-primary" name="modalForm">Save changes</button> ');

    modalBody.append(modalForm);
    $('.modal-body').html(modalBody);
});

</script>

<?php
if (isset($_REQUEST['addform'])) {
    $name = filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);
    $capacity= filter_var($_REQUEST['capacity'], FILTER_SANITIZE_STRING);
    $add = new Register();
    $add->addnewvenue($name,$capacity);

}

include ('../../Controller/Edit.class.php');

if (isset($_REQUEST['modalForm'])) {
    $id = filter_var($_REQUEST['Venue_ID0'], FILTER_SANITIZE_STRING);
    $name = filter_var($_REQUEST['Venue_Name1'], FILTER_SANITIZE_STRING);
    $capacity = filter_var($_REQUEST['Venue_Capacity2'], FILTER_SANITIZE_STRING);
    $update = new Edit();
    $update->updateVenue($id,$name,$capacity);
}

elseif (isset($_POST['test'])){
    $id = filter_var($_REQUEST['Venue_ID0'], FILTER_SANITIZE_STRING);

    $delete = new Edit();
    $delete->deleteVenue($id);

}
?>