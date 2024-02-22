

<?php
 session_start();
 include 'dbconfig.php';

 $name=$_SESSION['username'];
 $email=$_SESSION['email'];

//  set_time_limit(0);
// while(true) {
//     delete($conn);
//     sleep(1);
// }
// function delete($conn)
// {
//     $sql = "DELETE FROM groupnotify WHERE Permission==1 and Permission_Time < CURRENT_TIMESTAMP ";
//     if (mysqli_query($conn,$sql) ) {
//         echo "<script>alert('removed')</script>";
//     }
//     else
//     {
//         echo 'not';
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>VShare</title>
</head>
<body>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Group ID</th>
            <th scope="col">User Name</th>
            <th scope="col">Time</th>
            <th scope="col">Accept</th>
            <th scope="col">Decline</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr> -->
          <?php
          $res='';
          $a="SELECT GroupID,UserName,srno,time from groupnotify where AdminName='$name'";
          $msg=mysqli_query($conn,$a);
          if(mysqli_num_rows($msg)>0)
          {
              while($row=mysqli_fetch_assoc($msg))
              {

                  $id=$row["srno"];
                  $res=$res.'<tr>';
                  $res=$res.'<th scope="row">'.$row['GroupID'].'</th>';
                  $res=$res.'<td>'.$row['UserName'] .'</td>';
                  $res=$res.'<td>'.$row['time'] .'</td>';
                  $res=$res.'<td ><a href="accept.php?id='.$id.'" >Accept</a></td>';
                  $res=$res.'<td><a href="delete.php?id='.$id.'">Decline</a></td>';
                  $res=$res.'</tr>';
              }
          }
          echo $res;
          ?>
        </tbody>
      </table>  
    <script type="text/javascript">

   

    </script>
</body>
</html>