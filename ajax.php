<?php
session_start();
include 'dbconfig.php';

$name=$_SESSION['username'];
$receiver=$_POST['receiver'];
//echo $reciever;
// file name
$file_name = $_FILES['file']['name'];
$file_size=$_FILES['file']['size'];
$file_tmp=$_FILES['file']['tmp_name'];
$file_type=$_FILES['file']['type'];
//$folder="upload/".$file_name;
// Location
 $location = 'filesindividual/'.$file_name;

// // file extension
//  $file_extension = pathinfo($location, PATHINFO_EXTENSION);
//  $file_extension = strtolower($file_extension);

// Valid image extensions
//$image_ext = array("jpg","png","jpeg","gif");



// if(in_array($file_extension,$image_ext)){
//     // Upload file
//     $query="INSERT INTO chat_msg(reciever,msg) values('$reciever','$filename') ";
//     if(mysqli_query($conn,$query))
//     {
//         echo 'done';
//     }
//     if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
//         $response = $location;
//     }
// }
// else
// {
//     echo mysqli_error($conn);
// }

//get the id of sender and receiver from adduser table
$id;
$a="SELECT id from adduser where UserName='$name' and Receiver='$receiver' or UserName='$receiver' and Receiver='$name'";
$r=mysqli_query($conn,$a);
if(mysqli_num_rows($r)>0)
{
  while($row=mysqli_fetch_assoc($r))
  {
    $id=$row['id'];
  }        
}



$sql="INSERT into individual (u_id,Sender,Receiver,stime,originalname,size,tmpname,filetype) VALUES('$id','$name','$receiver',CURRENT_TIMESTAMP,'$file_name','$file_size','$file_tmp','$file_type');";
mysqli_query($conn,$sql);
move_uploaded_file($_FILES['file']['tmp_name'],$location);
