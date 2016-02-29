<?php
	include_once('../functions/functions.inc.php');
	if(!isset($_SESSION['admin_user'])) {
		header('location:signin.php');
	}
?>
<html>
	<head>
		<title>UAS :: Manage programmes  </title>
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
					<ul class="submenu">
						<li><a href="manage_programs.php" class="active">View programs</a></li>
						<li><a href="addprogram.php" >Add programs</a></li>
						<li><a href="falcuties.php">Add falcuties</a></li>
						<li><a href="add_university.php">Add universities</a></li>
					</ul>
				</div>
			</div>
			<?php
				if(isset($_SESSION['level']) && $_SESSION['level'] == 'Admin') {
			?>
				<div class="row">
				<div class="col-md-12 quick-menu text-center">
					<ul class="submenu" style="margin-top: -14px;">
						<li><a href="addprogram.php">Add programs</a></li>
						<li><a href="falcuties.php">Add falcuties</a></li>
						<li><a href="add_university.php">Add universities</a></li>
					</ul>
				</div>
			</div>
			<?php
				}
			?>
			<div class="row">
				<div class="col-md-12">
						
								<div class="panel panel-default">
								<div class="panel-heading">
								 Programmes offered in public universities </div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Programs</th>
												<th>Requirements</th>
												<th>Duration</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$viewPrograms = new Programs();
											$viewPrograms->viewPrograms();
											if(isset($_SESSION['programmes'])) {
												foreach($_SESSION['programmes'] as $program){
										?>
											<tr>
												<td><?php echo $program['programme']; ?></td>
												<td><?php echo $program['requirements']; ?></td>
												<td><?php echo $program['duration']; ?></td>
											</tr>
										
										<?php	
												}
											}
										?>
									</table>					
								</div>
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