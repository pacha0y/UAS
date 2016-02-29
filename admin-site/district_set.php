<?php
	include_once('../functions/functions.inc.php');
	
?>
<html>
	<head>
		<title>UAS :: District setting</title>
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
			<div class="col-md-12 quick-menu text-center">
					<ul class="submenu" style="margin-top:-12px;">
						<li><a href="application_set.php" class="active"><span class="glyphicon glyphicon-list"></span>Set application period</a></li>
						<li><a href="district_set.php">Manage districts</a></li>
					</ul>
				</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>District</th>
								<th>District</th>
								<th>Population</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$order = !empty($_GET["order_list"])?$_GET["order_list"] : 'district';
							//echo $order;//die();
							$select_district = new System();
							$select_district->retrieveDistricts();
								if(isset($_SESSION['districts'])) { 
									$districts = $_SESSION['districts'];
									foreach($districts as $district){
						?>
						<tr>
							<td><?php	echo $district['name']; ?></td>
							<td><?php	echo $district['population']; ?></td>
							<td><?php	$space = new System();
												$space->getSpace($district['population']);
											//print_r($space); ?></td>
							<td><a class="btn btn-sm btn-default" href=""><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
						</tr>
						<?php	
								}
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
	<script type="text/javascript">
			$(function () { $('#accordion').accordion()});
		</script>
</html>