<?php
if(isset($_COOKIE['uname'])){
  $uname = $_COOKIE['uname'];
}

$file = $uname . "Profile.csv";
if(isset($_POST["bio"])){
  $fp = fopen($file,"w");
  $data = fgetcsv($fp,0,'|');
   $data[0] = $_POST["bio"];
   fputcsv($fp,$data,"|");
   fclose();
}
require_once("profile.php");
?>
