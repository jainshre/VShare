<?php
session_start();
include 'dbconfig.php';
$msg="";
if(isset($_POST['reset_pwd'])){
    $new_password = $_POST["pwd"];
    $confirm_password = $_POST["cpwd"];
    $username=$_SESSION['enteruname'];
    if($new_password == $confirm_password){
        $hash=password_hash($new_password,PASSWORD_DEFAULT);
        $query = "UPDATE users SET UserPassword = '$hash' where UserName='$username'";
        // $conn->query($query);
        mysqli_query($conn,$query);
        echo"<script>location.replace('login.php')</script>";

    }
    else{
        $msg="Confirm Password does not match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv = "refresh" content = "10; url = http://localhost/finalchat1/login.php" /> -->
    <title>VShare</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="center">
        <br>
        <h1>Reset Password</h1>
        <?php if($msg)
        {
            echo ' <div class="msg" style="visibility: visible;">';
            echo $msg;
            echo '</div>';
        }
        ?>
		<br>
        <form action="new_password.php" method="post">
            <div class="txt_field">
                <input type="password" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase, lowercase letter, and at least 8 or more characters" required>
                <label>Password </label>
                <span></span>
            </div>
            <div class="txt_field">
                <input type="password" name="cpwd"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase, lowercase letter, and at least 8 or more characters"required>
                <label>Confirm Password </label>
                <span></span>
            </div>
            <button type="submit" name="reset_pwd">Reset</button>
        </form>
    </div>
</body>
</html>