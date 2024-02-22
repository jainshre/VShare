<?php

session_start();

include 'dbconfig.php';

if(isset($_POST['signup']))
{
  
 if(!empty($_POST['uname']&&!empty($_POST['uemail'])&&!empty($_POST['password'])))
 {
    $name=mysqli_real_escape_string($conn,$_POST['uname']);
    $email=mysqli_real_escape_string($conn,$_POST['uemail']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $password=password_hash($password,PASSWORD_DEFAULT);
    if(!empty($email))
    {
      $result="SELECT * FROM users WHERE Email='$email'";
      $count=mysqli_query($conn,$result);
      if(mysqli_num_rows($count)==0)
      {
        $ok='';
      }
      else
      {
        echo "<script>alert('Email already taken')</script>";
        echo"<script>location.replace('login.php')</script>";
      }
    }

    if(isset($ok))
    {
      function randomusername($name)
      {
        $name=explode(" ",$name);
        $new_name=$name[0].rand(0,1000);
        return $new_name;
      }
      $username=strtoupper(randomusername($name));
      
      //check if username exist if not then insert otherwise generate new
      $result2="SELECT * FROM users WHERE UserName='$username'";
      $count1=mysqli_query($conn,$result2);
      if(mysqli_num_rows($count1)==0)
      {
        $result1="INSERT INTO users(UserName,FullName,Email,UserPassword) VALUES(?,?,?,?)";
        if($stmt=mysqli_prepare($conn,$result1))
        {
            mysqli_stmt_bind_param($stmt,"ssss",$username,$name,$email,$password);
            if(mysqli_stmt_execute($stmt)){
                //sending username through email
                mail($email,"VShare Notification","Your username is $username");
                // $_SESSION['fullname']=$name;
                // $_SESSION['email']=$email;
                echo "<script>alert('Registration successful')</script>";
                echo"<script>location.replace('login.php')</script>";
            } 
        }
        else{
          echo "<script>alert('Registration Failed try again')</script>";
          echo"<script>location.replace('login.php')</script>";
        }
      }
      else
      {
        randomusername($name);
      }
    }
  }
}


//

// if(isset($_POST['signup']))
// {
  
//  if(!empty($_POST['uname']&&!empty($_POST['uemail'])&&!empty($_POST['password'])))
//  {
//     $name=mysqli_real_escape_string($conn,$_POST['uname']);
//     $email=mysqli_real_escape_string($conn,$_POST['uemail']);
//     $password=mysqli_real_escape_string($conn,$_POST['password']);
//     $password=password_hash($password,PASSWORD_DEFAULT);
//     if(!empty($email))
//     {
//       $result="SELECT * FROM users WHERE Email='$email'";
//       $count=mysqli_query($conn,$result);
//       if(mysqli_num_rows($count)==0)
//       {
//         $ok='';
//       }else
//       {
//         echo "<script>alert('Email already taken')</script>";
//         echo"<script>location.replace('login.php')</script>";
//       }
//     }

//     if(isset($ok))
//     {
//       function randomusername($name)
//       {
//         $name=explode(" ",$name);
//         $new_name=$name[0].rand(0,1000);
//         return $new_name;
//       }
//       $username=strtoupper(randomusername($name));
      
//       //check if username exist if not then insert otherwise generate new
//       $result2="SELECT * FROM users WHERE UserName='$username'";
//       $count1=mysqli_query($conn,$result2);
//       if(mysqli_num_rows($count1)==0)
//       {
//         $result1="INSERT INTO users(UserName,FullName,Email,UserPassword) VALUES('$username','$name','$email','$password')";
//         if(mysqli_query($conn,$result1))
//         {
//           //sending username through email
//           // mail($email,"your username",$username);
//           $_SESSION['fullname']=$name;
//           $_SESSION['email']=$email;
//           echo "<script>alert('Registration successful')</script>";
//           echo"<script>location.replace('login.php')</script>";
//         }
//         else
//         {
          
//           echo "<script>alert('Registration Failed try again')</script>";
//           echo"<script>location.replace('login.php')</script>";
//         }
//       }
//       else
//       {
//         randomusername($name);
//       }
//     }
//   }
// }



?>