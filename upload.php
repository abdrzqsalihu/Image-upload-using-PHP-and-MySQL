<?php
include 'connect.php';

if (isset($_POST['upload'])) {
    $imgname = $_FILES['ImageFile']['name'];
  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES["ImageFile"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Generate Random String 
  function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
  }
  $random_text = generateRandomString(); 
  $new_img_name = $random_text.'.'.$imgname;

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
     // Upload file
     if(move_uploaded_file($_FILES['ImageFile']['tmp_name'],$target_dir.$new_img_name)){
        // Insert record
        $query = "insert into images(img) values('".$new_img_name."')";
        
        if (mysqli_query($conn,$query)) {
            echo "<script>alert('Image Uploaded Successfully')</script>";
            header('location: index.php');				
        }else{
            echo "<script>alert('Something went wrong, Please try again!')</script>";				
        }
     }

  }

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Using PHP and MySQL</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>File Upload</h2>
<p class="lead">Using <b>PHP</b></p>

<!-- Upload  -->
<form id="file-upload-form" class="uploader" action="" method="POST" enctype="multipart/form-data">
    
  <input id="file-upload" type="file" name="ImageFile" required accept="image/*" />

  <label for="file-upload" id="file-drag" style="cursor:pointer">
    <img id="file-image" src="#" alt="Preview" class="hidden">
    <div id="start">
      <i class="fa fa-download" aria-hidden="true"></i>
      <div>Select a file or drag here</div>
      <div id="notimage" class="hidden">Please select an image</div>
      <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
    </div>
    <div id="response" class="hidden">
      <div id="messages"></div>
      <progress class="progress" id="file-progress" value="0">
        <span>0</span>%
      </progress>
    </div>
  </label>
  <a href="index.php" class="btn btn-back">Back</a>
  <button type="submit" name="upload" class="btn btn-upload">Upload file</button>
</form>


<script src="js/script.js"></script>
</body>
</html>