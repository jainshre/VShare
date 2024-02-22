<?php
session_start();
include 'dbconfig.php';

if($_POST['login'])
{
    if(!empty($_POST['username']&&!empty($_POST['userpassword'])))
    {
        $username=mysqli_real_escape_string($conn,$_POST['username']);
        $userpassword=mysqli_real_escape_string($conn,$_POST['userpassword']);

        $query="SELECT UserPassword From users where UserName='$username'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                if(password_verify($userpassword,$row['UserPassword']))
                {
                    $_SESSION['username']=$username;
                    echo"<script>location.replace('share2.php')</script>";
                }
                else
                {
                    echo "<script>alert('Check Your Credentials')</script>";
                    echo"<script>location.replace('login.php')</script>";
                }
            }
        }
        else
        {
            echo "<script>alert('Check Your Credentials')</script>";
            echo"<script>location.replace('login.php')</script>";
        }
    }
}



?>