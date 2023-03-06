<?php

session_start();
require("config.php");
require ("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // validate the email field
  if (empty($_POST['username'])) {
    // echo 'Email is required.';
    header("location:login.php?loginEmail=0");
  } else {
    $email = $_POST['email'];
    // check if the email address is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // echo 'Invalid email format.';
        header("location:login.php?loginEmail=0");
    }
  }

  // validate the password field
  if (empty($_POST['password'])) {
    // echo 'Password is required.';
    header("location:login.php?loginPass=0");
  } else {
    $password = $_POST['password'];
    // check if the password contains at least 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
    //   echo 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number and one special character.';
      header("location:login.php?loginPass=0");
    }
  }



    $email = mysqli_real_escape_string($conn, $_POST['username']);
    $password=md5(mysqli_real_escape_string($conn, $_POST['password']));

    $sql = "SELECT * FROM user WHERE email = '$email' and password='$password' ";
	
    $retval=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($retval,MYSQLI_ASSOC);
    $count = mysqli_num_rows($retval);
    if($count == 1) {
        global  $email;
        $_SESSION['login_user'] = $email;
        mysqli_commit($conn);
        
        if(is_admin()){
            
            header("location:admin.php");
        }
        else
            header("location: index.php");
    }else {
        header("location:login.php?login=0");
    }
}else{
    header("location:login.php?login=x");
}
?>