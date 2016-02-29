<?php
	include_once('functions/functions.inc.php');
	include_once('handler/handle_next_of_kin_details.php');
	if(!isset($_SESSION['user_id'])) {
		header('location: signin.php?login=false');
	}
	$exam_years = new System();
	$exam_years->getYear();
	
	if(isset($_POST['next'])) {
		header('location:choices.php');
	}
?>
<html>
	<head>
		<title>UAS :: Academic details</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/uos-main.css">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12 uas-header">
					<?php include_once('includes/header.php'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php //include_once('includes/hornav.php'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				&nbsp;
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?php include_once('includes/sidemenu.php'); ?>
				</div>
				<div class="col-md-9">
				<form class="uos-form uos-form-aligned" action="choices.php" method="post" autocomplete="on" >
					Number of times you sat for MSCE examination 
					<select id="number" onchange="return insertFields()">
						<option>1</option>
						<option>2</option>
						<option>3</option>
					</select>
					<div id="field"></div>
					</form>
				</div>
			</div>
			<div class="row">
				<?php include_once('includes/footer.inc'); ?>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript">
		function insertFields() {
			var option = $('#number');
			if (option.val() == 1){
				$('#field').html("Enter year of exam: <select id='nested_field' onchange='return getNestedFields()'><option>2013</option><option>2014</option><option>2015</option></select><div id='nested'></div>");
			}else if (option.val() == 2) {
				document.getElementById('field').innerHTML="First seating: <select id='nested_field' onchange='return getNestedFields()'><option>2013</option><option>2014</option><option>2015</option></select><div class='nested'></div><br>Second seating: <select><option>2013</option><option>2014</option><option>2015</option></select><div class='nested'></div><br>";
			}else if (option.val() == 3) {
				document.getElementById('field').innerHTML="First seating: <select id='nested_field' onchange='return getNestedFields()'><option>2013</option><option>2014</option><option>2015</option></select><div class='nested'></div><br>Second seating: <select><option>2013</option><option>2014</option><option>2015</option></select><div class='nested'></div><br>Third seating: <select><option>2013</option><option>2014</option><option>2015</option></select><div class='nested'></div><br>";
			}
		}
		function getNestedFields() {
			$('.nested').html("<label>Centre name :</label><br><input type='text' name='c_name[]'><label>Centre # :</label><br><input type='text' name='c_number[]'><label>Candidate # :</label><br><input type='text' name='cand_number[]'>");
		}
	</script>
</html>