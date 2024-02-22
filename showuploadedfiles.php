<?php
session_start();
include 'dbconfig.php';
$name=$_SESSION['username'];

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
            <th scope="col">files</th>
            <th scope="col">one-to-one</th>
          </tr>
        </thead>
        <tbody>
          
          <?php
            $res='';
            $a="SELECT room,originalname from fileup where UserName='$name'";
            $b=mysqli_query($conn,$a);
            if(mysqli_num_rows($b)>0)
            {
                while($row=mysqli_fetch_assoc($b))
                {
  
                    $res=$res.'<tr>';
                    $res=$res.'<th scope="row">'.$row['room'].'</th>';
                    $res=$res.'<td><a href="download.php?file='.$row['originalname'].'">'.$row['originalname'].'</a></td>';
                    $res=$res.'<td>--</td>';
                    
                    $res=$res.'</tr>';
                }
            }
            echo $res;

            $res1='';
            $a1="SELECT Receiver,originalname from individual where Sender='$name'";
            $b1=mysqli_query($conn,$a1);
            if(mysqli_num_rows($b1)>0)
            {
                while($row1=mysqli_fetch_assoc($b1))
                {
  
                    $res1=$res1.'<tr>';
                    $res1=$res1.'<th scope="row">--</th>';
                    $res1=$res1.'<td><a href="downloadindi.php?file='.$row1['originalname'].'">'.$row1['originalname'].'</a></td>';
                    $res1=$res1.'<td><b>'.$row1['Receiver'].'</b></td>';
                    
                    $res1=$res1.'</tr>';
                }
            }
            echo $res1;

          ?>
        </tbody>
      </table>  

</body>
</html>