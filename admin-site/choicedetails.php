<html>
	<head>
		<title>View application form - Next of kin details</title>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
		<script type="text/javascript" src="beethoven.js"></script>
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/uos-main.css">
      <script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
      
      <link rel="stylesheet" type="text/css" href="css/uas-admin.css">

		<style type="text/css">
		#boundary{
			--font-size:.8em;
			--border:1px solid #999;
			background:#fff;
			padding:20px;
			width:900px;
			margin:0 auto;
		}
		#content{
			clear:both;
			padding:0 14px
		}
		#content img{
			border:1px solid #666;
			padding:10px 20px;
			display:block;
			margin:5px auto;
		}
#content p{
	line-height:1.5em;
	padding-bottom:.5em;
}
		#content ul{
	list-style-type:square;
	margin-left:2em;
}
#content li{
	padding:5px 0;
}
#footer{
	color:#666;
	font-size:.75em;
	padding:5px 20px;
	text-align:right;
	width:700px;
	margin:0 auto;
}
#footer a{color:#333;}
.nextprev{
	padding:1em;
	font-weight:bold;
	text-align:right;
}
pre{
	font-size:1.1em;
	font-family:courier,monospace;
	margin-bottom:.5em;
	padding:1em;
	border-left:#eee 2px solid;
}
#content a:link{
	color:#369;
}
#content a:visited{
	color:#036;
}
#content a:hover,#content a:active{
	color:#036;
	text-decoration:none;
}
/* =navigation */
#nav{
	clear:both;
	font-weight:bold;
	color:#666;
	--margin-left:4px;
	float:left;
	list-style-type:none;
}
#nav li{
	list-style-type:none;
	float:left;
	margin:0 0 0 4px;
	padding:0 0 0 10px ;
	border-bottom:1px solid #999;
	background: #f5f5f5;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
}
#nav li a{
	color:#666;
	display:block;
	padding:4px 10px 0 0;
	background: #f5f5f5;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
}
#nav li.cur,
#nav li.over,
#nav li:hover
{
	border-bottom:1px solid #036;
}
#nav li strong,
ul#nav li.cur a,
ul#nav li.over a,
ul#nav li:hover a
{
	display:block;
	color:#fff;
	padding:4px 10px 0 0;
	text-decoration:none;
	background: #9c9c9c;
}
.quick-menu{
	border-bottom: 1px dotted #000;
}
.quick-menu ul li{ 
	display: inline-block;
	padding-left: 15px;
}
.thumb {float: left;}
.candidate-details { float: left;}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row"><div class="col-md-12 uas-header"><?php include_once('includes/header.php');?></div></div>
			<div class="row"><div class="col-md-12"><?php include_once('horizontalnav.html');?></div></div>
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
				<li><a href="candidatedetails.php">Candidate details</a></li>
				<li><a href="nextofkindetails.php">Next of kin</a></li>
				<li><a href="ac_recordsdetails.php">Academic records</a></li>
				<li><a href="choicedetails.php">Choices</a></li>
				<li><a href="viewattach.php">Attachments</a></li>
			</ul>
			<div id="content">
			<div class="panel panel-default">
				<div class="panel-heading">
					Programmes applied for
				</div>
				<div class="panel-body">
					<ol>
						<li>Bachelor of Science in Computer Science(UNIMA)</li>
						<li>Bachelor of Science in Internal Medicine(UNIMA)</li>
						<li>Bachelor of arts humanities(UNIMA)</li>
						<li>Bachelor of Science in Agricultural Engineering (LUANAR)</li>
						<li>Bachelor of Science in Agriculture (LUANAR)</li>
						<li>Bachelor of Engineering (Hons) - Chemical Engineering (MUST)</li>
						<li>Bachelor of Science (Education) – Generic (MZUNI)</li>
					</ol>
				</div>
			</div>
			</div>
		</div>
				</div>
			</div>
			<div class="row footer">
				<div class="col-md-12">
					<div class="panel-footer">&copy; com 2015</div>
				</div>
			</div>
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