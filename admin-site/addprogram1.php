<?php
	include_once('../functions/functions.inc.php');
	
	$college = new University();
	$college->retrieve();
	
	$faculty = new Programs();
	$faculty->retrieveFaculty();
	$faculty->getProgram_requirements();
				
	
	if(isset($_POST['Add'])) {
		if(isset($_POST['code']) && isset($_POST['uni_name']) && isset($_POST['pname']) && isset($_POST['description']) && isset($_POST['duration']) && isset($_POST['fac_id'])) {
			
	
			$code = $_POST['code'];			
			$uni_name = $_POST['uni_name'];
			$pname = $_POST['pname'];			
			$desc = $_POST['description'];
			$duration = $_POST['duration'];
			$fac_id = $_POST['fac_id'];
			$req = $_POST['requirements'];
			
			$faculty->addProgram($code,$fac_id,$desc,$pname,$duration);
			
			
			$arrlength = count($req);
			for($i=0; $i<$arrlength; $i++){
			
			if(!empty($req[$i])){
			$faculty->addRequirements($code,$req[$i]);
			}
			} 
			
		}
	}
?>
<html>
	<head>
		<title>UAS :: Add Program</title>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" 	>
		<link type="image/x-icon" 	rel="shortcut icon" 	href="../favicon.ico"  				>
		<link type="text/css" 		rel="stylesheet" 		href="../css/bootstrap.min.css"	>
		<link type="text/css"		rel="stylesheet" 		href="../css/uos-main.css"			>
		<link type="text/css"		rel="stylesheet" 		href="css/uas-admin.css"			>
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
					<?php include_once('includes/horizontalnav.inc'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 quick-menu text-center">
					<ul class="submenu">
						<li><a href="addprogram.php" class="active"><span class="glyphicon glyphicon-plus">Add programs</a></li>
						<li><a href="falcuties.php">Add falcuties</a></li>
						<li><a href="add_university.php">Add universities</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading"> add programs </div>
						<div class="panel-body">
							<form action='addprogram.php' method='post' name='prog' class='uos-form'>
								<div class="form-group row">
								
									<div class="col-md-4">
									
										<select name="uni_name" class="col-md-12">
											<option>--select university--</option>
										<?php foreach($_SESSION['unima'] as $unima):?>
											<option value="<?php echo $unima['name']?>" ><?php echo $unima['name']; ?></option>
										<?php endforeach ;?>
										</select>
										<br></br><br></br>
										<div class="col-md-12">
											<input type="text" name="code" placeholder="Program code" class="form-control">
										</div>
										<br></br><br></br>
										<div class="col-md-12">
										<!--	<label for="university" class="col-sm-1 control-label">Duration:</label> -->
											<div class="col-md-12">
										<input type="text" name="duration" placeholder="Number of Years" class="form-control">
										</div>
									</div>
									</div>
									
									<div class="col-md-4">
								
										<select name="fac_id" class="col-md-12">
											<option>--select faculty--</option>
										<?php foreach($_SESSION['faculty'] as $faculty):?>
											<option value="<?php echo $faculty['id']?>" ><?php echo $faculty['name']; ?></option>
										<?php endforeach ;?>
										</select>
										<br></br><br></br>
										<!--<label for="university" class="col-sm-1 control-label">Name :</label>-->
										<div class="col-md-12">
										<input type="text" name="pname" placeholder="Program name"  class="form-control">
									</div>
									</div>
									<div class="col-md-4">
									<!-- loop through all subjects and print out as program requrements -->
									<label for="university" class="col-sm-1 control-label">requirements</label>
									<br></br>
										<?php foreach($_SESSION['subject'] as $subjects): ?>
											<input type='checkbox' name='requirements[]' value="<?php echo $subjects['code']?> ">
											<?php echo $subjects['name']; ?> </br>
										<?php endforeach ;?>
									</div>
								</div>
								
								<div class="form-group row">
								<!--	<label for="university" class="col-sm-1 control-label">Description</label> -->
									<div class="col-md-8">
										<textarea name="description" class="form-control" placeholder="Program description goes here"></textarea>
									</div>
									
								</div>
								<div class='align-buttons2 text-right'>
									<input class='btn btn-primary' type='reset' value='Reset' />
									<input class='btn btn-success' type='submit' value='Add' name='Add' />
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-md-12 footer">
					<?php include_once('../includes/footer.inc'); ?>
				</div>
			</div>
			</div>
		</div>	

	</body>
</html>