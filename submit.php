<?php
	include_once('handler/submit_data_handler.php');
?>
<html>
	<head>
		<title>UAS :: Submit application</title>
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
					<legend>Submit application form</legend>
					<hr>
					<?php
							if(isset($_GET['submit_err']) && $_GET['submit_err'] = 'true') {
						?>
						<div class="alert alert-danger alert-dismissable">
						<a href="index.php" class="close" data-dismiss="alert" arial-label="close">&times;</a>
						<span class="glyphicon glyphicon-alert"></span> 
						You already submitted your application! Please return to home page.</div>	
						<?php
						 }else {
						?>
					By submitting the application form you certify that the information provided is true and to the best of your
					 knowledge.
					 <div id="note">
					 	You are <strong>STRONGLY</strong> advised to preview your form before you submit.
					 </div>
					 <?php
					 	}
					 ?>
					 <form action="submit.php" method="POST" class="text-right">
					 	<a href="preview.php" target="blank" class="btn btn-primary">Preview</a>
					 	<button type="submit" name="submit" class="btn btn-success">Submit application</button>
					 </form>
					 
				</div>
			</div>
			<div class="row footer">
				<?php include_once('includes/footer.inc'); ?>
			</div>
		</div>
	</body>
</html>