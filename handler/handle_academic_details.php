<?php
//session_start();
if(isset($_POST['prev_school']) && isset($_POST['sc_district'])) {
	
	if(isset($_POST['c_name']) && isset($_POST['c_number']) && isset($_POST['cand_number']) && isset($_POST['year'])){
		$_SESSION['prev_school'] = $_POST['prev_school'];
		$_SESSION['sc_district'] = $_POST['sc_district'];
		$c_name = $_POST['c_name'];
		$c_number = $_POST['c_number'];
		$cand_number = $_POST['cand_number'];
		$year = $_POST['year'];
		
		for($i=0;$i<3;$i++) {
			if(!empty($c_name[$i]) && !empty($c_number[$i]) && !empty($cand_number[$i]) && !empty($year[$i])) {
				$_SESSION['c_name_'.$i] = $c_name[$i];
				$_SESSION['c_number_'.$i] = $c_number[$i];
				$_SESSION['cand_number_'.$i] = $cand_number[$i];
				$_SESSION['year_'.$i] = $year[$i];
				//echo $_SESSION['c_name_'.$i].' '.$_SESSION['c_number_'.$i].' '.$_SESSION['cand_number_'.$i].' '.$_SESSION['year_'.$i];
			}
		}//die();
	}
}
?>