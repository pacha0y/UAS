<?php
	include_once('../functions/functions.inc.php');
	//echo date("d-m-Y");
	//$applications = new Application();
	//$applications->viewApplications();
?>
<html>
	<head>
		<title>UAS :: Help</title>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" 	>
		<link type="image/x-icon" 	rel="shortcut icon" 	href="../favicon.ico"  				>
		<link type="text/css" 		rel="stylesheet" 		href="../css/bootstrap.min.css"	>
		<link type="text/css"		rel="stylesheet" 		href="../css/uos-main.css"			>
		<link type="text/css"		rel="stylesheet" 		href="css/uas-admin.css"			>
		
		<script 	type="text/javascript" src="beethoven.js"></script>
      <script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="../js/jquery-ui.js" type="text/javascript"></script>
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
					<?php include_once('includes/horizontalnav.php'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 quick-menu text-center">
					<ul class="submenu" style="margin-top:-12px;">
						<li><a href="application_set.php" class="active"><span class="glyphicon glyphicon-list"></span>Set application period</a></li>
						<li><a href="district_set.php">Manage districts</a></li>
					</ul>
				</div>
			</div>
			<div class="row footer">
				<?php include('../includes/footer.inc');?>
			</div>
				
			</div>
			
		
	</body>
	<script type="text/javascript">
			$(function () { $('#accordion').accordion()});
		</script>
</html>