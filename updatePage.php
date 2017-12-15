<?php
if(isset($_COOKIE['uname'])){
  $uname = $_COOKIE['uname'];
}

$file = $uname . "Profile.csv";
if(isset($_POST["bio"])){
  $fp = fopen($file,"r");
  $bio = fgetcsv($fp);
  $pic = fgetcsv($fp);
  fclose($fp);
  $fp = fopen($file,"w");
  $bio[0] = $_POST["bio"];
  fputcsv($fp,$bio);
  fputcsv($fp,$pic);
  fclose($fp);
}
require_once("profile.php");
?>
