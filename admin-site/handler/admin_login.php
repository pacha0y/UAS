<?php
	if(isset($_POST['login'])){
		if(isset($_POST['user_id']) && isset($_POST['password'])){
			$user_id = $_POST['user_id'];
			$password = md5($_POST['password']);
			$login = new User();
			$login->adminLogin($user_id,$password);
		}
	}
?>