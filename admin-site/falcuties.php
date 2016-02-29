<?php
	include_once('../functions/functions.inc.php');
	if(!isset($_SESSION['admin_user'])) {
		header('location:signin.php');
	}
	$college = new university();
	$college->retrieve();
	
	if(isset($_POST['Add'])) {
		if(isset($_POST['name']) && isset($_POST['uni_name'])) {
			
			$cname = $_POST['name'];
			$uni_name = $_POST['uni_name'];
			
			
			$arrlength = count($cname);
			for($i=0; $i<$arrlength; $i++){
			//$college = new programs
			
			if(!empty($cname[$i])){
			$college->addFaculty($cname[$i],$uni_name[$i]);
			}
			}
			
		}
	}
?>

<html>
	<head>
		<title>UAS :: Add faculty</title>
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
					<ul class="submenu" style="margin-top: -14px;">
						<li><a href="manage_programs.php">View programs</a></li>
						<li><a href="addprogram.php">Add programs</a></li>
						<li><a href="falcuties.php" class="active">
						<span class="glyphicon glyphicon-plus">Add falcuties</a></li>
						<li><a href="add_university.php">Add universities</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading"> Add falcuty </div>
						<div class="panel-body">
							<form action='falcuties.php' method='post' name='prog' class='uos-form'>
								<?php
									for($i=0; $i<=5;$i++){
								?>
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-1" for="university">University</label>
										<div class="col-sm-4">
											<select name="uni_name[]" class="col-md-12">
												<option>--Select university--</option>
												<?php foreach($_SESSION['unima'] as $unima):?>
												<option value="<?php echo $unima['code']?>" ><?php echo $unima['name']; ?></option>
												<?php endforeach ;?>
											</select>
										</div>
										<label class="col-sm-1 col-sm-offset-2" for="faculty">Faculty</label>
										<div class="col-sm-5">
											<input type="text" name="name[]" placeholder="Faculty name" class="col-md-12">
										</div>
									</div>
								</div>
								<?php 
									}
								?>
								<div class="form-group col-md-offset-8">
									<input type="reset" value="RESET" class="btn btn-primary">
									<input type="submit" value="ADD" class="btn btn-success col-md-offset-1" name="Add">
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
		<script type="text/javascript" src="beethoven.js"></script>
		<script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
	</body>
</html>