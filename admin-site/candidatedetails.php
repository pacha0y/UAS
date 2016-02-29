<html>
	<head>
		<title>View application form - Next of kin details</title>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
		<script type="text/javascript" src="beethoven.js"></script>
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/uos-main.css">
      <script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
      
      <link rel="stylesheet" type="text/css" href="css/uas-admin.css">
		
	</head>
	<body>
		<div class="container">
			<div class="row"><div class="col-md-12 uas-header"><?php include_once('includes/header.php');?></div></div>
			<div class="row">
				<div class="col-md-12">
					<?php include_once('horizontalnav.html'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 quick-menu text-center">
					<ul class="submenu" style="margin-top:-12px;">
						<li><a href="viewapplications.php"><span class="glyphicon glyphicon-list"></span> Application list</a></li>
						<li><a href="candidatedetails.php" style="color: #bd9a4e"><span class="glyphicon glyphicon-eye-open"></span> View application</a></li>
						<li><a href=""><span class="glyphicon glyphicon-ok"></span> Approve application</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="boundary">
			<ul id="nav">
				<li class="cur"><a href="candidatedetails.php">Candidate details</a></li>
				<li><a href="nextofkindetails.php">Next of kin</a></li>
				<li><a href="ac_recordsdetails.php">Academic records</a></li>
				<li><a href="step3.html">Choices</a></li>
				<li><a href="step4.html">That's all</a></li>
			</ul>
			<div id="content">
			<div class="panel panel-default">
				<div class="panel-heading">
					Candidate details
				</div>
				<div class="panel-body">
				<img src="thumb02.jpg" alt="" class="thumb">
				Surname: 		Bisani<br>
				First name: 	Pachawo<br>
				Initials: 		E<br>
				Sex: 				Male<br>
				District: 		Zomba<br>
				T/A: 				Malemia<br>
				Village: 		Nsangeni<br>
				Contact address: Mr. E. E. Bisani, Box 698, Zomba<br>
				Tel: 				0999221620<br>
				Mobile: 				0999221620<br>
				<p class="nextprev"><a href="nextofkindetails.php">Next &raquo;</a></p>
				</div>
			</div>
			</div>
		</div>
				</div>
			</div>
			<?php include('../includes/footer.php');?>	
		</div>
		<script type="text/javascript">
			function rollover()
{
	if(!document.getElementById || !document.createTextNode){return;}
	var n=document.getElementById('nav');
	if(!n){return;}
	var lis=n.getElementsByTagName('li');
	for (var i=0;i<lis.length;i++)
	{
		lis[i].onmouseover=function()
		{
			this.className=this.className?'cur':'over';
		}
		lis[i].onmouseout=function()
		{
			this.className=this.className=='cur'?'cur':'';
		}
	}
}
window.onload=rollover;
		</script>
</body>
</html>