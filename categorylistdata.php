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
    <script type="text/javascript" src="js/mainx.js"></script>
    <style>
        .postcard {
            margin-left: 20px;
            margin-right: 20px;
            border-radius: 20px;

        }


    </style>
</head>
<body class="   grey darken-2">

<?php
require("config.php");
require("functions.php");
session_start();

if (!(isset($_SESSION['login_user']))) {
    header("location:login.php");
    exit;
}
if(!isset($_GET['categoryvalue']) && !isset($_GET['category']) && !isset($_GET['cname'])){
    header("location:login.php");
    exit;
}
?>

<nav class="  blue-grey darken-3 z-depth-2" style="text-transform:">
    <div class="nav-wrapper  ">

        <a href="index.php" class="brand-logo " style="margin-left: 20px;text-transform: uppercase;">Lost And Found</a>
        <ul class="right hide-on-med-and-down">

            <!--<li><a href="about.php">About</a></li>-->
            <?php if (is_admin()) {
                echo " <li><a href=\"admin.php\" class=\" white-text btn \">ADMIN PANEL</a></li>";
            } ?>
            <li><a href="profile.php" class=" btn  white-text ">PROFILE</a></li>
            <li><a href="logut.php" class="btn  white-text ">LOGOUT</a></li>

        </ul>

    </div>
</nav>
<style>
    .row {
        margin-bottom: 0px;
    }
    .xx{
        overflow-y:scroll;
        max-height:400px;
        display:block;
        margin-top: 10px;
    }
</style>




<div class="xx" style="margin: 30px">
<div class="white-text blue-grey darken-1  z-depth-1" style=";">
    <table class="centered  responsive-table  " style="">
    
        <?php
        echo "<div class=\"center-align flow-text\">Result matching with ".$_GET['categoryvalue']." ".$_GET['cname']." items</div>";
        ?>
        <thead>
        <tr style="text-transform: uppercase;width:500px;">
            <th>id</th>
            <th>post by</th>
            <th>Category</th>
            <th>Description</th>
            <th>Post Date</th>
            <th>know more</th>
        </tr>
        </thead>

        <tbody style="">
        <?php
            if ($_GET['categoryvalue'] == "lost") {
                $sql = "SELECT `id`,`discription`,`cat_ref`, `adressid`, `pincode`, `uemail`, `imgid`, `postdate` ,`draft` FROM `lthings` WHERE `cat_ref`=".$_GET['category'].";";
        
            } else {
                $sql = "SELECT `id`,`discription`,`cat_ref`, `adressid`, `pincode`, `uemail`, `imgid`, `postdate` ,`draft` FROM `fthings` WHERE `cat_ref`=".$_GET['category'].";";
            }
        
            $retval=mysqli_query($conn, $sql);
            if(mysqli_num_rows($retval)==0){
                echo "<p class='flow-text'>no result</p>";
            }

            while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                $id = $row['id'];
                if ($row['draft'] == 1) {
                    return;
                }
            
                $id=$row['id'];
                $cat = get_catname($row['cat_ref']);
                $disc = $row['discription'];
                // $add=$row['adressid'];
                //$pincode=$row['pincode'];
                $user = get_user($row['uemail']);
                //$imgurl = get_imgurl($row['imgid'], $type);
                $pdate = $row['postdate'];
            
                echo "<tr>
                    <td>$id</td>
                    <td>$user</td>
                    <td>$cat</td>
                    <td>$disc</td>
                    <td>$pdate</td>
                    <td><a class=\"btn\" href='knowmore.php?id=$id&&type=".$_GET['categoryvalue']."'>know more</a> </td>
                    </tr>";
            }
            
        ?>

        </tbody>
    </table>


</div>
    </div>




</body>

</html>



