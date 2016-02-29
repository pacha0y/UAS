<?php
	include_once('../functions/functions.inc.php');
	//echo date("d-m-Y");
	if(!isset($_SESSION['admin_user'])) {
		header('location:signin.php');
	}
	
	
		if(!empty($_GET['prog_id'])) {
			$prog_id = $_GET['prog_id'];
			
			$select = new Selection();
		$select->sortByChoices($prog_id);
		}
?>
<html>
	<head>
		<title>View application form - Next of kin details</title>
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
						<li><a href="selection.php"></span>Select per district</a></li>
						<li><a href="selection_list.php"><span class="glyphicon glyphicon-list"></span> Selection pool</a></li>
						<li><a href="selection22.php" class="active"></span>Program selection</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<table class="table table-striped">
					<caption>Select by program</caption>
						<thead>
							<tr>
								<th>Program</th>
								<th>Space</th>
								<th>Select</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
				<?php
					$programme = new Programs();
					$programme->viewPrograms();
					
					foreach($_SESSION['programmes'] as $prog){
				?>
						<tr>
							<td><?php echo $prog['programme'];?></td>
							<td>80</td>
							<td>
								<a href="selection22.php?prog_id=<?php echo $prog['code'];?>" class="btn btn-sm btn-success">SELECT</a>
							</td>
						</tr>
					<?php
						}
					?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row footer">
				<?php include('../includes/footer.inc');?>
			</div>
		
		</div>
		
	</body>
</html>