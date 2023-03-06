<?php

require ("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    // validate the first name field
  if (empty($_POST['fname'])) {
    // $errors[] = 'First name is required.';
    header("location:login.php?signupFn=0");
    session_destroy();
    exit();
  } else {
    $first_name = $_POST['fname'];
    // check if the first name contains only letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
    //   $errors[] = 'Only letters and white space allowed in first name field.';
    header("location:login.php?signupFn=0");
    session_destroy();
    exit();
    }
  }

  // validate the last name field
  if (empty($_POST['lname'])) {
    // $errors[] = 'Last name is required.';
    header("location:login.php?signupLn=0");
    session_destroy();
    exit();
  } else {
    $last_name = $_POST['lname'];
    // check if the last name contains only letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
    //   $errors[] = 'Only letters and white space allowed in last name field.';
    header("location:login.php?signupLn=0");
    session_destroy();
    exit();
    }
  }

  // validate the email field
  if (empty($_POST['email'])) {
    // $errors[] = 'Email is required.';
    header("location:login.php?signupEmail=0");
    session_destroy();
    exit();
  } else {
    $email = $_POST['email'];
    // check if the email address is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //   $errors[] = 'Invalid email format.';
    header("location:login.php?signupEmail=0");
    session_destroy();
    exit();
    }
  }

  // validate the password field
  if (empty($_POST['password'])) {
    // $errors[] = 'Password is required.';
    header("location:login.php?signupPass=0");
    session_destroy();
    exit();
  } else {
    $password = $_POST['password'];
    // check if the password contains at least 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
    //   $errors[] = 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number and one special character.';
    header("location:login.php?signupPass=0");
    session_destroy();
    exit();
    }
  }















   // $pincode =$_POST['pincode'];
    $password = md5(mysqli_real_escape_string($conn, $_POST['password']));

    $sql = "SELECT email FROM user WHERE email = '$email'";
    $retval=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($retval,MYSQLI_ASSOC);
    $count = mysqli_num_rows($retval);

    if($count>=1){
        header("location:login.php?signup=0");
    }else {
        $sql="INSERT INTO `user`(`email`, `fname`, `lname`, `password`, `isadmin`, `posts`) VALUES ('$email','$fname','$lname','$password',0,0)";
         //  $sql = "INSERT INTO `user`(`email`, `fname`, `lname`,`isadmin`) VALUES ('$email','$fname','$lname','$password',0)";
        mysqli_query($conn, $sql);
        mysqli_commit($conn);
      // session_start();
      // $_SESSION['login_user']=$email;
      // header("location:index.php");
      header("location:login.php?signup=1");
    }
}else{
    header("location:login.php");
}

?>