<?php
include_once("functions/functions.inc.php");

$userId=$_GET["q"];
$fname=$_GET["p"];
$lname=$_GET["r"];
$dob=$_GET["s"];
$sex=$_GET["t"];
//echo $userId;
$user_details= new User();
$user_details -> checkUser($userId,$fname,$lname,$dob,$sex);//check if user name already exist.
 ?>