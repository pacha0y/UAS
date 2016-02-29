<?php
	include_once('../functions/functions.inc.php');
	//echo date("d-m-Y");
	if(!isset($_SESSION['admin_user'])) {
		header('location:signin.php');
	}
?>
<html>
	<head>
		<title>UAS :: Selection pool</title>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
		<script type="text/javascript" src="beethoven.js"></script>
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/uos-main.css">
      <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
      
		<script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="../js/bootstrap.min.js"></script>
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
						<li><a href="selection_list.php" class="active"><span class="glyphicon glyphicon-list"></span> Selection pool</a></li>
						<li><a href="selection22.php"></span>Program selection</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<?php
					if(!empty($_GET['id'])){
						$stud_id = $_GET['id'];
						$stu_info = new Selection();
						$stu_info->getStudentInfo($stud_id);
						if(isset($_SESSION['stud_info'])) {
							$student_info = $_SESSION['stud_info'];
							foreach($student_info as $info){
				?>
				<div class="panel panel-default">
					<div class="panel-heading">Student details
					<a href="selection_list.php" class="close text-right">&times;</a>
					</div>
					<div class="panel-body">
						<table class="table">
							<tr><td rowspan="4">Image goes here</td></tr>
							<tr><td>Surname: <?php echo $info['lastname']; ?></td><td>First name: <?php echo $info['firstname']; ?></td></tr>
							<tr><td>Initials: P</td><td>Age: <?php echo date('Y-m-d') - $info['dob']; ?></td></tr>
						</table>
					</div>
				</div>
				<?php
					//unset($_SESSION['stud_info']);
							}
						}
					}else {
				?>
						<?php
							$view_selected = new Selection();
							$view_selected->getSelectedList();
							if(isset($_SESSION['pool'])) {
								$pool_member = $_SESSION['pool'];
						?>
					<table class="table table-striped">
					<caption>Select by district</caption>
						<thead>
							<tr>
								<th>First name</th>
								<th>Surname</th>
								<th>Age</th>
								<th>Sex</th>
								<th>District</th>
							</tr>
						</thead>
						<tbody>
						<?php
								foreach($pool_member as $member_item){
						?>
						<tr>
							<td><?php echo $member_item['firstname']; ?></td>
							<td><?php echo $member_item['lastname']; ?></td>
							<td><?php echo $member_item['dob']; ?></td>
							<td><?php echo $member_item['sex']; ?></td>
							<td><?php echo $member_item['name']; ?></td>
						</tr>
						<?php
								
								}
						?>
						</tbody>
					</table>
						<?php
							}else {
						?>
						<div class="alert alert-warning"><span class="glyphicon glyphicon-alert"></span> The selection list is empty 
					Click <a href="selection.php">here</a> to start selection.</div>
						<?php
						}
						?>
						
					<?php }
						 ?>
				</div>
			</div>
			<div class="row footer">
				<?php include('../includes/footer.inc');?>
			</div>
		</div>
	</body>
</html>