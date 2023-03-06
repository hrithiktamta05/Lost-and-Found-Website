<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Lost and Found Website</title>
        <meta name="description" content="Lost and Found Website" />
        <link rel="stylesheet" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
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
    if(!isset($_SESSION['login_user'])){
        header("location:login.php");
    }
    else {
        $user = $_SESSION['login_user'];
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
            <li><a href="contactus.php" class="btn  white-text ">CONTACT US</a></li>
            <li><a href="logut.php" class="btn  white-text ">LOGOUT</a></li>
        </ul>

    </div>
</nav>
<br>
<br>

<style>
div#chatbox {
                margin:4px, 4px;
                padding:4px;
                background-color: green;
                width: auto;
                max-height: 500px;
                overflow-x: auto;
                overflow-y: scroll;
                text-align:justify;
                background: white;
                min-height: 50vh;
                max-height: 50vh;
            }
</style>


        <div id="wrapper" style="background: white;width: 50%;padding: 1%;margin: 0 25%;">
            <div id="menu">
                <u><p class="welcome">Welcome, <b><?php echo $_SESSION['login_user']; ?></b></p></u>
            </div>
            <div id="chatbox">
            <?php
            if(file_exists("log.html") && filesize("log.html") > 0){
                $contents = file_get_contents("log.html");          
                echo $contents;
            }
            ?>
            </div>
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" />
                <input name="submitmsg"  class="btn  white-text" type="submit" id="submitmsg" value="Send" />
                <a id="exit" href="chatroomlist.php"class="btn  white-text">Exit Chat</a>
            </form>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document 



            function insertLineBreaks(str) {
                var result = '';
                for (var i = 0; i < str.length; i++) {
                    result += str.charAt(i);
                    if ((i+1) % 50 === 0) {
                    result += '<br>';
                    }
                }
                return result;
            }





            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    // var clientmsg = $("#usermsg").val();
                    var clientmsg = insertLineBreaks($("#usermsg").val());
                    $.post("post.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });
                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request 
                    $.ajax({
                        url: "log.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div 
                            //Auto-scroll 
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request 
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div 
                            }	
                        }
                    });
                }
                setInterval (loadLog, 2500);
                $("#exit").click(function () {
                    var exit = confirm("Are you sure you want to end the session?");
                    if (exit == true) {
                    window.location = "chatroomlist.php";
                    }
                });
            });
        </script>
    </body>
</html>
<?php
}
?>
