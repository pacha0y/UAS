<?php
	include_once('includes/handle_choice_details.php');
	if(!isset($_SESSION['user_id'])) {
		header('location: signin.php?login=false');
	}
	
	if(isset($_POST['next'])) {
		header('location:submit.php');
	}
?>
<html>
	<head>
		<title>UAS :: Proof of payment</title>
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
					<form class="uos-form uos-form-aligned deposit-form" action="submit.php" method="POST" enctype="multipart/form-data">
						<fieldset>
							<legend>Upload deposit slip</legend>
							<div class="form-group">
								<label for="bank">Bank :</label>
								<input type="text" name="bank_name" id="bank" placeholder="Bank name" required>
								<label for="branch">Branch :</label>
								<input type="text" name="bank_branch" id="branch" placeholder="Branch name" required>
							</div>
							<div class="form-group">
								<label for="dep_name">Depositor's name :</label>
								<input type="text" name="depositor_name" id="dep_name" placeholder="Depositor's name" required>
								<label for="dep_mobile">Depositor's # :</label>
								<input type="tel" name="depositor_mobile" id="dep_mobile" placeholder="Mobile number" required>
							</div>
							<div class="form-group">
								<label for="slip">Deposit slip :</label>
								<input type="file" id="image" name="deposit_slip" onchange="return ValidateFileUplooad()" required>
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