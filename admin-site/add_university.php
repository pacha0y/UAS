<?php
	include_once('../functions/functions.inc.php');
	if(!isset($_SESSION['admin_user'])) {
		header('location:signin.php');
	}
	
	if(isset($_POST['Add'])) {
		if(isset($_POST['code']) && isset($_POST['name']) && isset($_POST['address'])) {
			
			$code = $_POST['code'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			
			
			$college = new university();
			$arrlength = count($name);
			for($i=0; $i<$arrlength; $i++){
				if(!empty($name[$i])){
				$college->addCollege($code[$i],$name[$i],$address[$i]);
				}
		}
		
	}
	}
?>


<html>
	<head>
		<title>UAS :: Add universities  </title>
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
			<div class="row uas-header"><div class="col-md-12"><?php include_once('includes/header.php'); ?></div></div>
			<div class="row">
				<div class="col-md-12">
					<?php include_once('includes/horizontalnav.php'); ?>
				</div>
			</div>
				<div class="row">
				<div class="col-md-12 quick-menu text-center">
					<ul class="submenu" style="margin-top: -14px;">
						<li><a href="manage_programs.php">View programs</a></li>
						<li><a href="addprogram.php">Add programs</a></li>
						<li><a href="falcuties.php">Add falcuties</a></li>
						<li><a href="add_university.php" class="active">
						<span class="glyphicon glyphicon-plus"></span>Add universities</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
						
								<div class="panel panel-default">
								<div class="panel-heading">
								 Add Universities </div>
								<div class="panel-body">
									<form action='add_university.php' method='post' name='prog' class='uos-form'>
									
										<?php for($i=0; $i< 5;$i++){?>
											<div class="col-md-12">
												<div class="form-group row">
													<label for="college" class="col-sm-1">Name </label>
													<div class="col-md-3">
														<input type="text" name="name[]" id="name" class="col-md-12">
													</div>
													<label for="location" class="col-sm-1">Code</label>
													<div class="col-md-2">
														   <input type="text" name="code[]" id="code" class="col-md-12">
													</div>
													<label for="Address" class="col-sm-1">Address</label>
													<div class="col-md-3">
														  <textarea name="address[]" id="code" class="col-md-12"></textarea>
													</div>
												</div>
											</div>
										<?php }?>
											<div class='align-buttons2 text-right'>
												<input class='btn btn-primary' type='reset' value='Reset' />
													<input class='btn btn-success' type='submit' value='Add' name='Add' />
													
											</div>
											
										</form>
										</div>
									</div>
							</div>
				<div class="row footer">
					<?php include('../includes/footer.inc');?>
				</div>	
			</div>
		</div>
	</body>
</html>