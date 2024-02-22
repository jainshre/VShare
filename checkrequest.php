<?php
session_start();
$username=$_SESSION['username'];
$room=$_POST["room"];
include 'dbconfig.php';

//get the admin name of the room
  $queryadmin="SELECT UserName From creategroup where GroupID ='$room'";
  $res=mysqli_query($conn,$queryadmin);
  if(mysqli_num_rows($res)>0)
  {
    
    while($row=mysqli_fetch_assoc($res))
    {
      $adminame=$row['UserName'];
      //get the admin email to send request through mail
      $queryemail="SELECT Email from users where UserName='$adminame'";
      $val=mysqli_query($conn,$queryemail);
      if(mysqli_num_rows($val)>0)
      {
        
        while($row1=mysqli_fetch_assoc($val))
        {
          $_SESSION['adminemail']=$row1['Email'];
          $email=$_SESSION['adminemail'];
           
          //check if user has already sent the request and his record is in the table groupnotify
          $checkentry="SELECT UserName from groupnotify where UserName='$username' and GroupID='$room' ";
          $entryrecord=mysqli_query($conn,$checkentry);
          if(mysqli_num_rows($entryrecord)==0)
          {
            $insertnotification="INSERT into groupnotify(GroupID,UserName,AdminName,time) Values ('$room','$username','$adminame',CURRENT_TIMESTAMP)";
            if(mysqli_query($conn,$insertnotification))
            {
              //sending notification through email
              mail($email,"VShare Notification","$username wants to send document in group $room");
              echo "Notification sent to Admin ";
                
            }
            else
            {
              echo mysqli_error($conn);
            }
          }
          else
          {
            echo "Request already sent";
          }              
        }
      }
    }
  }
 

?>