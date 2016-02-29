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
						<fieldset>
							<legend>Academic records</legend>
							<div class="col-md-12">
								<label for="prev_school" class="col-md-2">Prev. school</label>
								<input type="text" name="prev_school" id="prev_school" required class="col-md-5">
								<label for="district" class="col-md-2">District : </label>
								<input type="text" name="sc_district" id="district" required class="col-md-3">
							</div>						
							<div class="row">
								<div class="col-md-12">
								<table>
									<tr class="row">
								<?php
									if(isset($_SESSION['year'])) {
										$year = $_SESSION['year'];
										foreach($_SESSION['year'] as $year){
								?>
								<td class="col-md-4">
									<h4><?php echo $year['year']; ?> Results</h4>
									<input type="hidden" value="<?php echo $year['id']; ?>" name="year[]">
									<label>Centre name :</label>
									<input type="text" name="c_name[]"><br>
									<label>Centre # :</label>
									<input type="text" name="c_number[]"><br>
									<label>Candidate # :</label>
									<input type="text" name="cand_number[]">
								</td>
								<?php
										}
									}
								?>
									</tr>
								</table>
							</div>
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
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  
</html>