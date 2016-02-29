<?php
	include_once('functions/functions.inc.php');
	include_once('includes/handle_deposit_details.php');
	if(!isset($_SESSION['user_id'])) {
		header('location: signin.php?login=false');
	}
	
	if(isset($_POST['submit'])) {
		$exam_id = $_SESSION['user_id'];
		
		$checkapplication = new Application();
		$checkapplication->checkApplication($exam_id);
		if(isset($_SESSION['applicant_err'])) {
			header('location:submit.php?submit_err=true');
		}
		$pass_photo = $_SESSION['pass_photo'];
		$surname = $_SESSION['surname'];
		$firstname = $_SESSION['firstname'];
		$initial = $_SESSION['initial'];
		$dob = $_SESSION['dob'];
		$sex = $_SESSION['sex'];
		$nationality = $_SESSION['nationality'];
		$district = $_SESSION['district'];
		$t_a = $_SESSION['t_authority'];
		$village = $_SESSION['village'];
		$addr = $_SESSION['c_address'];
		$tel = $_SESSION['c_tel'];
		$mobile = $_SESSION['c_mobile'];
		$email = $_SESSION['c_email'];
		$nok_name = $_SESSION['nok_name'];
		$occupation = $_SESSION['nok_occupation'];
		$nok_addr = $_SESSION['nok_address'];
		$nok_tel = $_SESSION['nok_tel'];
		$nok_mobile = $_SESSION['nok_mobile'];
		$nok_email = $_SESSION['nok_email'];
		$prev_school = $_SESSION['prev_school'];
		$sc_distr = $_SESSION['sc_district'];
		$choices = $_SESSION['choice_array'];
		$bank_name = $_SESSION['bank_name'];
		$bank_branch = $_SESSION['bank_branch'];
		$dep_name = $_SESSION['depositor_name'];
		$dep_number = $_SESSION['depositor_mobile'];
		$dep_slip = $_SESSION['deposit_slip'];
		$_SESSION['years'] = array();
		
		$candidate_details = new Application();
		$candidate_details->addApplicantsDetails($exam_id,$surname, $firstname, $initial, $sex, $dob, $nationality, $pass_photo);
		$candidate_details->addContacts($exam_id,$district,$t_a,$village,$addr,$tel,$mobile,$email);
		$candidate_details->addNextofkinDetails($exam_id,$nok_name,$occupation,$nok_addr,$nok_tel,$nok_mobile,$nok_email);
		$candidate_details->addAcademicHistory($exam_id, $prev_school, $sc_distr);
		$candidate_details->addPaymentDetails($exam_id, $bank_name, $bank_branch, $dep_name, $dep_number, $dep_slip);
		for($i=0;$i<3;$i++) {
			if(isset($_SESSION['c_name_'.$i]) && isset($_SESSION['c_number_'.$i]) && isset($_SESSION['cand_number_'.$i])) {
			$c_name[$i] = $_SESSION['c_name_'.$i];
			$c_number[$i] = $_SESSION['c_number_'.$i];
			$cand_number[$i] = $_SESSION['cand_number_'.$i];
			$year[$i] = $_SESSION['year_'.$i];			
			//array_push($_SESSION['years'], $year[$i]); 	
				$candidate_details->addExamDetails($exam_id,$c_name[$i],$c_number[$i],$cand_number[$i], $year[$i]);
			}
		}
		//$candidate_details = getMinGrade($_SESSION['years']);
		$priority = 1;
		foreach($choices as $choice){
			$candidate_details->addChoices($exam_id,$choice, $priority);
			$priority++;
		}
			
	}
?>