<?php
//session_start();
	if(isset($_POST['nok_name'])
	&& isset($_POST['nok_occupation'])
	&& isset($_POST['nok_address'])
	&& isset($_POST['nok_tel'])
	&& isset($_POST['nok_mobile'])
	&& isset($_POST['nok_email'])){
	
	$_SESSION['nok_name'] = $_POST['nok_name'];
	$_SESSION['nok_occupation'] = $_POST['nok_occupation'];
	$_SESSION['nok_address'] = $_POST['nok_address'];
	$_SESSION['nok_tel'] = $_POST['nok_tel'];
	$_SESSION['nok_mobile'] = $_POST['nok_mobile'];
	$_SESSION['nok_email'] = $_POST['nok_email'];
}
?>