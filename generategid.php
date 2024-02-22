<?php
session_start();
include 'dbconfig.php';
$email=$_SESSION['email'];
$name=$_SESSION['username'];


//to generate group id

    function RandomID()
    {
        $id=substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        return $id;
    }     
    $uniqueid=strtoupper(RandomID());

    //check if such grpId exist if not then insert in the creategrp table and make the user as admin by default
    $result2="SELECT * FROM creategroup WHERE GroupID='$uniqueid'";
    $count1=mysqli_query($conn,$result2);
    if(mysqli_num_rows($count1)==0)
    {
        $admin='Admin';
        $result1="INSERT INTO creategroup(GroupID,UserName,UserRole) VALUES(?,?,?)";
        if($stmt=mysqli_prepare($conn,$result1))
        {
            mysqli_stmt_bind_param($stmt,"sss",$uniqueid,$name,$admin);
            if(mysqli_stmt_execute($stmt))
            {
                //sending groupid through email
                mail($email,"VShare Notification","Your GroupID is $uniqueid");
                echo "GroupID sent to the mail";
            } 
        }
        else
        {
            echo "Failed try again";
        }
        
    }
    else
    {
        RandomID();
    }
        

    /////
    // function RandomID()
    // {
    //     $id=substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
    //     return $id;
    // }     
    // $uniqueid=strtoupper(RandomID());

    // //check if such grpId exist if not then insert in the creategrp table and make the user as admin by default
    // $result2="SELECT * FROM creategroup WHERE GroupID='$uniqueid'";
    // $count1=mysqli_query($conn,$result2);
    // if(mysqli_num_rows($count1)==0)
    // {
    //     $result1="INSERT INTO creategroup(GroupID,UserName,UserRole) VALUES('$uniqueid','$name','Admin')";
    //     if(mysqli_query($conn,$result1))
    //     {
    //         //sending username through email
    //         mail($email,"your username",$uniqueid);
            
    //         echo "GroupID sent to the mail";
            
    //     }
    //     else
    //     {
    //         echo "Failed try again";
    //     }
    // }
    // else
    // {
    //     RandomID();
    // }
    
    
?>