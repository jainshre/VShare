<?php
session_start();
include 'dbconfig.php';

$username=$_SESSION['username'];
$receiver=$_POST['reciever'];

$out='';
$sql="SELECT Sender,Receiver,stime,originalname FROM individual WHERE Sender='$username' and Receiver='$receiver' or Sender='$receiver' and Receiver='$username'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        if($username==$row['Sender'])
        {
            $out=$out.'<div class="split right">';
            
            $out=$out.'<div class="msgblock" ">';
            $out=$out. '<br><b class="margin"> You </b><br>';
            $out=$out.' <p class="margin"> <a href="downloadindi.php?file='.$row['originalname'].'&sender='.$row['Sender'].'">'.$row['originalname'].'</a></p><br>';
            $out=$out.'<p class="margin"> '.$row["stime"].'</p></div></div></div>';
        }
        else
        {

            $out=$out.'<div class="split right">';
            
            $out=$out.'<div class="msgblock">';
            $out=$out. '<br><b class="margin">'.$row['Sender'].' says  </b><br>';
            $out=$out.' <p class="margin"> <a href="downloadindi.php?file='.$row['originalname'].'&sender='.$row['Sender'].'">'.$row['originalname'].'</a><br>';
            $out=$out.'<p class="margin"> '.$row["stime"].'</div></div></div>';
        }
    }
}
echo $out;

?>