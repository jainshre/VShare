
<?php
session_start();
include 'dbconfig.php';
$name=$_SESSION['username'];
$query="SELECT Email from users where UserName='$name'";
$search=mysqli_query($conn,$query);
if(mysqli_num_rows($search)>0)

{
    while($row=mysqli_fetch_assoc($search))
    {
        $_SESSION['email']=$row['Email'];
    }
    
}

    

    //to join the group using unique id 
    if(isset($_POST['joingrp']))
    {
        
        
        $groupid=$_POST['enteredgrpid'];
        //echo "<script>alert('$groupid')</script>";
       
        //check if the entered groupId exists
        $sql = "SELECT * FROM creategroup WHERE GroupID = '$groupid'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            //if admin is trying to join his own created group then he will be not allowed as he can enter the chat room using gotogrp button
            $s="SELECT * from creategroup where UserName= '$name' and GroupID='$groupid'";
            $r=mysqli_query($conn,$s);
            if(mysqli_num_rows($r)>0)
            {
                
                echo "<script>alert('You have created the group so please click on Goto Grp')</script>";
                echo"<script>location.replace('share2.php')</script>";   
            }
            else
            {
                    
                //if user is not part of the grp then insert their name in the usergrp and forward them to chatroom
                $search = "SELECT * from usergroups where UserName='$name' and GroupID='$groupid'";
                $res=mysqli_query($conn,$search);
                if(mysqli_num_rows($res)==0)
                {
                    $participant='Participant';
                    $abc="INSERT INTO usergroups (UserName,GroupID,UserRole) VALUES (?,?,?)";
                    if($stmt=mysqli_prepare($conn,$abc))
                    {
                        mysqli_stmt_bind_param($stmt,"sss",$name,$groupid,$participant);
                        if(mysqli_stmt_execute($stmt))
                        {
                            echo "<script>alert('You are added in the Group please click on Goto Grp')</script>";
                            echo"<script>location.replace('share2.php')</script>";
                        } 
                    }
                    
                }
                else
                {
                    
                    echo "<script>alert('You are already a member of the group please click on Goto Grp')</script>";
                    echo"<script>location.replace('share2.php')</script>"; 
                    
                }
            }
    
        }
        else
        {
           
            echo "<script>alert('No such room exists')</script>";
            echo"<script>location.replace('share2.php')</script>";  
        }
    }
    if(isset($_POST['gotogrp']))
    {
        echo "<script>location.replace('rooms.php')</script>";
    }
    // if(isset($_POST['individualchat']))
    // {
    //     echo "<script>location.replace('http://localhost/login-signup/login.php')</script>";
    // }
    

    //$notify="SELECT count(AdminName) from groupnotify where AdminName='$name'";
    $notify=mysqli_query($conn,"SELECT * from groupnotify where AdminName='$name'");
    $notification=mysqli_num_rows($notify);

    //display User's Full Name
    $fname;
    $fullname="SELECT FullName from users where UserName='$name'";
    $value=mysqli_query($conn,$fullname);
    if(mysqli_num_rows($value)==1)
    {
        while($row=mysqli_fetch_assoc($value))
        {
            $fname=$row['FullName'];
        }
    }

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sharestyle.css"> 
    
     <link href="https://fonts.googleapis.com/css?family=Poppins:600" rel="stylesheet">
     <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
     <script src="https://kit.fontawesome.com/b99e675b6e.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <!-- Ajax Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>VShare</title>
<style>
  
/* CSS for buttons */
.button-51 {
  background-color: transparent;
  border: 1px solid #266DB6;
  box-sizing: border-box;
  color: #00132C;
  font-family: Garamond;
  font-size: 36px;
  font-weight: 700;
  line-height: 44px;
  padding: 16px 23px;
  position: relative;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}



.button-51:hover,
.button-51:active {
  outline: 0;
}

.button-51:hover {
  background-color: transparent;
  cursor: pointer;
}

.button-51:before {
  background-color: #D5EDF6;
  content: "";
  height: calc(100% + 3px);
  position: absolute;
  right: -7px;
  top: -9px;
  transition: background-color 300ms ease-in;
  width: 100%;
  z-index: -1;
}

.button-51:hover:before {
  background-color: #5b8ad1;
}


@media screen and (max-width:768px)
{
    .button-51
    {
        font-size: 20px;
        line-height: 20px;
        padding: 16px 26px;
    }
    #icon
    {
        /* margin-left: 60%; */
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        position: absolute;
        width: 50px;
        height: 50px;
        float: right;
        top: 10px;
        right: 100px;
        border-radius: 50%;
        box-shadow: 0px 0px 2px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaaf, -8px -8px 15px #fff; 
    }
    .profile .profile_details .name
    {
        right: 70px;
        
    }
}
@media screen and (min-width:1024px) and (max-height:768px)
{
    #icon
    {
        /* margin-left: 60%; */
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        position: absolute;
        width: 50px;
        height: 50px;
        float: right;
        top: 10px;
        right: 120px;
        border-radius: 50%;
        box-shadow: 0px 0px 2px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaaf, -8px -8px 15px #fff; 
    }
}

</style>
        
</head>
<body>
    
   <!-- Side navigation bar -->
   <div class="sidebar">
        <div class="logo_content">
        <div class="logo">
            <img src="logo2.png">
        </div> 
        <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <a href="notify.php">
                    <i class='bx bx-bell'><span class="badge"><?php echo $notification;?></span></i>
                    <span class="link_name">Notifications</span>
                </a>
                <span class="tooltip">Notifications</span>
            </li>

            <li>
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="link_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>

            <li>
                <a href="showdownloadedfiles.php">
                    <i class='bx bx-download'></i>
                    <span class="link_name">Downloads</span>
                </a>
                <span class="tooltip">Downloads</span>
            </li>

            <li>
                <a href="showuploadedfiles.php">
                    <i class='bx bx-upload'></i>
                    <span class="link_name">Uploads</span>
                </a>
                <span class="tooltip">Uploads</span>
            </li>
            
            <!-- <li>
                <a href="#">
                    <i class='bx bxs-star'></i>
                    <span class="link_name">Starred messages</span>
                </a>
                <span class="tooltip">Starredmessages</span>
            </li> -->
            
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="link_name">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>

            <!-- <li>
                <a href="#">
                    <i class='bx bxs-toggle-left'></i>
                    <span class="link_name">Dark Mode</span>
                </a>
                <span class="tooltip">Dark Mode</span>
            </li> -->
    

        </ul>
        
    </div>
<div class="logo_side">
    <img src="logo2.png">
</div>



    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">
                <i class="fas fa-user" id="icon"></i>
            <!-- <i class="fas fa-user icon" style="margin-left: 88%;top: 10px;display: flex;
    align-items: center;justify-content: center; border-radius: 50%; width: 50px;
    height: 50px;box-shadow: 0px 0px 2px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaaf, -8px -8px 15px #fff;font-size: 26px;
    position: absolute; "></i> -->
                <div class="name"><?php echo $fname;?></div>
                
            </div>
            <a href="logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
        </div>
    </div>
   
<!-- Cards -->
<form method="post" enctype="multipart/form-data" >

    <div class="card1">
        <div class="front-face">
            <div class="content front">
                <p><b>Generate Group ID </b></p>
            </div>
        </div>
        <div class="back-face">
            <div class="content back">
                    <button class="button-51" type="submit" name="generategrpid" id="generategrpid"><i class="fa fa-check-square" aria-hidden="true"></i> Generate ID</button>
            </div>
        </div>
    </div>
    
    <div class="card2">
        <div class="front-face">
            <div class="content front">
                <p><b>Go To Group</b></p>
            </div>
        </div>
        <div class="back-face">
            <div class="content back">
                <div class="card_back">
                    <button class="button-51" type="submit" name="gotogrp"> <i class="fa fa-comments" ></i> Go to Groups</button> 
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="card3">
        <div class="front-face">
                <div class="content front">
                    <p><b>Join Group</b></p>
                    
                </div>
        </div>
        
        <div class="back-face">
                <div class="content back">
                    <div class="card_back">
                        <button class="button-51" type="button" onclick="toggle()"><i class="fa fa-users" ></i> Join Group</button>
                    </div>
                </div>
        </div>
    </div> 
    
    <div id="popup">
        <form>
            <span class="Close" onclick="toggle()">&times;</span>
            <h3>Enter GroupId : </h3><br><br>
            <label class="input">
                <input class="input_field" type="text" placeholder="Enter groupid" name="enteredgrpid" > <br> <br>
            </label>
            <div class="button-group">
                <input  type="submit" value="Join" name="joingrp" id="joingrp" >
                
            </div>
        </form>
        
    </div>
    
    <div class="card4">
        <div class="front-face">
            <div class="content front">
                <p><b>Share To individual</b></p>
            </div>
        </div>
        <div class="back-face">
            <div class="content back">
                <div class="card_back">
                    <button class="button-51" type="submit" name="individualchat" onclick="window.location.href='chat.php'"><i class="fa fa-share-alt" ></i> Share</button>
                </div>
            </div>
        </div>
        
    </div> 
    
</form>
<footer class="sticky-footer">
    <p>V SHARE </p>

</footer>

<script >
    function toggle() {
        var popup = document.getElementById('popup');
        popup.classList.toggle('active');
    }
</script>



<script type="text/javascript">

window.history.pushState(null, "", window.location.href);
window.onpopstate = function () {
    window.history.pushState(null, "", window.location.href);
};

//  Prevent from submitting the form every time the page is refreshed
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

    //running the script of php and alert will display on same page without redirecting to new page
    //below code is for generating grp id
    $(document).ready(function(){
        $("#generategrpid").click(function(){
            
            $.ajax({
                url:'generategid.php',
                method:'POST',
                success:function(response){
                    alert(response);
                }
            });
            
        });

    });

    
  
</script>
</body>
</html>