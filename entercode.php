<?php
include 'dbconfig.php';
session_start();
$msg="";
if(isset($_POST['checkotp_uname']))
{
    $enteredotp=$_POST['otp'];
    if($enteredotp==$_SESSION['OTP'])
    {
        unset($_SESSION['OTP']);
        echo"<script>location.replace('new_username.php')</script>"; 
    }
    else
    {
        $msg="Check your otp again";
    }
}
if(isset($_POST['checkotp_pwd']))
{
    $enteredotp=$_POST['otp'];
    if($enteredotp==$_SESSION['OTP'])
    {
        unset($_SESSION['OTP']);
        echo"<script>location.replace('new_password.php')</script>"; 
    }
    else
    {
        $msg="Check your otp again";
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
        <h1>Code Verification</h1>
        <?php if($msg)
        {
            echo ' <div class="msg" style="visibility: visible;">';
            echo $msg;
            echo '</div>';
        }
        ?>
        <br>
        <form action="entercode.php" method="post">
            <div class="txt_field">
                <input type="number" name="otp" required>
                <label>Enter Code </label>
                <span></span>
            </div>
            <button type="submit" name="checkotp_pwd">Submit and Change Password</button>
            <button type="submit" name="checkotp_uname">Submit and Get UserName</button>
        </form>
    </div>

</body>
</html>