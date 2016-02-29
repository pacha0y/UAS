<?php
	include_once('functions/functions.inc.php');
	if(!isset($_SESSION['user_id'])) {
		header('location: signin.php?login=false');
	}
	include_once('handler/handle_candidate_details.php');
	if(isset($_POST['next'])) {
		header('location:ac_records.php');
	}
?>
<html>
	<head>
		<title>UAS :: Next of kin details</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/uos-main.css">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js" type="text/javascript"></script>
		<script src="js/uas-validate.js" type="text/javascript"></script>
		<script src="js/validateMenu.js" type="text/javascript"></script>
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
					<form class="uos-form uos-form-aligned kin-form" action="ac_records.php" method="post">
						<fieldset>
							<legend>Next of kin details</legend>
							<div class="form-group">
								<label for="name">Full name</label>
								<input type="text" name="nok_name" id="name" required>
								<label for="occupation">Occupation : </label>
								<input type="text" name="nok_occupation" id="occupation" required>
							</div>
							<div class="form-group">
								<label for="mobile">Mobile : </label>
								<input type="text" name="nok_mobile" id="mobile" required>
								<label for="email">Email :</label>
								<input type="email" name="nok_email"> 
							</div>
							<div class="form-group">
								<label for="tel">Tel : </label>
								<input type="tel" name="nok_tel" id="tel">
								<label for="address">Contact address : </label>
								<textarea name="nok_address" id="address" required></textarea>
								
							</div>
						</fieldset>
						<div class="form-group col-md-offset-8">
							<input type="reset" value="RESET" class="btn btn-primary">
							<input type="submit" value="NEXT" class="btn btn-success col-md-offset-1">
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<?php include_once('includes/footer.inc'); ?>
			</div>
		</div>
	</body>
</html>