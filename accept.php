<?php

session_start();
include 'dbconfig.php';
$id=$_GET['id'];

$email;
$name;
$selectuser="SELECT UserName from groupnotify where srno='$id'";
$result=mysqli_query($conn,$selectuser);
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $name=$row['UserName'];
    }
    $query="SELECT Email from users where UserName='$name'";
    $search=mysqli_query($conn,$query);
    if(mysqli_num_rows($search)>0)

    {
        while($row=mysqli_fetch_assoc($search))
        {
            $email=$row['Email'];
        }
        
    }
}
//get the groupid from groupnotify table
$grpid;
$selectgid="SELECT GroupID from groupnotify where srno='$id'";
$res=mysqli_query($conn,$selectgid);
if(mysqli_num_rows($res)>0)
{
    while($row=mysqli_fetch_assoc($res))
    {
        $grpid=$row['GroupID'];
    }
}
$sql = "UPDATE groupnotify set Permission=1,Permission_Time=CURRENT_TIMESTAMP where srno=?";
if($stmt=mysqli_prepare($conn,$sql))
{
    mysqli_stmt_bind_param($stmt,"i",$id);
    if(mysqli_stmt_execute($stmt)){
        mail($email,"VShare Notification","The ADMIN of your Group $grpid has accepted your request so you can share your files. If your send button is not enabled then please try refreshing the page. ");
        header("location:notify.php");
        //echo "Request Declined.";
    } else{
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
    }
}


?>