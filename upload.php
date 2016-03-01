<?php
$pageTitle = 'Форма за качване на файлове';
include 'includes/header.php';


#if user is not autorized redirect him in index.php
if( !key_exists('is_logged',$_SESSION) || $_SESSION['is_logged']==0  ){ 
         header('Location: index.php');
         die;
}
# slaga utf-8 encoding za da raboti kirilica
mb_internal_encoding('UTF-8');



?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>


 <?php
 include 'includes/footer.php';
 

if($_POST){
    mb_internal_encoding('UTF-8');
   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   // Check if image file is a actual image or fake image
   if(isset($_POST["submit"])) {
       $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
       if($check !== false) {
           echo "File is an image - " . $check["mime"] . ".";
           $uploadOk = 1;
       } else {
           echo "File is not an image.";
           $uploadOk = 0;
       }
   }
   // Check if file already exists
   if (file_exists($target_file)) {
       echo "Sorry, file already exists.";
       $uploadOk = 0;
   }
   // Check file size
   if ($_FILES["fileToUpload"]["size"] > 5000000) {
       echo "Sorry, your file is too large.";
       $uploadOk = 0;
   }
   // Allow certain file formats
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "gif" ) {
       echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
       $uploadOk = 0;
   }
   // Check if $uploadOk is set to 0 by an error
   if ($uploadOk == 0) {
       echo "Sorry, your file was not uploaded.";
   // if everything is ok, try to upload file
   } else {
       if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], 
               'files'.DIRECTORY_SEPARATOR.$_FILES["fileToUpload"]["name"])) {
           echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
       } else {
           echo "Sorry, there was an error uploading your file.";
       }
 
   }
}
  $_SESSION['is_logged']  == 1 ;{
    echo '<a href="destroy.php">EXIT</а></br>';
    echo '<a href="home.php">Качени файлове</а></br>';
   }

?>
