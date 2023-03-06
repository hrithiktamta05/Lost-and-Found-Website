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
if (!(isset($_SESSION['login_user']))) {
    header("location:login.php");
    exit();
}
$user = $_SESSION['login_user'];
if(!isset($_GET['categoryvalue']))
    $catagoryvalue = 1;
else
    $catagoryvalue = $_GET['categoryvalue'];

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
            <li><a href="profile.php" class=" btn  white-text ">PROFILE</a></li>
            <li><a href="contactus.php" class="btn  white-text ">CONTACT US</a></li>
            <li><a href="logut.php" class="btn  white-text ">LOGOUT</a></li>
        </ul>

    </div>
</nav>
<br>
<br>


<?php
    
    $sql = "SELECT * FROM catagoery;";
	
    $retval=mysqli_query($conn,$sql);
    
    $count = mysqli_num_rows($retval);

    for($i=0;$i < $count;$i++){
        $row = mysqli_fetch_array($retval,MYSQLI_ASSOC);
        echo "<div class='container' style='margin-left: 380px;'>
        <div class='row'>
            <div class='col s6'>
                <div class=''>
                    <div class=' '>
                        <div class='card-panel blue-grey darken-4 z-depth-5'>
            <span class='white-text flow-text'>".$row['cname']."
            </span>
                            <br>
                            <br>
                            <a href='categorylistdata.php?categoryvalue=".$catagoryvalue."&category=".$row['cid']."&cname=".$row['cname']."' class='btn'>Visit</a>
                        </div>
                    </div>
                </div>
            </div>


            </div>
        </div>";
    }

?>

</body>

</html>