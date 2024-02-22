<?php
session_start();
include 'dbconfig.php';
$name=$_SESSION['username'];





if(isset($_REQUEST["file"])){
    // Get parameter and decode URL-encoded string
    $file = urldecode($_REQUEST["file"]); 
    $room=urldecode($_REQUEST["room"]); 
    // Test whether the file name contains illegal characters
        
    // if(preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $file)){
        $filepath = "images/" . $file;
   
  // Process download
  if(file_exists($filepath)) 
  {
      $a="INSERT into downloadedfile (UserName,filename,GroupID,Sender) values('$name','$file','$room','null')";
      mysqli_query($conn,$a);
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="'
                                  .basename($filepath).'"');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($filepath));

      // Flush system output buffer
      flush(); 
      
      readfile($filepath);
      die();
  } 
  else 
  {
      http_response_code(404);
      die();
  }
} 
else
{
  die("Download cannot be processed");
}

?>