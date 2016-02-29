<?php
	include_once('../functions/functions.inc.php');
	if(!isset($_SESSION['admin_user'])) {
		header('location:signin.php');
	}
	
	$college = new University();
	$college->retrieve();
	
	//$faculty = new Programs();
	//$faculty->retrieveFaculty();
			
	
	include_once('../functions/functions.inc.php');
	
	$college = new University();
	$college->retrieve();
	
	$faculty = new Programs();
	//$faculty->retrieveFaculty();
	$faculty->getProgram_requirements();
				
	
	if(isset($_POST['Add'])) {
		if(isset($_POST['code']) && isset($_POST['uni_name']) && isset($_POST['pname']) && isset($_POST['description']) && isset($_POST['duration']) && isset($_POST['fac_id'])) {
			
	
			$code = $_POST['code'];//die();			
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
		
		<script type="text/javascript">
			function getFaculty() {
				var university = $('#university').val();
				//alert(university);
				if (university === "") {
					document.getElementById("faculty").innerHTML = "";
					return;
				}else {
					if (window.XMLHttpRequest) {
						//code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					}else {
						//code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
					}
					xmlhttp.onreadystatechange = function () {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

							$('#targetId').html(xmlhttp.responseText);
						}
					}
					xmlhttp.open("GET", "getFaculty.php?q="+university, true);
					xmlhttp.send();
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
			<div class="row">
				<div class="col-md-12">
					<?php include_once('includes/horizontalnav.php'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 quick-menu text-center">
					<ul class="submenu">
						<li><a href="manage_programs.php">View programs</a></li>
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
									<label for="university" class="col-sm-1 control-label">University</label>
									<div class="col-md-4">
										<select name="uni_name" class="col-md-12" id="university" onchange="return getFaculty()">
											<option>--select university--</option>
										<?php foreach($_SESSION['unima'] as $unima):?>
											<option value="<?php echo $unima['code']?>" ><?php echo $unima['name']; ?></option>
										<?php endforeach ;?>
										</select>
									</div>
									<label for="university" class="col-sm-1 control-label">Faculty</label>
									<div class="col-md-4">
										<select name="fac_id" class="col-md-12" id="targetId">
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="university" class="col-sm-1 control-label">Code : </label>
									<div class="col-md-2">
										<input type="text" name="code" placeholder="Program code" class="form-control">
									</div>
									<label for="university" class="col-sm-1 control-label">Name :</label>
									<div class="col-md-4">
										<input type="text" name="pname" placeholder="Program name"  class="form-control">
									</div>
									<label for="university" class="col-sm-1 control-label">Duration:</label>
									<div class="col-md-1">
										<input type="text" name="duration" placeholder="Years" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<label for="university" class="col-sm-1 control-label">Description</label>
									<div class="col-md-4">
										<textarea name="description" class="form-control" placeholder="Program description goes here"></textarea>
									</div>
									<div class="col-md-4" >
									<label for="university" class="col-sm-1 control-label">Requirements</label>
									<br><br>
										<?php foreach($_SESSION['subject'] as $subjects): ?>
											<input type='checkbox' name='requirements[]' value="<?php echo $subjects['code']?> " class="col-md-2">
											<?php echo $subjects['name']; ?> </br>
										<?php endforeach ;?>
									</div>
								</div>
								<div class="form-group col-md-offset-8">
									<input type="reset" value="RESET" class="btn btn-primary">
									<input type="submit" value="ADD" class="btn btn-success col-md-offset-1" name="Add">
								</div>
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