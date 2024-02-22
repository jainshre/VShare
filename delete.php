<?php

session_start();
include 'dbconfig.php';
$id=$_GET['id'];

$sql = "DELETE from groupnotify where srno=?";
if($stmt=mysqli_prepare($conn,$sql))
{
    mysqli_stmt_bind_param($stmt,"i",$id);
    if(mysqli_stmt_execute($stmt)){
        header("location:notify.php");
        //echo "Request Declined.";
    } else{
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
    }
}


?>