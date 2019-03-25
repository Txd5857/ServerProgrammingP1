<?php
/**
 * Created by PhpStorm.
 * User: tenzinkhedup
 * Date: 2019-03-24
 * Time: 04:58
 */

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="../css/loginstyle.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <h1> Event Planner</h1>
            <h2> Register An Account</h2>
        </div>

        <!-- Login Form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
            <input type="text" id="password" class="fadeIn third" name="password" placeholder="Password">
            <input type="submit" name="Login" class="fadeIn fourth" value="Register">
        </form>

        <!-- Back To Login Page -->
        <div id="formFooter">
            <a class="underlineHover" href="login.php"">Back To Login Page</a>
        </div>

    </div>
</div>

<?php
include ('../Controller/Register.class.php');

if (isset($_REQUEST['Login'])) {
    $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);

    $register = new Register();
    $register->register($username, hash('SHA256', $password));
}

?>
