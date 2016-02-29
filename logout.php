<?php
include_once('functions/functions.inc.php');
$name = $_SESSION['first_name'];
$id = $_SESSION['user_id'];


$user = new User();
$user->getId($name);

$userID = $_SESSION['userID'];
session_unset();
if($userID=$id){

	session_destroy();
	header('location:signin.php?logout=true');
	
	exit();
}
?>