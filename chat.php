<?php
session_start();
include 'dbconfig.php';

$name=$_SESSION['username'];
if(isset($_POST['addchat']))
{
    $user=$_POST['search-google'];
    $sql="SELECT UserName from users where UserName='$user'";
    $yes=mysqli_query($conn,$sql);
    if(mysqli_num_rows($yes)==1)
    {
        $a="SELECT UserName,Receiver from adduser where UserName='$name' and Receiver='$user' ";
        $v=mysqli_query($conn,$a);
        if(mysqli_num_rows($v)==0)
        {
            $insert="INSERT into adduser (UserName,Receiver) values('$name','$user')";
            if(!mysqli_query($conn,$insert))
            {
                echo mysqli_error($conn);
            }
           
        }
    }
    else
    {
        echo 'no such user exist';
    }
}
if(isset($_POST['send_chat']))
{
    echo 'done';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VShare</title>
    

<!-- 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
 
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> -->
<!-- 
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> -->

 <!-- bootstrap model -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/b99e675b6e.js" crossorigin="anonymous"></script>

<style>
 .modal-content{
          margin-top: 50px;
    margin-left: 150px;
    width: 600px;
    height: 630px;
    padding: 60px 35px 35px 35px;
    border-radius: 40px;
    background: #ecf0f3;
    box-shadow: 10px 10px 17px #a2a8ad, -20px -20px 17px #8d9a9a;
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
  .chthead h4{
    margin-top: -40px;
    letter-spacing: 0.5px;
  }
  .chthead .fas{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    margin-top: -60px;
    margin-right: 10px;
    font-size: 26px;
    /* margin: 0; */
    border-radius: 50%;
    box-shadow: 0px 0px 2px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaaf, -8px -8px 15px #fff; 
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
.chat_history{
    margin-top: -45px;
    /* background: red; */
}
.upload{
    margin-left: 40px;
}
.modal-header{
    margin-top: -30px;
    color: #a2a8ad;
}
.close{
    display: flex;
    /* color: #a2a8ad; */
    background: black;
    align-items: center;
    justify-content: center;
    box-shadow: 7px 7px 16px 0 rgba(0,0,0,0.25),-7px -7px 16px 0 rgba(255,255,255,0.3);
    border-radius: 50%;
}
.close:active{
    box-shadow: 5px 5px 10px 0 rgba(0,0,0,0.3) inset, -5px -5px 12px 0 rgba(255,255,255,0.25)inset;
}
/* @media screen and (min-width:1024px) and (max-height:768px)
{
    .modal-content
    {
        margin-left: 100px;
    }
} */

@media screen and (max-width:768px)
{

    .chat_history
    {
        height:300px;
        width:450px;
        overflow-y: scroll;
        overflow-x:hidden; 
        margin-bottom:24px; 
        padding:16px;
        margin-left: -40px;
    }

    .modal-content
    {
        width: 350px;
        margin-left: 0px;
        height: 550px;
    }
    .fileupload
    {
        width: 100%;
        height: 30%;
        margin-left: 1px;
        
    }
    
    
    .msgblock
    {
        color: black;
        border: 2px solid #dedede;
        margin-left: 20px;
        height: 150px;
        width: 260px;
    }

    .margin{
    margin-left: 20px;
    }

    .anyclass{
        height: 350px;
        overflow-y:scroll;
    } 
    
}
@media screen and (min-width:1024px) and (max-height:768px) {
    .fileupload{
        height: 60px;
        width: 350px;
        margin-left: 25px;
    }
    .modal-content
    {
        margin-left: -10px;
        height: 570px;
        
    }
    
    .chat_history
    {
        height:300px;
        width:450px;
        overflow-y: scroll;
        overflow-x:hidden; 
        margin-bottom:24px; 
        padding:16px;
    }

    .msgblock{
    color: black;
    border: 2px solid #dedede;
    margin-left: 20px;
    height: 150px;
    }
    .margin{
    margin-left: 20px;
    
    }

    .anyclass{
        height: 350px;
        overflow-y:scroll;
    } 
    
    .btn-info{
        margin-left: 25px;
    }
}
    </style>
</head>
<body>
    <div class="dsp container" >
        <div class="row dsp">
            
            <form action="" method="post">
                <br>
                <input type="text" name="search-google" id="search-google" placeholder="Please search here...." class="form-control litanswer" style="width: 200px;">
                <button type="submit" name="addchat" class="btn btn-info" style="margin-top:-55px;margin-left:250px"><i class="fa fa-plus" ></i>&nbsp; ADD</button>
                <br>  
                <!-- <input type="submit" name="addchat" >  -->
            </form>  
        </div>
    </div>
        <br>
        <div id="uploadModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
        
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>          
                    </div>
                    <div class="chthead">
                        <i class="fas fa-user"></i> &nbsp; &nbsp; <h4 class="modal-title" id="myText"></h4>
                    </div>
                    <!-- <h4 class="modal-title" id="myText" style="margin-left: 5%;margin-top:2%"></h4> -->
                    <div class="modal-body">
                    <!-- Form -->
                    <div  class="chat_history" >
                        <div class="container ">
                            <div class="anyclass">
                            <div class="msgblock">

                            </div>
                            </div>
                        </div>
                    </div>
                        <form method='post' action='' enctype="multipart/form-data">
                                <input type='file' name='file' id='file' class='form-control fileupload'>
                                <br>
                                <input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
                        </form>
            
                
                    </div>
            
                </div>
        
            </div>
        </div>
        <div class="table-responsive">
            
            <table id="myTable" class="table table-bordered table-striped " style="width: 400px;margin-left:7%; overflow-y:auto">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>

                <tbody>
                    <?php
                    $res="";
                    $display="SELECT id,Receiver from adduser where UserName='$name'";
                    $value=mysqli_query($conn,$display);
                    if(mysqli_num_rows($value)>0)
                    {
                        while($row=mysqli_fetch_assoc($value))
                        {
                            $res .= '
                                        <tr>
                                        <td>'.$row['Receiver'].'</td>
                                        <td><button type="button" class="btn btn-info" data-toggle="modal" '.$row['Receiver'].' data-target="#uploadModal">Start Chat</button>
                                        
                                        </tr>
                                        ';
                        }
                    }
                    else
                    {
                        
                        $display1="SELECT id,UserName from adduser where Receiver='$name'";
                        $value1=mysqli_query($conn,$display1);
                        if(mysqli_num_rows($value1)>0)
                        {
                            while($row1=mysqli_fetch_assoc($value1))
                            {
                                $res .= '
                                <tr >
                                <td>'.$row1['UserName'].'</td>
                                <td><button type="button" class="btn btn-info" data-toggle="modal" id='.$row1['UserName'].' data-target="#uploadModal">Start Chat</button>
                                </tr>
                                ';
                            }
                        }
                    }
                    echo $res;
                    ?>
                </tbody>
            </table>
            
            <!-- <div id="user_model_details" style="float:right;margin-top:-10%;margin-left:-10%"> 
            <div id="user_dialog_" class="user_dialog" title="You have chat with ">
            <div style="height:300px;width:600px; border:1px solid #111; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" >
            </div>
            <div class="form-group">
                <form method="post"> 

                <input type="file"   class="form-control">
            </div>
                <div class="form-group" style="align-content: right;">
                <button type="submit" name="send_chat" class="btn btn-info send_chat">Send</button></div></form></div>
            </div> -->
        </div>
    

    

    <script type="text/javascript">

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
        var name;
        $(function() {
            $( "#search-google" ).autocomplete({
            source: 'auto_search.php',
            });
        });

        

        $(document).ready(function()
        {
            $("#myTable").on('click','.btn',function(){
                // get the current row
                var currentRow=$(this).closest("tr"); 
                
                var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
                document.getElementById("myText").innerHTML = col1;
                
            });

            

            $('#btn_upload').click(function(){

                
                
                var fd = new FormData();
                var reciever=document.getElementById("myText").innerHTML;
                fd.append('receiver',reciever);
                var files = $('#file')[0].files[0];
                fd.append('file',files);
                
                
                // AJAX request
                $.ajax({
                url: 'ajax.php',
                type: 'post',
                data:fd,
               
                contentType: false,
                processData: false
                });
                document.getElementById('file').value = "";
            });


         
        }); 
        setInterval(runFunction,1000);

        function runFunction()
        {
            var name=document.getElementById("myText").innerHTML;
            $.post("showchat.php",{reciever:name},
            function(data,status)
            {
            document.getElementsByClassName('chat_history')[0].innerHTML=data;
            }

            )
        }
        
    </script>
</body>
</html>