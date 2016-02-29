<?php
	include_once('functions/functions.inc.php');
			   
	if(!isset($_SESSION['user_id'])) {
		header('location: signin.php?login=false');
	}
	
	if(isset($_POST['submit'])) {
		if(isset($_POST['uname']) && isset($_POST['old_pass']) && isset($_POST['new_pass']) && isset($_POST['new_pass2'])) {	
			if($_SESSION['user_id'] == $_POST['uname']) {
				
				$userName = $_SESSION['user_id'];
				$passwd = new User();
				$passwd->checkPassword($userName);
				
				if(isset($_SESSION['checked_pass'])) {
					$password = $_SESSION['checked_pass'];
					
					if(md5($_POST['old_pass']) != $password) {
						echo 'Wrong password!!';die();
					}
					if($_POST['new_pass'] != $_POST['new_pass2']) {
						echo 'Password does not match';die();
					}
					$pass = $_POST['new_pass'];
					$name = $userName;
					$update_pass = new User();
					$update_pass->updatePassword($pass,$name);
					header('location:feedback.php?change_pass=true');
					
				}
				else {
				
				}
				
			}else {
				echo 'Not there yet';
				die();
			}
		}	
				
	}
?>
<html> 
	<head>
		<title>UAS :: Change password</title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/uos-main.css">
      <link type="text/css" rel="stylesheet" href="css/styles.css">
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
					<div style="background: #ecdbb7; padding:5px;color: #0b1f61;" class="text-left">
						<a href="index.php" onclick="return confirmLogout()">Home</a> | Change password
					</div>
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
						<div class="login_box">
							<div class="shift_down">
								<legend>Change password</legend>
								<ul>
									<li>Password are case-sensitive and must be at least 6 characters.</li>
									<li>A good password should contain a mix of capital and lower-case letters, numbers and symbols.</li>
								</ul>
								<form class="form-horizontal" role="form" action='changePass.php' method='post' name='login'>
									<div class="form-group">
										<label for="user_id" class="col-sm-2 control-label col-md-offset-1">User ID</label>
										<div class="col-md-3">
											<input type="text" class="form-control" id="user_id" placeholder="Enter user Id" name='uname' required='required'>
										</div>
									</div>
									<div class="form-group">
										<label for="old_pass" class="col-sm-2 col-md-offset-1 control-label">Old password</label>
										<div class="col-md-3"> 
											<input type="password" class="form-control" id="old_pass" placeholder="Enter old password" name='old_pass' required='required'>
										</div>
									</div>
									<div class="form-group">
										<label for="old_pass" class="col-sm-2 col-md-offset-1 control-label">New password</label>
										<div class="col-md-3"> 
											<input type="password" class="form-control" id="old_pass" placeholder="Enter new password" name='new_pass' required='required'>
										</div>
									</div>
									<div class="form-group">
										<label for="old_pass" class="col-md-2 col-md-offset-1 control-label">Confirm new password</label>
										<div class="col-md-3"> 
											<input type="password" class="form-control" id="old_pass" placeholder="Re-type new password" name='new_pass2' required='required'>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-offset-3">
										<button type="reset" class="btn btn-default">Reset</button>
										<!--/div>
										<div class="form-group col-sm-offset-1 col-md-2"-->
											<button type="submit" class="btn btn-default" name="submit">Save changes</button>
										</div>
											
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row footer">
				<?php include_once('includes/footer.inc');?>
			</div>		
		</div>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>