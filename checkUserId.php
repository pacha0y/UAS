<?php
include_once("functions/functions.inc.php");

$userId=$_GET["q"];
$user_details= new User();
$user_details -> checkUsername($userId);//check if user name already exist.
 ?>