<?php

include 'dbconfig.php';
//$a="SELECT uName,stime,Endtime, TIMESTAMPDIFF(SECOND, stime, Endtime) from insertdata";

// $a="DELETE from insertdata where TIMESTAMPDIFF(SECOND, stime, Endtime)>10";
// if(mysqli_query($conn,$a))
// {
//     echo 'done';
// }
//delete the messages in groupnotify if the permission_time is greater than 1 min
$a="DELETE from groupnotify where TIMESTAMPDIFF(SECOND, Permission_Time,CURRENT_TIMESTAMP )>60";
mysqli_query($conn,$a);

?>