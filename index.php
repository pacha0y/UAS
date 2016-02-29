<?php
	include_once('functions/functions.inc.php');
	if(!isset($_SESSION['user_id'])) {
		header('location: signin.php?login=false');
	}
?>
<html> 
	<head>
		<!-- Page title -->
		<title>UAS :: Home</title>
		<!-- Bootstrap css -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
      	<link rel="stylesheet" href="css/uos-main.css">
      	<link type="text/css"		rel="stylesheet"  	href="css/alertify.core.css" 		>
      	<link type="text/css"		rel="stylesheet"  	href="css/alertify.default.css" >
      	<link rel="stylesheet" href="css/styles.css" type="text/css">
      	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
      	<!-- Javascript  -->
      	<script src="js/jquery-2.1.4.min.js" type="text/javascript"	></script>
      	<script type="text/javascript"	src="js/alertify.min.js" 	></script>
		<script type="text/javascript">
      		function confirtWithAlertify() {
      			// confirm dialog
				alertify.confirm("Do you really want to logout?", function (e) {
    				if (e) {
        				window.location.href = "logout.php";
    				} else {
        				// user clicked "cancel"
    				}
				});
      		}
      </script>
	</head>
	<body>
		<div class="container">
			<div class="row uas-header">
				<div class="col-md-12">
					<?php include_once('includes/header.php'); ?>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					 <?php //include_once('includes/hornav.php'); ?>
				</div>	
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php
						$application_period = new Application();
						$application_period->getApplicationPeriod();
						
						if(isset($_SESSION['start_date']) && $_SESSION['end_date']) {
							$start_date = $_SESSION['start_date'];
							$end_date = $_SESSION['end_date'];
							$curr_date = date('Y-m-d');
							if($start_date <= $curr_date && $curr_date <= $end_date) {
					?>
					<div class="row">
						<div class="col-md-3">
							<?php include_once('includes/sidemenu.php'); ?>
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-12">
									<?php include('includes/logout.php'); ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								<h2>Welcome to University Application System - Applicant's section</h2>
							
								<div class="note">
								If you have ever been registered into any of the public universities, you are not allowed to use this system.
								</div>
								<p>The application period runs from <?php echo $start_date; ?> to <?php echo $end_date; ?> midnight</p>								
							
								<p>NOTE: All applicants are advised to familiarize with the programmes offered by the universities.
								Click the button below to view different programmes.</p>
								<div class="text-right" style="margin-right:25px">
									<a href="programmes.php" class="btn btn-success" style="background: #602b4e; border: #602b4e;">View programmes</a>
								</div>						
								</div>
						</div>		
					</div>
				</div>
				<?php
					}else {
				?>
					<div class="row">
						<div class="col-md-12">
							<?php include('includes/logout.php');?>
						</div>
					</div>
					<div class="closed-display" style="text-align:center;">
					<p>Application period is currently closed.</p>
					<p>Click on the button below to view different programmes that are offered in different public universities.</p>
					<div class="text-right" style="margin-right:25px">
						<a href="programmes.php" class="btn btn-success" style="background: #602b4e; border: #602b4e;">View programmes</a>
					</div>
					</div>
				<?php
					}
				}
				?>
			</div>
			</div>
			<div class="row footer">
				<?php include_once('includes/footer.inc'); ?>
			</div>
		</div>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('button').click(function () {
				$('#done').addClass('glyphicon glyphicon-ok')
			})
		</script>
	</body>
</html>