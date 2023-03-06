<?php

require ('config.php');
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql="DELETE FROM `user` WHERE `email`='$id'";
        mysqli_query($conn,$sql);
        mysqli_commit($conn);
        header('location:admin.php');
    }
    else{
        header('location:admin.php');
    }
?>