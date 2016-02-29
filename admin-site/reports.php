<?php
	include_once('../functions/functions.inc.php');
	if(!isset($_SESSION['admin_user'])) {
		header('location:signin.php');
	}
?>
<html>
	<head>
		<title>UAS :: Reports</title>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
		<script type="text/javascript" src="beethoven.js"></script>
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/uos-main.css">
      <script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="../js/bootstrap.min.js" type="text/javascript"></script>
      <link rel="stylesheet" type="text/css" href="css/uas-admin.css">
       <link type="text/css"		rel="stylesheet"  	href="../css/alertify.core.css" 		>
      <link type="text/css"		rel="stylesheet"  	href="../css/alertify.default.css" >
		
      <script type="text/javascript"	src="../js/alertify.min.js" 		></script>
      <script type="text/javascript"	src="../js/logout.js" 		></script>
	</head>
	<body>
		<div class="container">
			<div class="row uas-header">
				<div class="col-md-12"><?php include_once('includes/header.php'); ?></div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php include_once('includes/horizontalnav.php'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 quick-menu text-center">
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading"> Reports </div>
						<div class="panel-body">
							<a href="perDistrictReport.php">Applications</a>
							<p>A report that shows number of applicants in a specified application year.</p>
							<a href="selected_students.php">Selection</a>
							<p>Displays number of successful candidates selected to different public universities.
							 It also show the necessary data including ratio of gender.</p>
							 <?php
							 	if(isset($_SESSION['level']) && $_SESSION['level'] == 'Admin') {
							 ?>
							<a href="">Users</a>
							<p>List of user information and operations with filters by user group.</p>
							<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>						
			<div class="row footer">
				<?php include('../includes/footer.inc');?>
			</div>			
		
		</div>
		<script type="text/javascript" src="beethoven.js"></script>
		<script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
	</body>
</html>