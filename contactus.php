<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" type="image/x-icon" href="image/favicon.ico">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body class="  grey darken-1">
<?php
require("config.php");
require("functions.php");
session_start();
if (isset($_SESSION['login_user'])) {
    $user = $_SESSION['login_user'];
}
?>
<!-- User Profile -->

<nav class="  blue-grey darken-3 z-depth-2" style="text-transform:">
    <div class="nav-wrapper  ">

        <a href="index.php" class="brand-logo " style="margin-left: 20px;text-transform: uppercase;">Lost And Found</a>
        <ul class="right hide-on-med-and-down">

            <!--<li><a href="about.php">About</a></li>-->
            <?php if (is_admin()) {
                echo " <li><a href=\"admin.php\" class=\" white-text btn \">ADMIN PANEL</a></li>";
            } ?>

            <?php
            if (isset($_SESSION['login_user'])) {
                echo "<li><a href='profile.php' class='btn  white-text '>PROFILE</a></li>";
                echo "<li><a href='logut.php' class='btn  white-text '>LOGOUT</a></li>";
            }else{
                echo "<li><a href='login.php' class='btn  white-text '>LOGIN</a></li>";
            }
            ?>
            

        </ul>

    </div>
</nav>
<br>
<br>

<?php
if (isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])) {
    echo "<div class='container' style='margin-left: 380px;text-align: center;'>
    <div class='row'>
        <div class='col s6'>
            <div class=''>
                <div class=' '>
                    <div class='card-panel blue-grey darken-4 z-depth-5'>
          <span class='white-text flow-text'>Join the commuity
          </span>
                        <br>
                        <br>
<a aria-label='Chat on WhatsApp' style='color:white;' href='https://chat.whatsapp.com/GWjIBOlnGH6HvoHUGGwa8w'> <img alt='Chat on WhatsApp' src='image/png-transparent-whatsapp.png' width=40% height=40% style='margin:0 25%;'/></div>
    
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>";
}

?>

<div class="container " style="margin-left: 380px;text-align: center;">
    <div class="row">
        <div class="col s6">
            <div class="">
                <div class="">
                    <div class="card-panel blue-grey darken-4 z-depth-5">
          <span class="white-text flow-text">Contact Developer
          </span>
          
          <img alt="User Image" src="image/user.png" width=40% height=40% style="margin:0 25%;"/>
                        <br>
                        <span class="white-text flow-text">Hrithik Tamta
                        </span>
                        <br>
                        <a aria-label="Chat on WhatsApp" href="https://wa.me/+919892770988"> <img alt="Chat on WhatsApp" src="image/png-transparent-whatsapp.png" width=40% height=40% style="margin:0 25%;"/>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<div class="container " style="margin-left: 380px;text-align: center;">
    <div class="row">
        <div class="col s6">
            <div class="">
                <div class="">
                    <div class="card-panel blue-grey darken-4 z-depth-5">
          <span class="white-text flow-text">Contact Developer
          </span>
          <img alt="User Image" src="image/user.png" width=40% height=40% style="margin:0 25%;"/>
                        <br>
                        <span class="white-text flow-text">Ranjeet Kumar
                        </span>
                        <br>
                        <a aria-label="Chat on WhatsApp" href="https://wa.me/+918226820078"> <img alt="Chat on WhatsApp" src="image/png-transparent-whatsapp.png" width=40% height=40% style="margin:0 25%;"/>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


</body>

<?php
    include("footer.php");
?>

</html>