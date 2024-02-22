<?php
session_start();
include 'dbconfig.php';
$name=mysqli_real_escape_string($conn,$_GET['name']);
$room=mysqli_real_escape_string($conn,$_GET['room']);
$sql = "DELETE from usergroups where UserName=? and GroupID=?";
if($stmt=mysqli_prepare($conn,$sql))
{
    mysqli_stmt_bind_param($stmt,"ss",$name,$room);
    if(mysqli_stmt_execute($stmt)){
        header("location:javascript://history.go(-1)");
        //echo "Request Declined.";
    } else{
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
    }
}
?>