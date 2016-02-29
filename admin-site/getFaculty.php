<?php
	include_once("../functions/functions.inc.php");
	
	 $q=$_GET["q"];
	//die();
	$choices= new Programs();
	$choices -> getFaculty($q);//check if user name already exist.
?>