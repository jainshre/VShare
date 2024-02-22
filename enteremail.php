<?php
include 'dbconfig.php';
session_start();
$msg="";
if(isset($_POST['send-otp']))
{
    $enteredemail=$_POST['email'];
    $sql="SELECT Email from users where Email='$enteredemail'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        $_SESSION['sendotpemail']= $enteredemail;
        $otp=rand(1,1000);
        $_SESSION['OTP']=$otp;
        mail($enteredemail,"VShare Notification","your otp is $otp");
        echo"<script>location.replace('entercode.php')</script>";
    }
    else
    {
        $msg= "no such user exists";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VShare</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="center">
        <br>
        <h1>Forgot UserName </h1>
        <?php if($msg)
        {
            echo ' <div class="msg" style="visibility: visible;">';
            echo $msg;
            echo '</div>';
        }
        ?>
        <br>
        <form action="enteremail.php" method="post">
            <div class="txt_field">
                <input type="email" name="email" required>
                <label>Email </label>
                <span></span>
            </div>
            <button type="submit" name="send-otp" >Send OTP</button>
            <!-- <a href="login.php">Home Page</a> -->
            
	</form>
    </div>
</body>
</html>