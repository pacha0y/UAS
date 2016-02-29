<?php
include_once('../functions/functions.inc.php');

	if(isset($_SESSION['admin_user']) && isset($_SESSION['user_name']) && isset($_SESSION['level'])){
		session_destroy();
		header('location:signin.php');
	exit();
}
?>