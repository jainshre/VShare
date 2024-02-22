 <?php
include 'dbconfig.php';
session_start();
$msg="";
$email="";
if(isset($_POST['send_otp']))
{
    $entereduname=$_POST['username'];
    $_SESSION['enteruname']=$entereduname;
    $sql="SELECT UserName from users where UserName='$entereduname'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        $sql1="SELECT Email from users where UserName='$entereduname'";
        $result1=mysqli_query($conn,$sql1);
        while($row=mysqli_fetch_assoc($result1))
        {
            $email=$row['Email'];
        }
        
        $otp=rand(1,1000);
        $_SESSION['OTP']=$otp;
        if(!mail($email,"VShare Notification","your otp is $otp"))
        {
            echo mysqli_error($conn);

        }
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
        <h1>Forgot Password </h1>
        <?php if($msg)
        {
            echo ' <div class="msg" style="visibility: visible;">';
            echo $msg;
            echo '</div>';
        }
        ?>
        <br>
        <form action="enterusername.php" method="post">
            <div class="txt_field">
                <input type="text" name="username" required>
                <label>username </label>
                <span></span>
            </div>
            <button type="submit" name="send_otp" >Submit</button>
            <!-- <a href="login.php">Home Page</a> -->
    </div>
</body>
</html>