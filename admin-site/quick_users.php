<?php
	include_once('../functions/functions.inc.php');
	
	if(isset($_POST['submit'])) {
		if(isset($_POST['firstname']) && isset($_POST['lastname']) 
			&& isset($_POST['email']) 
			&& isset($_POST['empl_id'])
		 	&& isset($_POST['sex'])) {
		 		
		 		$firstname = $_POST['firstname'];
		 		$lastname = $_POST['lastname'];
		 		$email = $_POST['email'];
		 		$emp_id = $_POST['empl_id'];
		 		$sex = $_POST['sex'];
		 		
		 		for($i=0; $i < 5; $i++) {
		 			if(!empty($firstname[$i]) && !empty($lastname[$i]) && !empty($email[$i]) && !empty($emp_id[$i]) && !empty($sex[$i])) {
		 				//echo $firstname[$i].' '.$lastname[$i].' '.$email[$i].' '.$emp_id[$i].' '.$sex[$i]; 
		 				$adduser = new User();
		 				$adduser->addUser($firstname[$i],$lastname[$i],$email[$i],$emp_id[$i],$sex[$i]);
		 			}
		 		}
		}
	}
		 
?>
<html>
	<head>
		<title>Add users</title>
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
      <style type="text/css">
      	.uos-table { width: 1000px; }
      	.uos-table td {border-left: none;}
      	.uos-table-row {border: none; border-bottom: 1px solid grey;}
      </style>
	</head>
	<body>
		<div class="container">
			<div class="row uas-header"><div class="col-md-12"><?php include_once('includes/header.php'); ?></div></div>
			<div class="row">
				<div class="col-md-12">
					<?php include_once('includes/horizontalnav.php'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 quick-menu text-center">
					<ul class="submenu" style="margin-top:-12px;">
						<li><a href="user_list.php">
						<span class="glyphicon glyphicon-list"></span> User's list</a></li>
						<li><a href="quick_users.php" class="active"><span class="glyphicon glyphicon-plus"></span> Add users</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">Add quick users</div>
						<div class="panel-body">
							*All the field for the user are required. Incomplete records will not be added. 
							Employment ID will be used as a user id to log in.
							
							<form class="uos-form uos-form-aligned" accept-charset="UTF-8" action="add_user.php" method="POST" enctype="multipart/form-data">
						<ol>
							<?php
								for($i = 0; $i < 10; $i++) {
							?>
							<li>
								<input type="text" placeholder="First name" name="firstname[]">
								<input type="text" placeholder="Last name" name="lastname[]">
								<input type="email" placeholder="Office email" name="email[]">
								<input type="text" placeholder="User ID" name="empl_id[]">
								<select name="sex[]">
									<option>--Sex--</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
							</li>
							<?php
								}
							?>
						</ol>
						<div class="text-right">
							<input type="reset" value="Clear" class="btn btn-primary" name="reset">
							<input type="submit" value="Add users" class="btn btn-success" name="submit">
						</div>
					
					</form>
						</div>
					</div>
					
					
						
					
					
				</div>
			</div>
			<div class="row footer">
				<?php include('../includes/footer.inc');?>
			</div>	
		</div>
	</body>
</html>