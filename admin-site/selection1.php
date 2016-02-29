<?php
	include_once('../functions/functions.inc.php');
	
	if(isset($_POST['submit'])) {
		if(isset($_GET['dist']) && isset($_GET['space'])) {
			$district = $_GET['dist'];
			$space = $_GET['space'];
			
			$select = new Selection();
			$select->select($district, $space);
			header('location:selection.php');
			
		}
		
	}
?>