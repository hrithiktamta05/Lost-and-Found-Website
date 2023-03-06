<?php
session_start();
if(isset($_SESSION['login_user'])){
    $text = $_POST['text'];
	date_default_timezone_set('Asia/Kolkata');
	$text_message = "<div class='msgln' style='border-bottom:2px solid black; padding-top:10px; padding-bottom:10px;'><span class='chat-time'>".date("g:i A")."</span> <a href = mailto: ".$_SESSION['login_user']." style='color:black;'><b class='user-name'>".$_SESSION['login_user']."</b> </a>".stripslashes($text)."<br></div>";
    if(isset($_POST['regionName'])){
        file_put_contents($_POST['regionName']. "log.html", $text_message, FILE_APPEND | LOCK_EX);

    }else{
        file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);

    }
}else{
    header("login.php");
}
?>