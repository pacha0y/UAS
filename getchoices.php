<?php
	include_once("functions/functions.inc.php");
	
	 $q=$_GET["q"];
	//die();
	$choices= new Programs();
	$choices -> getProgram($q);//check if user name already exist.
?>