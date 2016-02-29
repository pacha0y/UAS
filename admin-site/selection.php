<?php
	include_once('../functions/functions.inc.php');
	//echo date("d-m-Y");
	if(!isset($_SESSION['admin_user'])) {
		header('location:signin.php');
	}
?>
<html>
	<head>
		<title>UAS :: Selection</title>
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
						<li><a href="selection.php" class="active"></span>Select per district</a></li>
						<li><a href="selection_list.php"><span class="glyphicon glyphicon-list"></span> Selection pool</a></li>
						<li><a href="selection22.php"></span>Program selection</a></li>
						
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<div class="table-header" style="position:relative; background:#dfdfe0;">
					<div class="table-title" style="position:relative; float:left;">Select by district
					</div>
					<div class="order text-right" style="position:relative;">
						<select onchange="orderList()" name="order" id="order">
							<option>order by..</option>
							<option value="district">District</option>
							<option value="population">Population</option>
							<option value="space">Space</option>
						</select>
					</div>
					</div>
				<table class="table table-striped">
					<thead>
							<tr>
								<th>District</th>
								<th>Population</th>
								<th>Applicants</th>
								<th>Space</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$order = !empty($_GET["order_list"])?$_GET["order_list"] : 'district';
							//echo $order;//die();
							$select_district = new System();
							$select_district->getDistrict($order);
								if(isset($_SESSION['district'])) { 
									$districts = $_SESSION['district'];
									foreach($districts as $district){
						?>
						<tr>
							<td><?php	echo $district['district']; ?></td>
							<td><?php	echo $district['population']; ?></td>
							<td><?php	echo $district['total']; ?></td>
							<td><?php 
								$space = new System();
								$space->getSpace($district['population']);
								if(isset($_SESSION['distr_space'])) {
									echo $_SESSION['distr_space'];
								}
							?></td>
							<td>
								<form method="post"
								 action="selection1.php?dist=<?php echo $district['id'];?>&space=<?php echo$_SESSION['distr_space'];?>">
									<button type="submit" name="submit" class="btn btn-sm btn-success">select</button>
								</form>	
								
							</td>
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
		<script type="text/javascript">
			function orderList() {
				var orderBy = document.getElementById('order').value;
				//var orderOption = orderList.options[orderList.selectedIndex].value;
				window.location.href = 'selection.php?order_list='+orderBy;
			}
		</script>
	</body>
</html>