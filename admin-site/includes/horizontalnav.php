<div class="uas-nav uas-horizontal-nav">
	<ul>
   	<li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
   	<?php
   		if(isset($_SESSION['level']) && $_SESSION['level'] == 'Officer'){   		
   	?>
   	<li><a href="viewapplications.php">Applications</a></li>
   	<li><a href="selection.php">Selection</a></li>
   	<li><a href="manage_programs.php">Programs</a></li>
   	<li><a class="active" href="reports.php">Reports</a></li>
   	<li><a href="help.php">Help</a></li>
   	<?php	
   		}else if(isset($_SESSION['level']) && $_SESSION['level'] = 'Admin'){
   	?>
   	<li><a href="user_list.php">Users</a></li>
   	<li><a href="application_set.php">System setup</a></li>
   	<?php
   		}
   	?>
   	<li class="btn-group dropdown" style="float:right; padding-top:2px;">
   	<button class="btn btn-sm-default user-button dropdown-toggle" data-toggle="dropdown">
   	<?php echo $_SESSION['user_name'];?> <span class="glyphicon glyphicon-lock"></span></button>
   		<ul class="dropdown-menu" role="menu">
   			<li><a href="#">Edit account</a></li>
   			<li><a href="#">Change password</a></li>
   			<li><a onclick="return confirtWithAlertify()"> Logout</a></li>
   		</ul>
   	</li>
	</ul>
</div>