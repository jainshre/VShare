<?php

session_start();
$username=$_SESSION['username'];
include 'dbconfig.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js" crossorigin="anonymous"></script>
    <title>VShare</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Raleway");

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Raleway;
            height: 100vh;
            background-color: #ecf0f1;
            overflow-y: auto;

        }

        .groups {
            
            position: relative;
            /* background: rgba(255, 255, 255, 0.05); */
            /* overflow: hidden; */
            /* background: red; */
            right: 1010px;
            top: 80px;
            /* z-index: 9; */
            margin: 20px;
            /* border-top: 1px solid rgba(255, 255, 255, 0.2);
            border-left: 1px solid rgba(255, 255, 255, 0.2); */
            /* box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.2); */
        }
        #grp ul{
            background: linear-gradient(to bottom right, #758EB7, #A5CAD2);

        }

        ul {
            top: 20%;
            list-style-type: none;
            width: 450px;
            height: 110px;
            margin-left: 50px;
            left: 20%;
            background: linear-gradient(to bottom right, #E4C7B7, #C26497);
            border-radius: 20px;
            transition: 0.3s;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            border-left: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.2);
            margin-left: 35px;
            margin-top: 20px;
            /* Remove bullets */
            /* padding: 0; */
            /* Remove padding */
            /* margin: 0; */
            /* Remove margins */
        }

        ul:hover {
            transform: translateY(-5px);
            /* transform: rotateX(100deg); */
            box-shadow: 0 4px 10px rgba(0, 0, 0, .1);
        }

        ul li {
            /* border: 1px solid #ddd; */
            border: none;
            outline: none;
            /* Add a thin border to each list item */
            margin-top: 19px;
            /*Prevent double borders */
            /* background-color: #f6f6f6; */
            background: transparent;
            /* Add a grey background color */
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            /* resize: none; */
            padding: 12px;
            /* Add some padding */
            cursor: pointer;
        }
        .gif {
            position: fixed;
            bottom: 0;
            right: 0;
            max-width: 100%;
            height: auto;
        }

        .input-icon {
            margin: 20px;
            /* color: #566473; */
            cursor: pointer;
        }

        .icon-btn {
            position: relative;
            display: inline-block;
            border: none;
            color: #566473;
        }

        .icon-btn::before,
        .icon-btn::after {
            content: "";
            display: block;
            position: absolute;
            width: 15%;
            height: 15%;
            border: 2px solid;
            transition: all 0.6s ease;
            border-radius: 2px;
        }

        .icon-btn::after {
            bottom: 0;
            right: 0;
            border-top-color: transparent;
            border-left-color: transparent;
            border-bottom-color: #566473;
            border-right-color: #566473;
        }

        .icon-btn::before {
            top: 0;
            left: 0;
            border-bottom-color: transparent;
            border-right-color: transparent;
            border-top-color: #566473;
            border-left-color: #566473;
        }

        .icon-btn:hover:after,
        .icon-btn:hover:before {
            width: 100%;
            height: 100%;
        }

        .icon-btn input[type="button"] {
            padding-left: 2em;
            border: none;
            outline: none;
            font-size: 20px;
            margin: 1em 0.8em;
            background: transparent;
            /* color: #566473; */
            /* border: 2px solid; */
        }

        .icon-btn .fas {
            display: inline-block;
            position: absolute;
            left: 0.65em;
            top: 30%;
            margin: 0.5em 0.5em;
        }

        p {
            font-family: 'Merriweather', serif;
            font-size: 20px;
            color: #0818A8;
            text-decoration: none;
        }
        a{
            text-decoration: none;
        }
        @media screen and (min-width:1024px) and (max-height:768px) {
            .groups{
                top: -20%;
                margin-left: 90%;
                /* left: 20px; */
            }
            #grp{
                margin-top: 60px;
            }
        }
        @media screen and (max-width:768px){
            .gif{
                display: none;
            }
            .groups{
                /* justify-content: space-between; */
                /* display: block; */
                position: relative;
                top: -5%;
                /* top: 4px; */
                right: 50px;
                margin: 10px;
                margin-left: 8%;

            }
            ul{
            /* top: 10px; */
            margin-top: 5px;
            list-style-type: none;
            width: 200px;
            height: 90px;
            margin-left: 45px;
            left: 60%;
        }
        ul li{
            padding: 5px;
            margin-top: 10px;
        }
        #grp{
                margin-top: 50px;
            }
        }

    </style>
</head>

<body>
    
    <form method="post" action="chatroom1.php">
    <a href="share2.php">
        <div class="input-icon">
            <span class="icon-btn">
                <i class="fas fa-arrow-left"></i>
                <input type="button" value="Go back">
            </span>
        </div>
    </a>
       
        <br>
        
    </form>
    <div class="gif">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_QpolL2.json" background="transparent"
            speed="1" style="width: 450px; height: 450px;" loop autoplay></lottie-player>
        <!-- <script src="disablebackbtn.js"></script> -->
    </div>
</body>

</html>

<?php

// session_start();
// $username=$_SESSION['username'];
// $conn=mysqli_connect("localhost","root","","file3");
// include 'dbconfig.php';

//display the grps created by the user 
$sql1="SELECT GroupID,UserRole from creategroup where UserName='$username'";
$res="";
$result1=mysqli_query($conn,$sql1);
if(mysqli_num_rows($result1)>0)
{
    while($row=mysqli_fetch_assoc($result1))
    {
        $id=$row['GroupID'];
        $res=$res.'<div class="groups">';
        $res=$res."&nbsp; &nbsp;";    
        $res=$res."<ul>";
        $res=$res.'<li><p><b><a style="text-decoration:none" href="http://localhost/finalchat1/chatroom1.php?roomname='.$row['GroupID'].'">'.$row['GroupID'].'</a></b></p>' .$row['UserRole'].'</li>  ';
        $res=$res.'</ul></div>';
    } 
}
echo $res;

//display the grps user has joined
$sql2="SELECT GroupID,UserRole from usergroups where UserName='$username'";
$res1="";
$result2=mysqli_query($conn,$sql2);
if(mysqli_num_rows($result2)>0)
{
    while($row=mysqli_fetch_assoc($result2))
    {
        
        // $res1=$res1.'<div class="groups" id="grp">';
        // $res1=$res1."<ul>";
        // $res1=$res1.'<li > <p><b>'.$row['GroupID']."</b></p>" .$row['UserRole'].'</a></li> ';
        // $res1=$res1.'</ul></div>';
        $res1=$res1.'<div class="groups" id="grp">';
        $res=$res."&nbsp; &nbsp;"; 
        $res1=$res1."<ul>";
        $res1=$res1.'<li > <p><b><a style="text-decoration:none" href="http://localhost/finalchat1/chatroom1.php?roomname='.$row['GroupID'].'">'.$row['GroupID'].'</a></b></p>' .$row['UserRole'].'</a></li> ';
        $res1=$res1.'</ul></div>';

    }
    
}
echo $res1;

//if the chat button next to search is found then is clicked after entering the groupId then forward them to chatroom page
// if(isset($_POST['submitmsg']))
// {
//     $_SESSION['room']=$_POST['usermsg'];
//     echo "<script>location.replace('chatroom.php')</script>";
// } -->

?>