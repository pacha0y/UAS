<?php
	include_once('../functions/functions.inc.php');
	
	if(!empty($_GET['user_id']) && !empty('status')) {
		$status = $_GET['status'];
		if($status == 'Active') {
			$status = 'Inactive';
		}elseif($status == 'Inactive') {
			$status = 'Active';
		}else {
			die();
		}
		$user = $_GET['user_id'];
		
		$updateStatus = new User();
		$updateStatus->updateStatus($user,$status);
	}
?>
<html>
	<head>
		<title>User list</title>
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
      	$(function () {
      		$(document).tooltip();
      	})
      </script>
      
      <link rel="stylesheet" type="text/css" href="css/uas-admin.css">
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
						<li><a href="user_list.php" class="active"><span class="glyphicon glyphicon-list"></span> User list</a></li>
						<li><a href="quick_users.php"> Add user</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<table class="table table-striped">
					<caption>Showing</caption>
						<thead>
							<tr>
								<th>User ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Sex</th>
								<th>Status</th>
								<th>Level</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php
							$viewuser = new User();
							$limit = !empty($_GET['limits'])? (int)$_GET['limits'] : 3;
							$viewuser->viewUsers($limit);
							 if(isset($_SESSION['users'])) {
							 	$users =$_SESSION['users']; 
							 	foreach($users as $user){
						?>
						<a>
						<tr>
							<td><?php echo $user['user_id'];?></td>
							<td><?php echo $user['firstname'].' '.$user['lastname'];?></td>
							<td><?php echo $user['email'];?></td>
							<td><?php echo $user['sex'];?></td>
							<td><?php echo $user['status'].'/';?>
							<?php
								
								if($user['status'] == 'Inactive') {
							?>
							<a href="user_list.php?user_id=<?php echo $user['user_id'];?>&status=<?php echo $user['status'];?>" 
							class="btn btn-sm btn-default">Activate</a></td>
							<?php
								}else {
							?>
							<a href="user_list.php?user_id=<?php echo $user['user_id'];?>&status=<?php echo $user['status'];?>" 
							class="btn btn-sm btn-danger">Deactivate</a></td>
							<?php
								}
							?>
							<td><?php echo $user['level'];?></td>
							<td><a href="#" title="Edit user"><span class="glyphicon glyphicon-pencil"></span></a></td>
							
							
						</tr></a>
						<?php
							 	}
							 }
						?>
					</tbody>
					</table>
				</div>
				<div class="text-right">
				<ul class="pagination">
				<?php 
					if(isset($_SESSION['page'])){//check if session is set.
							echo $_SESSION['page'];
							}?>
				</ul>
				</div>
			</div>
			<div class="row footer">
				<?php include('../includes/footer.inc');?>
			</div>	
		</div>
	</body>
</html>