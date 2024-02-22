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
    <title>VShare</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Files</th>
            <th scope="col">GroupID</th>
            <th scope="col">Sender</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $res='';
            $a="SELECT filename,GroupID,Sender from downloadedfile where UserName='$name'";
            $b=mysqli_query($conn,$a);
            if(mysqli_num_rows($b)>0)
            {
                while($row=mysqli_fetch_assoc($b))
                {
  
                    $res=$res.'<tr>';
                    $res=$res.'<th scope="row"><a href="download.php?file='.$row['filename'].'">'.$row['filename'].'</a></th>';
                    $res=$res.'<td>'.$row['GroupID'].'</td>';
                    $res=$res.'<td>'.$row['Sender'].'</td>';
                    
                    $res=$res.'</tr>';
                }
            }
            echo $res;
            ?>
        </tbody>
      </table>  
</body>
</html>