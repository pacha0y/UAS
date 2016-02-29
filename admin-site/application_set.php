<?php
	include_once('../functions/functions.inc.php');
	if(isset($_POST['Add'])) {
		if(isset($_POST['year']) && isset($_POST['startDate']) && isset($_POST['endDate'])) {
			
			$year = $_POST['year'];
			$startDate = $_POST['startDate'];
			$endDate = $_POST['endDate'];
			
			
			$app = new Application();			
			$app->setApplicationPeriod($year,$startDate,$endDate);
		
	}
	}
?>
<html>
	<head>
		<title>UAS :: Application period</title>
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
		<link rel="stylesheet" href="css/jquery-ui.css">
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
					<ul class="submenu" style="margin-top:-12px;">
						<li><a href="application_set.php" class="active"><span class="glyphicon glyphicon-list"></span>Set application period</a></li>
						<li><a href="district_set.php">Manage districts</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form class="uos-form uos-form-aligned kin-form" action="application_set.php" method="post">
						<legend>Set application period</legend>
						<div class="col-md-offset-1">
						<div class="form-group row">
						<label for="start" class="col-md-2">Intake:</label>
						<select id="year" name="year" class="col-md-4" >
						<script> 
							var myDate = new Date(); 
							var year = myDate.getFullYear(); 
							document.write('<option value="">--select year--</option>'); 
							for(var i = 2010; i < year+20; i++){ 
								document.write('<option value="'+i+'">'+i+'</option>'); 
							} 
						</script> 
						</select>
						</div>
						<div class="form-group row">
						<label for="start" class="col-md-2">Start date:</label>
						<input type="date" id="start" name="startDate" placeholder="YYYY-MM-DD" class="col-md-4" id="datepicker">
						</div>
						<div class="form-group row">
						<label for="end" class="col-md-2">End date:</label>
						<input type="date" id="end" name="endDate" placeholder="YYYY-MM-DD" class="col-md-4" id="datepicker">
						</div>
						<div class="form-group row">
						<label for="message" class="col-md-2">Message :</label>
						<textarea class="col-md-5"></textarea>
						</div>
						<div class="form-group row">
							<input type="reset" value="CLEAR" class="btn btn-primary col-md-offset-5">
							<input type="submit" name="Add" value="ADD" class="btn btn-success">
						</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row footer">
				<?php include('../includes/footer.inc');?>
			</div>
				
			</div>
			
		
	</body>
	<script 	type="text/javascript" src="beethoven.js"></script>
      <script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="../js/jquery-ui.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function () {
				$('#datepicker').datepicker();
			});
	</script>
</html>