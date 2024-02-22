<?php

session_start();
include 'dbconfig.php';

$name=$_SESSION['username'];


if (isset($_GET['term'])) {
     
    $query = "SELECT UserName FROM users WHERE UserName LIKE '{$_GET['term']}%' LIMIT 25";
    $result = mysqli_query($conn, $query);
  
     if (mysqli_num_rows($result) > 0) {
      while ($name = mysqli_fetch_array($result)) {
       $res[] = $name['UserName'];
      }
     } else {
       $res = array();
     }
     //return json res
     echo json_encode($res);
 }


?>