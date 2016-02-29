<?php
	session_start();
	if(isset($_POST['choice'])) {
		$choices = $_POST['choice'];
		$choice_array = array();
		foreach($choices as $choice){
			if($choice != 1) {
				array_push($choice_array, $choice);
			}
		}
		$_SESSION['choice_array'] = $choice_array;
		//$_SESSION['choices'] = $_POST['choice'];
		$choice_array;
	}
?>