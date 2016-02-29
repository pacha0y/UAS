<?php
	include_once('../functions/functions.inc.php');
?>
<html>
	<head>
		<title>UAS :: Help</title>
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
		<script src="../js/jquery-ui.js" type="text/javascript"></script>
      <style type="text/css">
      	.help-topics {list-style: none;}
      	.help-text-subtopics {list-style-type: none;}
      </style>
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
				<div class="col-md-3" style="border-right: 1px solid grey">
				<ul class="help-topics" id="accordion">
					<!--h3>Topics</h3-->
						<li><a href=''><span class="glyphicon glyphicon-plus"></span>Getting started</a>
							<ul class="help-subtopics" style="list-style-type:none">
								<li><a id="1"><span class="glyphicon glyphicon-minus"></span>What is UAS?</a></li>								
							</ul>
						</li>
						<li><a href=""><span class="glyphicon glyphicon-plus"></span>Login & password</a>
							<ul class="help-subtopics" style="list-style-type:none">
								<li><a id="1"><span class="glyphicon glyphicon-minus"></span>Change password</a></li>								
								<li><a id="1"><span class="glyphicon glyphicon-minus"></span>Log out</a></li>								
							</ul>
						</li>
						<li><a href=""><span class="glyphicon glyphicon-plus"></span>Manage applications</a>
							<ul class="help-subtopics" style="list-style-type:none">
								<li><a id="1"><span class="glyphicon glyphicon-minus"></span></a></li>								
							</ul>
						</li>
						<li><a href=""><span class="glyphicon glyphicon-plus"></span>Selection</a>
							<ul class="help-subtopics" style="list-style-type:none">
								<li><a id="1"><span class="glyphicon glyphicon-minus"></span>Equitable selection</a></li>								
							</ul>
						</li>
						<li><a href=""><span class="glyphicon glyphicon-plus"></span>Manage programmes</a>
							<ul class="help-subtopics" style="list-style-type:none">
								<li><a id=""><span class="glyphicon glyphicon-minus"></span>Add programmes</a></li>						
								<li><a id="1"><span class="glyphicon glyphicon-minus"></span>Add faculty</a></li>							
								<li><a id="1"><span class="glyphicon glyphicon-minus"></span>Add university</a></li>							
							</ul>
						</li>
						<li><a href=""><span class="glyphicon glyphicon-plus"></span>Manage users</a>
						<ul class="help-subtopics" style="list-style-type:none">
								<li><a id="1"><span class="glyphicon glyphicon-minus"></span>Add User</a></li>								
								<li><a id="1"><span class="glyphicon glyphicon-minus"></span>Quick users</a></li>								
								<li><a id="1"><span class="glyphicon glyphicon-minus"></span>View users</a></li>								
							</ul>
						</li>
						<li><a href=""><span class="glyphicon glyphicon-plus"></span>Reports</a></li>
					</ul>
				</div>
				<div class="col-md-9">
				
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