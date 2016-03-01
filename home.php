<?php
$pageTitle = 'Качени файлове';
include 'includes/header.php';
if (!key_exists('is_logged', $_SESSION) || $_SESSION['is_logged'] == 0) {
  header('Location: index.php');
    die;
}       
$dir = './files';
$files = array_slice(scandir($dir), 2);
//$files = scandir($dir);

foreach ($files as $value){
    //echo '<pre>'.print_r($value, TRUE).'</pre>'; 
    
  echo '<a href="./download.php?download_file='.$value.'" >'.$value.'</a></br>';
}
 ?>
