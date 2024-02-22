<?php
session_start();
include 'dbconfig.php';
$room=mysqli_real_escape_string($conn,$_REQUEST['room']);
$username=$_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Users</th>
            <th scope="col">Remove</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $res='';
          $a="SELECT UserName,GroupID from usergroups where GroupID='$room'";
          $msg=mysqli_query($conn,$a);
          if(mysqli_num_rows($msg)>0)
          {
              while($row=mysqli_fetch_assoc($msg))
              {
                  $res=$res.'<tr>';
                  $res=$res.'<th scope="row">'.$row['UserName'].'</th>';
                  $res=$res.'<td><a href="deleteusers.php?name='.$row['UserName'].'&room='.$row['GroupID'].'"><i class="fa fa-user-times"></i></a></td>';
                  $res=$res.'</tr>';
              }
          }
          echo $res;
          ?>
        </tbody>
</table>
<script>
   setTimeout(function() { window.location=window.location;},2000);
</script>
</body>
</html>