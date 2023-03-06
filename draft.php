<?php

require ("config.php");
require ("session.php");
require ("functions.php");
$id=$_GET['id'];
$type=$_GET['type'];
echo $id,$type;
mov_draf($id,$type);
mysqli_commit($conn);
header('location:profile.php');

?>