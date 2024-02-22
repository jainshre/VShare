<?php
session_start();
$username=$_SESSION['username'];
$room=$_POST['room'];
include 'dbconfig.php';

//display all the messages
$sql="SELECT UserName,originalname,TIME_FORMAT(stime, '%r') as stime, DATE_FORMAT(stime, '%d %b %Y') as sdate FROM fileup WHERE room='$room'";
$html_content="";
$res="";
$result=mysqli_query($conn,$sql);
// if(mysqli_num_rows($result)>0)
// {
//     while($row=mysqli_fetch_assoc($result))
//     {
//         $res=$res.'<div class="container">';
//         $res=$res.'<div class="msgblock">';
//         $res=$res. '<br><b class="margin">'.$row['UserName'].' says  </b><br>';
//         $res=$res.' <p class="margin"> <a href="download.php?file='.$row['originalname'].'">'.$row['originalname'].'</a><br>';
//         $res=$res.'<p class="margin"> '.$row["stime"].'</div></div>';
//     }
// }
// echo $res;

if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        if($username==$row['UserName'])
        {
            $res=$res.'<div class="container">';
            $res=$res.'<div class="msgblock">';
            $res=$res.$row['sdate'];
            $res=$res. '<br><b class="margin" style="float:right;margin-right:25px;" > You  </b><br>';
            $res=$res.' <p class="margin" style="float:right;clear:right;margin-right:25px;"> <a href="download.php?file='.$row['originalname'].'&room='.$room.'">'.$row['originalname'].'</a><br>';
            $res=$res.'<a href="view.php?FILE='.$row['originalname'].'" >view</a>';
            $res=$res.'<p class="margin" style="float:right;clear:right"> '.$row["stime"].'</div></div>';
        }
        else
        {
            $res=$res.'<div class="container">';
            $res=$res.'<div class="msgblock">';
            $res=$res.$row['sdate'];
            $res=$res. '<br><b class="margin">'.$row['UserName'].' says  </b><br>';
            $res=$res.' <p class="margin"> <a href="download.php?file='.$row['originalname'].'&room='.$room.'">'.$row['originalname'].'</a><br>';
            $res=$res.'<a href="view.php?FILE='.$row['originalname'].'" >view</a>';
            $res=$res.'<p class="margin"> '.$row["stime"].'</div></div>';
        }
       
    }
}
echo $res;




    

?>