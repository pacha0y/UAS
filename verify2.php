<?php
include_once('functions/functions.inc.php');

if(isset($_POST['pword1'])){
	$pass =md5($_POST['pword']);
	$pass1 =md5($_POST['pword1']);
	if($pass == $pass1){
			$name = $_SESSION['user_id'];
			/**  if(!($con -> query("CALL`update_password`('$p2','$uId')")))
			  {
			   die(mysqli_error($con));
			  }
			  echo '<p class="success">You succefully changed your password. <a href="index.php">Click here</a> to login again</p>';
			**/
			$college = new Programs();
			$college->updatePassword($pass,$name);
				header('location:signin.php');
							
			}
				   else
				   {
					   echo "password mismatch";
				   }
			   }

?>
<html> 
	<head>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/uos-main.css">
      <link type="text/css" rel="stylesheet" href="css/styles.css">
      
      <script type="text/javascript">
      	function verify() {
      		var pass1 = document.getElementById('pass');
      		var pass2 = document.getElementById('pass2');
      		
      		if (pass1.value != pass2.value) {
      			alert('Password does not match');
      			return false;
      		}
      	}
      </script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12 uas-header">
				<?php include_once('includes/header.php'); ?>
				</div>
			</div>
			<!--div class="row">
				<div class="col-md-12">
					 <?php include_once('includes/hornav.php'); ?>
				</div>	
			</div-->
			<div class="row">
				<div class="col-md-12">
					&nbsp;
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<?php
								if(isset($_GET['success']) && $_GET['success'] = 'true') {
							?>
							<div class="alert alert-success alert-dismissable">
								<a href="verify2.php" class="close" data-dismiss="alert" arial-label="close">&times;</a>
								<span class="glyphicon glyphicon-ok"></span> Password successfully changed</div>	
							<?php
								}
							?>
							<div class="shift_down">
								<form action='verify2.php' method='post' name='login' class='uos-form login-form'>
									<label>password</label>
									<input type='password' id="pass" placeholder='Enter New Password' name='pword1' required='required'/><br><br>					
									<label>Verify password</label>
									<input type='password' id="pass2" onblur="return verify()" placeholder='Verify Password' name='pword' required='required'/><br><br>
								
									<div class='align-buttons'>
										<input class='btn btn-success' type='submit' value='continue' name="continue">
										<input class='btn btn-primary'type='reset' value='Clear' />
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
	</body>			
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
	
</html>