<?php
/**
 * Created by PhpStorm.
 * User: tenzinkhedup
 * Date: 2019-03-20
 * Time: 12:14
 */

function buildhead()
{
    $header = '
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Server Programming Project 1</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/please.css">


    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap-datetimepicker.css" />
    <!-- datetime picker -->
    <script type="text/javascript" src="../../js/moment.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    <!--Test-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>EVENT</h3>
                <strong>E</strong>
            </div>

            <ul class="list-unstyled components">
                <li >
                    <a href="#homeSubmenu">
                        Home
                    </a>
                </li>
                <li>
                    <a href="adminusers.php">
                        Users
                    </a>
                    <a href="adminvenue.php" >
                        Venues
                    </a>
                </li>
                <li>
                    <a href="adminevents.php">
                        Events
                    </a>
                </li>
                <li>
                    <a href="#">
                        FAQ
                    </a>
                </li>
                <li>
                    <a href="#">
                        Contact
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled components">
                <li>
                    <a href="../logout.php">Logout</a>
                </li>
    
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <h3> Welcome ' . $_SESSION["username"] . '</h3>
                </div>
            </nav>';
    return $header;
}

function buildmodal(){
    $modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Edit</h4>

            </div>
            <div class="modal-body"></div>
        </div>
    </div></div>';
    return $modal;
}

function buildaddform(){
    $form = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add New User </button><div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><div id="modalContent"></div><form role="form" name="addform" action="adminusers.php" method="post">
      <div class="form-group"><label for="username">Username</label><input class="form-control" name="username" placeholder="username"/>
      </div><div class="form-group"><label for="password">Password</label><input class="form-control" name="password" placeholder="password"/>
      </div><div class="form-group"><label for="rolee">Role</label>
      <select name="role" class="form-control">
        <option value="3" selected>3 - Attendee</option>
        <option value="1">1 - Admin </option>
        <option value="2">2 - Event Manager </option>
      </select></div><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="submit" class="btn btn-primary" name="addform">Confirm</button></form>
        </div></div></div></div>
        ';
    return $form;
}

function buildaddvenue(){
    $form = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add New Venue </button><div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Venue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><div id="modalContent"></div><form role="form" name="addform" action="adminvenue.php" method="post">
      <div class="form-group"><label for="name">Venue Name</label><input class="form-control" name="name" placeholder="Venue Name"/>
      </div><div class="form-group"><label for="capacity">Capacity</label><input class="form-control" name="capacity" placeholder="Venue Capacity"/>
      </div><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="submit" class="btn btn-primary" name="addform">Confirm</button></form>
        </div></div></div></div>
        ';
    return $form;
}

function buildaddEvent(){
    $form = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add New Venue </button><div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Events</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><div id="modalContent"></div><form role="form" name="addform" action="adminevents.php" method="post">
      <div class="form-group"><label for="name">Event Name</label><input class="form-control" name="name" placeholder="Event Name"/>
      </div>
      <div class="form-group"><label for="datestart">Date Start</label><div class="input-group date" id="datetimepicker1">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" placeholder="Start Date"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-addon"><i style="font-size:36px;margin-left:10px;" class="fa fa-calendar "></i></div>
                    </div>
                </div>
      </div><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="submit" class="btn btn-primary" name="addform">Confirm</button></form>
        </div></div></div></div>
        ';
    return $form;
}

function buildfoot() {
    $foot = ' <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(\'#sidebarCollapse\').on(\'click\', function () {
                $(\'#sidebar\').toggleClass(\'active\');
                
            });
        });
    </script>
</body>

</html>';
    return $foot;

}
