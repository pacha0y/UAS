<?php
	include_once('../functions/functions.inc.php');
	include_once('handler/admin_login.php');
?>
<html>
	<head>
		<title>UAS :: Login</title>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" 	>
		<link type="image/x-icon" 	rel="shortcut icon" 	href="../favicon.ico" 				>
		<link type="text/css" 		rel="stylesheet" 		href="../css/bootstrap.min.css"	>
		<link type="text/css"		rel="stylesheet" 		href="../css/uos-main.css"			> 
		<link type="text/css"		rel="stylesheet" 		href="css/uas-admin.css"			>
		<script type="text/javascript" src="beethoven.js"></script>
		<script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12 uas-header"><?php include_once('includes/header.php')?></div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default" style="border: #660063;">
						<div class="panel-heading text-center" style="background: #660063; color: #fff;">UAS LOGIN</div>
					</div>
					<div >
						<?php
							if(!empty($_GET['login']) && $_GET['login'] = 'failed') {
						?>
						<div class="alert alert-danger alert-dismissable"><a href="signin.php" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
							<span class="glyphicon glyphicon-alert"></span> User ID/Password combination not correct.
						</div>
						<?php
							}
						?>
						<form class="form-horizontal" role="form" action="signin.php" method="post">
							<div class="form-group">
								<label class="col-sm-2 control-label">User ID</label>
								<div class="col-sm-9">
									<input type="text" name="user_id" class="form-control" id="inputPassword" placeholder="User ID" required="true">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-9">
									<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required="true">
								</div>
							</div>
							<hr>
							<div class="form-group">
								<div class="col-sm-offset-2 col-md-2">
									<button type="submit" class="btn btn-default" name="login">Sign in</button>
								</div>
								
							</div>
						</form>
						<div class="col-md-offset-2 col-md-10">
							<div class="text-left">Need assistance? <a href="mailto:support@nche.edu.mw">support@nche.edu.mw</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row footer" style="margin-top: 70px;">
				<?php include_once('../includes/footer.inc'); ?>
			</div>
		</div>
	</body>
</html>