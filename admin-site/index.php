<?php
	include_once('../functions/functions.inc.php');
	//echo date("d-m-Y");
	if(!isset($_SESSION['admin_user'])) {
		header('location:signin.php');
	}
?>
<html>
	<head>
		<title>Admin Home</title>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8"	>
		<link type="image/x-icon" 	rel="shortcut icon" 	href="../favicon.ico"				>
		<link type="text/css" 		rel="stylesheet" 		href="../css/bootstrap.min.css"	>
		<link type="text/css" 		rel="stylesheet" 		href="../css/uos-main.css"			>
		<link type="text/css" 		rel="stylesheet" 		href="css/uas-admin.css"			>
		 <link type="text/css"		rel="stylesheet"  	href="../css/alertify.core.css" 		>
      <link type="text/css"		rel="stylesheet"  	href="../css/alertify.default.css" >
		
		<script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script type="text/javascript"	src="../js/alertify.min.js" 		></script>
      <script type="text/javascript"	src="../js/logout.js" 		></script>
		<style type="text/css">
			.clickable-row{
				cursor: pointer;
				font-weight: bold;
			}
			.badge {background: #cf910b;}
			.panel {	box-shadow: 10px 10px 5px grey; color: #360034}
			.panel .number {font-size:30; font-weight: bolder}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12 uas-header">
					<?php include_once('includes/header.php'); ?>
				</div>
			</div>
			<div class="row">
				
			</div>
			<div class="row"><div class="col-md-12">
				</div>
				<div class="col-md-12">
					<?php include_once('includes/horizontalnav.php'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default text-center"  style="font-size:24px;">
					<?php
						$application_period = new Application();
						$application_period->getApplicationPeriod();
						if(isset($_SESSION['start_date']) && isset($_SESSION['end_date'])) {
							$start_date = $_SESSION['start_date'];
							$end_date = $_SESSION['end_date'];
					?>					
						<span class="glyphicon glyphicon-time"></span> Application period<br>
						From <?php echo $start_date; ?> to <?php echo $end_date; ?>
					<?php
						}
					?>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-default text-center" style="font-size:24px;">
						<span class="glyphicon glyphicon-save-file"></span>Received applications<br>
						<div class="number">
						<?php $total_appl = $application_period->getTotalApplications();
							echo $total_appl;
						?></div>
						</div>
						<div>
						<ul class="list-group">
						<?php
							$application_period->applicantsPerDistrict();
							if(isset($_SESSION['app_per_distr'])) {
								foreach($_SESSION['app_per_distr'] as $perDistr){
						?>
						<li class="list-group-item"><span class="badge"><?php echo $perDistr['count']; ?></span><?php echo $perDistr['distr']; ?></li>
						<?php
								}
							}
						?>
						</ul>
						</div>
					
				</div>
				<div class="col-md-4">
					<div class="panel panel-default text-center" style="font-size:24px;">
						<span class="glyphicon glyphicon-book"></span>Available programmes<br>
						<div class="number">
							<?php
								$uni = new Programs();
								$total_prog = $uni->getTotalPrograms();
								echo $total_prog;
							?>
						</div>
					</div>
					<div>
						<ul class="list-group">
						<?php
							
							$uni->availableProgrms();
							if(isset($_SESSION['prog_avail'])) {
								foreach($_SESSION['prog_avail'] as $perDistr){
						?>
						<li class="list-group-item"><?php echo $perDistr['programme']; ?></li>
						<?php
								}
							}
						?>
						</ul>
						<div class="text-right">
							<a href="manage_programs.php" class="btn btn-sm btn-success">VIEW ALL</a>
						</div>
						</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default text-center" style="font-size:24px;">
						<span class="glyphicon glyphicon-education"></span>Registered public universities<br>
						<div class="number">
							<?php
								
								$total_un = $uni->getTotalUniversities();
								echo $total_un;
							?>
						</div>
					</div>
					<ul class="list-group">
						<?php 
							
							$uni->listUniversities();
							foreach($_SESSION['univ'] as $university){
						?>
						<li class="list-group-item"><?php echo $university['name']; ?></li>
						<?php
							}
						?>
					</ul>
				</div>
			</div>
			<div class="row footer">
				<?php include('../includes/footer.inc');?>
			</div>	
		</div>
	</body>
	<script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
	<script src="../js/bootstrap.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(".clickable-row").click(function () {
			//$("clickable-row").toggle().css('font-weight', 'normal');
			var href = $(this).find("a").attr("href");
			if (href) {
				window.location = href;
			}
		});
	</script>
</html>