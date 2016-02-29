<?php
	include_once('functions/functions.inc.php');
	
	if(isset($_POST['login'])) {
		if(isset($_POST['uname']) && isset($_POST['pword'])) {
			
			$username = $_POST['uname'];
			$password = $_POST['pword'];
			
			$login = new User();
			$login->login($username,$password);
		}
	}
?>
<html> 
	<head>
		<title>UAS :: Login</title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/uos-main.css">
      <link type="text/css" rel="stylesheet" href="css/styles.css">
      <link rel="stylesheet" type="text/css" href="css/alertify.core.css" />
		<link rel="stylesheet" type="text/css" href="css/alertify.default.css" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
     	<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
     	<script src="js/alertify.min.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12 uas-header">
					<?php include_once('includes/header.php'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12"><hr>
					 <?php //include_once('includes/hornav.php'); ?>
				</div>	
			</div>
			<div class="row">
				<div class="col-md-12">
					&nbsp;
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6 login_box">
						<?php
							if(isset($_SESSION['db_err']) && $_SESSION['db_err'] == 'true') {
						?>
						<div class="alert alert-danger alert-dismissable">
						<a href="signin.php" class="close" data-dismiss="alert" arial-label="close">&times;</a>
						DB Error <span class="glyphicon glyphicon-alert"></span> Please contact support.</div>	
						<?php
							}
							unset($_SESSION['db_err']);
						?>
						<?php
							if(isset($_SESSION['login_error'])) {
						?>
						<div class="alert alert-danger alert-dismissable">
						<a href="signin.php" class="close" data-dismiss="alert" arial-label="close">&times;</a>
						<span class="glyphicon glyphicon-alert"></span> User ID or password not found.</div>	
						<?php
							}
							unset($_SESSION['login_error']);
						?>
						<?php
							if(isset($_GET['logout']) && $_GET['logout'] = 'true') {
						?>
						<div class="alert alert-success alert-dismissable">
						<a href="signin.php" class="close" data-dismiss="alert" arial-label="close">&times;</a>
						<span class="glyphicon glyphicon-ok"></span> You have successfully logged out!</div>	
						<?php
						 }
						?>
							<div class="shift_down">
								<?php
									if(!empty($_GET['pass_recovery']) && $_GET['pass_recovery'] = 'true') {
								?>
								<h2>Forgot your password?</h2>
								<p>Please enter your user id and email address. An email will be sent to you for password reset instructions.</p>
								<form action='signin.php' method='post' name='login' class='uos-form login-form'>
									<div class="form-group row">
										<label class="col-md-1">User ID</label>
										<input type='text' placeholder='User ID' name='Enter user ID here' required='required' class="col-md-5">
									</div>
									<div class="form-group row">
										<label class="col-md-1">Email</label>
										<input type='email' placeholder='Enter email here' name='pword' required='required' class="col-md-5">
									</div>
									<div class="form-group row">
										<a class='btn btn-primary col-md-offset-2' href="signin.php">CANCEL</a>
										<input class='btn btn-success' type='submit' value='RESET PASSWORD' name="login">
									</div>	
								</form>
								<?php
								}else {
								?>
								<form action='signin.php' method='post' name='login' class='uos-form login-form'>
								
									<label>User ID</label><input type='text' placeholder='User ID' name='uname' required='required'/>
										<br><br>
									<label>Password</label><input type='password' placeholder='Password' name='pword' required='required'/>
										<br>
										<p class="forgot-pass"><a href="signin.php?pass_recovery=true">forgot password?</a></p>
									<div class='align-buttons'>
										<input class='btn btn-primary'type='reset' value='Clear' />
										<input class='btn btn-success' type='submit' value='Log in' name="login">
										
									</div>	
								</form>
								<?php
									}
								?>
							</div>	
						</div>
						<div class="col-md-6 register-sec">
							<div class="marginleft2">
								<h4 class="lead">New student?</h4>
								<p>You need an account to apply for university.
								<p>Click the button below to create account.</p>
							<a href="register.php" class="btn btn-success">Create new account</a>
							</div>
						</div>			
					</div>
				</div>
			</div>
			<div class="row footer">
				<?php include_once('includes/footer.inc'); ?>
			</div>
		</div>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>