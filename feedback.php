<?php
	include_once('functions/functions.inc.php');
	
?>
<html>
	<head>
		<title>UAS :: Feedback</title>
		<link type="image/x-icon" 	rel="shortcut icon" 	href="favicon.ico"  					>
		<link type="text/css" 	 	rel="stylesheet" 		href="css/bootstrap.min.css"		>
		<link type="text/css"	 	rel="stylesheet" 		href="css/uos-main.css"				>
		<link type="text/css"		rel="stylesheet" 		href="css/styles.css"				>		
		<link type="text/css"		rel="stylesheet"  	href="css/alertify.core.css" 		>
		<link type="text/css"		rel="stylesheet"  	href="css/alertify.default.css" 	>
	</head>
	<body>
		<div class="container">
			<div class="row uas-header">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<?php include_once('includes/header.php'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row"><div class="col-md-12"><hr></div></div>
			<div class="row">
				<div class="col-md-12">
					<?php
						if(isset($_GET['registered']) && $_GET['registered'] = 'results') {
							if(isset($_SESSION['successfully_registered']) && $_SESSION['successfully_registered'] = 'true') {
					?>
					<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> You have successfully created an account for this system. 
					A password has been sent to your email. Click <a href="signin.php">here</a> to login.</div>
					<?php		
							
							}else {
					?>
					<div class="alert alert-warning"><span class="glyphicon glyphicon-alert"></span> Account NOT successfully created. 
					Click <a href="register.php">here</a> to try again.</div>
					<?php
							}
							unset($_SESSION['successfully_registered']);
						}
					?>	
					<?php
						if(isset($_GET['change_pass']) && $_GET['change_pass'] = 'true') {
							if(isset($_SESSION['pass_changed']) && $_SESSION['pass_changed'] = 'true') {
					?>
					<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Your password has successfully been changed. 
					Click <a href="signin.php">here</a> to go to home page.</div>
					<?php
							}
						}
					?>
				</div>
			</div>
			<div class="row footer">
				<div class="col-md-12">
					<?php include_once('includes/footer.inc'); ?>
				</div>
			</div>
		</div>
		<script type="text/javascript"	src="js/jquery-2.1.4.min.js" 	></script>
     	<script type="text/javascript"	src="js/alertify.min.js" 		></script>
		<script type="text/javascript"	src="js/bootstrap.min.js"		></script>
		<script type="text/javascript"	src="script.js"					></script>
	</body>
</html>