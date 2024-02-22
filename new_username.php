<?php
session_start();
include 'dbconfig.php';
$email=$_SESSION['sendotpemail'];
$msg="";
if(isset($_POST['g_user_name']))
{
	$name="SELECT UserName from users where Email='$email'";
	$result=mysqli_query($conn,$name);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$username=$row['UserName'];
			
			if(mail($email,"VShare Notification","We received your request regarding the Username. This is your Username $username"))
			{
				$msg="Check your Email for the UserName";
				
			}
			// echo"<script>location.replace('index.php')</script>"; 
		}
	}
	else
	{
		echo mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv = "refresh" content = "10; url = http://localhost/finalchat1/login.php" />
<title>Document</title>
<link rel="stylesheet" href="style1.css">
<style>

</style>
</head>
<body>
	<div class="center">
		<br>
		<h1>Get Your UserName</h1>
		<?php if($msg)
        {
            echo ' <div class="msg" style="visibility: visible;">';
            echo $msg;
            echo '</div>';
        }
        ?>
		<br>
		<form class="login-form" action="new_username.php" method="post">
		<button type="submit" name="g_user_name">Get UserName</button>
		</form>
	</div>
</body>
</html>