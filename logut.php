<?php

require ("config.php");
session_start();
mysqli_commit($conn);
session_destroy();
header("location:login.php");
?>