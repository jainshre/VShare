
<?php 
include 'dbconfig.php';
  // Store the name of the file in a variable
  $file = $_GET['FILE']; 
  $filepath = "images/" . $file;
  // // Header Content Type
  // header("Content-type: application/pdf");
  
  // header("Content-Length: " . filesize($filepath));
  
  // // Send the file to the browser.
  // readfile($filepath);
    

$file_parts = pathinfo($file);

switch($file_parts['extension'])
{
    case "pdf":
      // Header Content Type
      header("Content-type: application/pdf");
      
      header("Content-Length: " . filesize($filepath));
      
      // Send the file to the browser.
      readfile($filepath);
    break;

    case 'jpg':
      echo '<img src="'.$filepath.'">';
      // header("Content-Type: image/jpeg");
      // header("Content-Length: " . filesize($filepath));
      // readfile($filepath);
      // header('Content-Type: image/gif');
      // $image= file_get_contents($filepath);
      // echo $image;
      // $src = imagecreatefromjpeg($filepath);
      // header("Content-Type: image/jpeg");
      // imagejpeg($src);


    break;

    case 'png':
      echo '<img src="'.$filepath.'">';
    break;

    case 'docx': 
      //echo '<iframe src="http://docs.google.com/gview?url='.$filepath.'&embedded=true" width="90%" height="500px">';
        //echo '<iframe src= "'.$filepath.'" width="100%" height="800"> </iframe>'; 
      //  echo '<iframe src="https://docs.google.com/viewer?url="'.$filepath.'"&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>';
        
    break;

    case 'txt':
    case 'php':
    
      $contents=file_get_contents($filepath);
      $lines=explode("\n",$contents);
      foreach($lines as $line){
      echo $line.'<br>';
      }
    break;
    case 'html':
      $txt_file = $filepath;

      $lines = file($txt_file);
      foreach ($lines as $num=>$line)
      {
       echo htmlspecialchars($line).'<br/>';
      }
    break;
}

?>