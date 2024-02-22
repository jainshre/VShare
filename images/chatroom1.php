
<?php

session_start();
//$room=$_SESSION['room'];
$room=$_REQUEST['roomname'];
$username=$_SESSION['username'];

//insert the file shared into table
  include 'dbconfig.php';
  if(isset($_POST['submitmsg']))
  {
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
    //check if file is selected or not
    if (!empty($_FILES["usermsg"]["name"]))
    {
      $file_name=$_FILES['usermsg']['name'];
      $file_size=$_FILES['usermsg']['size'];
      $file_tmp=$_FILES['usermsg']['tmp_name'];
      $file_type=$_FILES['usermsg']['type'];
      $folder="images/".$file_name;
  
      $sql="INSERT into fileup (UserName,room,stime,originalname,size,tmpname,filetype) VALUES('$username','$room',CURRENT_TIMESTAMP,'$file_name','$file_size','$file_tmp','$file_type');";
      mysqli_query($conn,$sql);
      
      move_uploaded_file($file_tmp,$folder);
    }

        
  } 

  // if(isset($_POST['request']))
  // {
  //   $queryadmin="SELECT UserName From creategroup where GroupID ='$room'";
  //   $res=mysqli_query($conn,$queryadmin);
  //   if(mysqli_num_rows($res)>0)
  //   {
      
  //     while($row=mysqli_fetch_assoc($res))
  //     {
  //       $adminame=$row['UserName'];
  //       //get the admin email to send request through mail
  //       $queryemail="SELECT Email from users where UserName='$adminame'";
  //       $val=mysqli_query($conn,$queryemail);
  //       if(mysqli_num_rows($val)>0)
  //       {
          
  //         while($row1=mysqli_fetch_assoc($val))
  //         {
  //           $_SESSION['adminemail']=$row1['Email'];
  //           $email=$_SESSION['adminemail'];
            
  //           //check if user has already sent the request and his record is in the table groupnotify
  //           $checkentry="SELECT UserName from groupnotify where UserName='$username' and GroupID='$room' ";
  //           $entryrecord=mysqli_query($conn,$checkentry);
  //           if(mysqli_num_rows($entryrecord)==0)
  //           {
  //             $insertnotification="INSERT into groupnotify(GroupID,UserName,AdminName,time) Values ('$room','$username','$adminame',CURRENT_TIMESTAMP)";
  //             if(mysqli_query($conn,$insertnotification))
  //             {
  //               //sending notification through email
  //               mail($email,"VShare Notification","$username wants to send document in group $room");
  //               echo "<script>alert('Notification sent to Admin ')</script>";
                  
  //             }
  //             else
  //             {
  //               echo mysqli_error($conn);
  //             }
  //           }
  //           else
  //           {
  //             echo '<script type="text/javascript">alert("Code Sent Successfully"); </script>';
  //           }              
  //         }
  //       }
  //     }
  //   }
  

  // }

  
?>

<!DOCTYPE html>
<html>
<head>
  <title>VShare</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>  -->
<script src="https://kit.fontawesome.com/b99e675b6e.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
  *{
    margin: 0;
    padding: 0;
  }
body {
  /* background: linear-gradient(100deg, rgba(23, 190, 187, 1), rgba(240, 166, 202, 1)); */
  background-color: #E0E5EC;
  overflow-x: hidden;
  margin: 0 auto;
  max-width: 800px;
}
.chatbox{
  margin-top: 50px;
  margin-left: 150px;
  width: 530px;
  height: 630px;
  padding: 60px 35px 35px 35px;
  border-radius: 40px;
  background: #ecf0f3;
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #C9CED4;
}
.container {
  /* background-color: #f1f1f1; */
  background: transparent;
  /* background: red; */
  /* border-radius: 5px;
  padding: 10px;
  margin: 10px 0; */
}

.msgblock{
  color: black;
  font-size: 16px;
  border: 2px solid #dedede;
  margin-left: 20px;
  height: 150px;
  /* border: none; */
  outline: none;
  padding: 10px 5px 10px 3px;
}
.margin{
  margin-left: 20px;
}
.anyclass{
    height: 350px;
    overflow-y:auto;
    /* padding: 10px 5px 5px 5px; */
    /* background: red; */
} 
.removeuser .fa
{
  display: flex;
  align-items: center;
  justify-content: center;
  width: 50px;
  height: 40px;
  margin-right: -270px; 
  /* font-size: 46px; */
  /* margin: 0; */
  border-radius: 50%;
  box-shadow: 0px 0px 2px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaaf, -8px -8px 15px #fff; 

}
.chthead{
  /* position: fixed; */
  display: flex;
  /* background: #DA70D6; */
  top: 0;
  color: black;
  /* width: 500px; */
  /* height: 600px; */
  height: 60px;
  border-radius: 40px;
  width: 100%;
  border-bottom: none;
  padding-right: 25px;
  /* justifycontent: space-between; */
}
.chthead h2{
  margin-top: -10px;
  letter-spacing: 0.5px;
}
.chthead .fas{
  display: flex;
  align-items: center;
  justify-content: center;
  width: 60px;
  height: 60px;
  margin-top: -20px;
  margin-right: 10px;
  font-size: 26px;
  /* margin: 0; */
  border-radius: 50%;
  box-shadow: 0px 0px 2px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaaf, -8px -8px 15px #fff; 

}
/* .list
{
  overflow-y: auto;
  border: 1px solid #fff;
  background: rgba(255, 255, 255, 0.05);
  left: 100px;
  top: 50px;
  margin-left: -35%;
  margin-top: -65%;
  width: 150px;
  height: 350px;
  border-right: 1px solid #fff;
  height: 90%;
  border-radius: 0.2em;
  position: relative;
  box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.1);
} */
.input-icon {
    top: 0;
    right: 0;
    margin: 15px;
    /* color: #566473; */
    cursor: pointer;
}

.icon-btn {
    position: absolute;
    display: inline-block;
    border: none;
    color: #566473;
    /* color: white; */
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
    /* border-bottom-color: white; */
    border-right-color: #566473;
    /* border-right-color: white; */
}

.icon-btn::before {
    top: 0;
    left: 0;
    border-bottom-color: transparent;
    border-right-color: transparent;
    border-top-color: #566473;
    /* border-top-color: white; */
    border-left-color: #566473;
    /* border-left-color: white; */
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
    /* color: white; */
    font-size: 20px;
    margin: 1em 0.8em;
    background: transparent;
    /* color: #566473; */
    /* border: 2px solid; */
}

.icon-btn .fas {
    color: #36454f;
    display: inline-block;
    position: absolute;
    left: 0.65em;
    top: 30%; 
    margin: 0.5em 0.5em;
}

#icon {
    position: absolute;
    margin-top: 70px;
    margin-right:245px;
}
#icon1{
    position: absolute;
    margin-top: 190px;
    margin-right:245px;
}
.form-control{
    /* display: inline-flex; */
    margin-left:30px;
    /* margin-bottom: 20px; */
    margin-top: 30px;
    background: white;
    border-radius: 45px;
    box-shadow: 3px 3px 6px black;
    font-size: 16px;
    width: 240px;
    outline: none;
}
::-webkit-file-upload-button{
    color: white;
    padding: 10px;
    background: #206a5d;
    border: none;
    box-shadow: 1px 0 1px 1px #6b4559;
    border-radius: 45px;
    outline: none;
} 
::-webkit-file-upload-button:hover{
    background: #87C59F;
}
.input-group{
    display: flex;
    float: right;
    margin-top: 60px;
    bottom: 110px;
    margin-right: -10px;
    right: 10px;
    outline: none;
    width: 30%;
}
  /* .input-group .btn{
    display: flex;
    margin-top: 70px;
     
  } */
button[type=submit]:disabled{
    /* background: #A9A9A9; */
    background: white;
    color: gray;
}
.send{
    margin-top: -83px;
    margin-left: 330px;
}
.request{
    margin-top: -10px;
    margin-left: 30px;
}
#sidebar{
    position: absolute;
    top: 0;
    left: 1px;
    width: 250px;
    height: 100%;
    /* overflow: scroll; */
    /* background: #ADD8E6; */
    background: #000;
    left: -250px;
    transition: all 0.5s ease;
    /* opacity: 0.4; */
}
#sidebar ul {
    font-size: 20px;
    line-height: 1.5em;
    margin: 5px 0 15px;
    padding: 10px 12px;
    display: flex;
    color: white;
    justify-content: center;
    align-items: center;
}

ul.round li::before {
    content: "";
    position: absolute;
    left: 0;
    top: 10px;
    width: 10px;
    height: 10px;
    background-color: yellow;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
}

ul.circle li::before {
    content: "";
    position: absolute;
    left: 7px;
    top: 10px;
    width: 10px;
    height: 10px;
    background-color: #00FFFF;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
}

ul li {
   top: 30px;
    list-style: none;
    position: relative;
    padding: 0 0 0 35px;
   /* overflow-y: scroll; */
}
/* .participants{
  overflow-y: scroll;
} */
#sidebar .toggle-btn{
    height: 80px;
    width: 80px;
    margin: 7;
    /* overflow-y: scroll; */
    /* top: 30px;
    left: 330px; */
    margin-top: 15px;
    margin-left: 255px;
    box-shadow: 7px 7px 16px 0 rgba(0,0,0,0.25),-7px -7px 16px 0 rgba(255,255,255,0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
#sidebar.active{
left: 0;
}
.toggle-btn i{
    /* color: white; */
    font-size: 25px;
}
.toggle-btn .active{
    box-shadow: 5px 5px 10px 0 rgba(0,0,0,0.3) inset, -5px -5px 12px 0 rgba(255,255,255,0.25)inset;
}
.headbar{
    position: absolute;
    top: 0;
    width: 250px;
    height: 60px;
    background: white;
    color: black;
}
.headbar h4{
    font-family: 'Montserrat', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;

}
@media screen and (max-width:768px){
    body{
      overflow-x: hidden;
    }
    .chatbox{
        margin-top: 130px;
        margin-left: 50px; 
        width: 300px;
        height: 500px;
        /* padding: 60px 35px 35px 35px; */
        /* border-radius: 40px;
        background: #ecf0f3;
        box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #C9CED4; */
    }
    .icon-btn input[type="button"]{
        display: none;
    }
/* .icon-btn .fas {
  font-size: 24px;
      color: #36454f;
      /* display: inline-block; */
      /*position: absolute;
      left: 0.65em;
      top: 30%; 
      margin: 0.5em 0.5em;
    } */
    #room{
        height: 80px;
        width: 80px;
        border-radius: 50%;
        background: black;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        top: 18px;
        margin-left: 0px;
    }
    #icon1{
      position: absolute;
      margin-top: 40px;
      margin-right:195px;
    }
    #second{
        height: 80px;
        width: 80px;
        border-radius: 50%;
        background: #0070ff;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        top: 10px;
        margin-left: 70px;
    }
    .form-control{
        /* display: inline-flex; */
        margin-left:0px;
        /* margin-bottom: 20px; */
        margin-top: -100px;
        background: white;
        border-radius: 45px;
        box-shadow: 3px 3px 6px black;
        font-size: 10px;
        width: 160px;
        outline: none;
    }
    .send{
        margin-top: -83px;
        margin-left: 170px;
        /* height: 50px;
        width: 65px; */
        font-size: 12px;
    }
    .request{
        margin-top: -17px;
        margin-left: 30px;
        font-size: 12px;
    }
    
}
@media screen and (min-width:1024px) and (max-height:768px) {
    body{
        overflow: hidden;
    }
    .chatbox{
        margin-top: 10px;
        margin-left: 80px; 
        height: 600px;
    }
    .form-control{
        /* display: inline-flex; */
        margin-left:30px;
        /* margin-bottom: 20px; */
        margin-top: 6px;
        background: white;
        border-radius: 45px;
        box-shadow: 3px 3px 6px black;
        font-size: 16px;
        width: 260px;
        outline: none;
    }
    ::-webkit-file-upload-button{
        color: white;
        padding: 10px;
        background: #206a5d;
        border: none;
        box-shadow: 1px 0 1px 1px #6b4559;
        border-radius: 45px;
        outline: none;
    } 
    ::-webkit-file-upload-button:hover{
        background: #87C59F;
    }
    .input-group{
        display: flex;
        float: right;
        margin-top: 60px;
        bottom: 110px;
        margin-right: -10px;
        right: 10px;
        outline: none;
        width: 30%;
    }
    button[type=submit]:disabled{
        /* background: #A9A9A9; */
        background: white;
        color: gray;
    }
    .send{
        margin-top: -83px;
        margin-left: 330px;
    }
    .request{
        margin-top: -17px;
        margin-left: 30px;
    }
}


  
</style>
</head>
<body>
  <a href="rooms.php">
          <div class="input-icon" id="icon">
            <span class="icon-btn">
              <i class="fas fa-arrow-left" id="room"></i>
              <input type="button" value="Room page">
            </span>
          </div>
        </a>
        <a href="share2.php">
          <div class="input-icon" id="icon1">
            <span class="icon-btn">
              <i class="fas fa-arrow-left" id="second"></i>
              <input type="button" value="Second page">
            </span>
          </div>
        </a>
        
      <br>
<?php
  $res="";
  //check if user is admin or not 
  $sql="SELECT UserName from creategroup where GroupID='$room' and UserName='$username'";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) == 0)
  {
    //if the user is not admin give true to variable or else false
    $showButton=true;
  } 
  else
  {
    $showButton=false;
  } 
?>
<?php
  if ($showButton == false) {
?>
  <div class="removeuser">
    <a href="http://localhost/finalchat1/removeusers.php?room=<?php echo $room?>"><i class="fa fa-user-times" style="font-size:20px;float: right;color:#000"></i></a>
  </div>
<?php
  }
?>
<div class="chatbox">
    <div class="chthead">
        <i class="fas fa-users"></i> &nbsp; &nbsp; <h2> <?php echo $room ?> </h2>
    </div>
  
   <div class="container ">
      <div class="anyclass">
        <div class="msgblock">
  
        </div>
      </div>
    </div>
    
  
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" class="form-control" name="usermsg" id="usermsg">
    <!-- <input type="submit" class="btn btn-default" name="submitmsg" id="submitmsg" value="send"> -->
   
  <!-- check if the user is admin or participant if they are admin then dont display the request button to them
  if the user is participant then only display the request button -->
  
  <?php
  //since the user is a participant so disable the send button
    
  
      //check if the admin has given the permission or not
      $show;
      $checkper="SELECT Permission from groupnotify where UserName='$username' and GroupID='$room' and Permission='1'";
      $v=mysqli_query($conn,$checkper);
      if(mysqli_num_rows($v)>0)
      {
       
            $show=true;
      }   
      else
      {
            $show=false;
      }
      
      if ($showButton == false) {
  
  ?>
  
    <div class="input-group">
    
        <button type="submit" class="btn btn-dark btn-lg send1" name="submitmsg" id="submitmsg">Send</button>
            <!-- <input type="submit" class="btn btn-default" name="submitmsg" id="submitmsg" value="send" disabled> -->
            <!-- <input type="submit" class="btn btn-default" name="submitmsg" id="submitmsg" value="send" > -->
        <?php
            }
            elseif($show==true)
            {
            
        ?>
        <button type="submit" class="btn btn-dark btn-lg send"  name="submitmsg" id="submitmsg">Send </button>
        <!-- <input type="submit" class="btn btn-default" name="submitmsg" id="submitmsg" value="send" > -->
            <button type="submit" class="btn btn-danger btn-lg request" name="request" id="request">Request</button>
            <?php
            }
            elseif($show==false)
            {

        ?>
        <button type="submit" class="btn btn-dark btn-lg send" name="submitmsg" id="submitmsg" disabled> Send </button>
        <!-- <input type="submit" class="btn btn-default" name="submitmsg" id="submitmsg" value="send" disabled > -->
        <button type="submit" class="btn btn-danger btn-lg request" name="request" id="request">Request</button>
            <?php
            }
            else
            {
            ?>
            <button type="submit" class="btn btn-dark btn-lg send" name="submitmsg" id="submitmsg" disabled>Send</button>
            <!-- <input type="submit" class="btn btn-default" name="submitmsg" id="submitmsg" value="send" disabled > -->
            <button type="submit" class="btn btn-danger btn-lg request" name="request" id="request">Request</button>
            <?php
            }
            ?>
        </form>
    </div>
</div>
<!-- display the participants and admin of the group  -->
<div id="sidebar">
  <div class="toggle-btn" onclick="show()">
  <i class="fas fa-bars"></i>
  </div>
  <div class="headbar">
    <h4>User &nbsp; List </h4>
  <?php
        $admin="SELECT UserName from creategroup where GroupID='$room'" ;
        $a=mysqli_query($conn,$admin);
        $r='';
        if(mysqli_num_rows($a)>0)
        {
          while($row=mysqli_fetch_assoc($a))
          {
            $r=$r.'<div class="participants">';
            $r=$r.'<ul class="round"><li>'.$row['UserName'].' <br> Admin</li></ul></div>';
          }
        }
        echo $r;
    
        $grpusers="SELECT UserName from usergroups where GroupID='$room'";
        $b=mysqli_query($conn,$grpusers);
        $list='';
        if(mysqli_num_rows($b)>0)
        {
          while($row=mysqli_fetch_assoc($b))
          {
            
            $list=$list.'<div class="participants">';
            $list=$list.'<ul class="circle"><li>'.$row['UserName'].' <br></li></ul></div>';
          }
        }
        echo $list;
      ?>
  </div>
  <!-- <div class="list">  -->
  <!-- </div> -->
</div>

<script type="text/javascript">

//to prevent from sending empty text after reloading the webpage
if ( window.history.replaceState )
{ 
  window.history.replaceState( null, null, window.location.href ); 
} 

//check for new msg
setInterval(runFunction,1000);

function runFunction()
{

    $.post("htcont.php",{room:'<?php echo $room ?>'},
    function(data,status)
    {
      document.getElementsByClassName('anyclass')[0].innerHTML=data;
    }

    )
}

$(document).ready(function(){
    $("#request").click(function(){
        var room=<?php echo json_encode($room); ?>;
        $.ajax({
            url:'checkrequest.php',
            method:'POST',
            data:{
                room:room
            },
            success:function(response){
                alert(response);
            }
        });
    });
});
setInterval(regulardelete,1000);

function regulardelete()
{

  $.post("autodelete.php")
}



	

// function checkrequest()
// {
//   $.post("checkrequest.php",{room:''},
//     function(data,status)
//     {
//       document.getElementsByClassName('request');
//        alert('Notification sent');
//     }

//     )
// }

//disable sent button till file is selected 
// $(document).ready(
//   function(){
//       $('input:file').change(
//         function()
//         {
//           if ($(this).val()) 
//           {
//               $('input:submit').attr('disabled',false);
//           } 
//         }
//       );
// });

// $(document).ready(function(){ 
//   $('#request').click(function() {      
//     var btn = $(this);      
//     btn.prop('disabled', true);    
//     setTimeout(function() {         
//     btn.prop('disabled', false);     
//     },300000);   // enable after 5 seconds 
//   }); 
// });

//if the user clicks enter button then submit the msg
var input=document.getElementById("usermsg");

input.addEventListener("keyup",function(event){
    event.preventDefault();
    if(event.keyCode===13){
        document.getElementById("submitmsg").click();
    }
});
 
function show(){
  document.getElementById('sidebar').classList.toggle('active');
}
   

</script>

</body>
</html>

