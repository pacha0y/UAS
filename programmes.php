<?php
	include_once('functions/functions.inc.php');
	
	if(!isset($_SESSION['user_id'])) {
		header('location: signin.php?login=false');
	}	
	$programme = new Programs();
	$programme->viewPrograms();
	
?>
<html> 
	<head>
		<title>UAS :: Programs offered </title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/uos-main.css">
      <link type="text/css" rel="stylesheet" href="css/styles.css">
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	</head>
	<body>
		<div class="container">
			<div class="row uas-header">
				<?php include_once('includes/header.php'); ?>
			</div>
			<div class="row">
				<div class="col-md-12">
					&nbsp;
				</div>
			</div>
			<div class="row">
				<?php
						$application_period = new Application();
						$application_period->getApplicationPeriod();
						
						if(isset($_SESSION['start_date']) && $_SESSION['end_date']) {
							$start_date = $_SESSION['start_date'];
							$end_date = $_SESSION['end_date'];
							$curr_date = date('Y-m-d');
							if($start_date <= $curr_date && $curr_date <= $end_date) {
					?>
				<div class="col-md-3">
							<?php include_once('includes/sidemenu.php'); ?>
				</div>
				<div class="col-md-9">
					<div class="row">
					<?php
						}
					}
					?>
						<div class="col-md-12">
							<?php
								if(empty($_GET['pid'])) {
							?>
							<table class="table" style="font-size:14px;">
								<tr>
									<th scope="col">Program</th>
									<th scope="col">University</th>
									<th scope="col">Description</th>
									
								</tr>
								<?php 
									foreach($_SESSION['programmes'] as $prog): 
								?> 
								<tr>
									<td><?php echo $prog['programme'];?> </td>
									<td><?php echo $prog['un_name'];?> </td>
									<?php
										
											$string = $prog['description'];
											
											$string = strip_tags($string);

										if (strlen($string) > 25) {

											// truncate string
											$stringCut = substr($string, 0, 20);
											$cipher = new System();
												// make sure it ends in a word so assassinate doesn't become ass...
											$try_this = "... <a href='programmes.php?pid="./**$thus = $cipher->encrypt(*/$prog['code']/**)*/."'> Read More</a>";
											$string = substr($stringCut, 0, strrpos($stringCut, ' ')).$try_this; 
										}	
									?>
									<td>
									<?php
										echo $string;
									?> 
									</td>
								</tr>
								<?php
									endforeach;						
								?>
							</table>
							<?php
								}
								else {
							?>
							<table class="table">
							<?php
								$plain = new System();
								$id = /**$plain->decrypt(*/$_GET['pid']/**)*/;
									//echo $id;exit;
									$get_program_details = new Programs();
									$get_program_details->getProgramDetails($id);
									
									if(isset($_SESSION['program_details'])) {
										$details = $_SESSION['program_details'];
										foreach($details as $program_detail){
							?>
								<tr>
									<td><div  class="label-column">Program code</div></td><td><?php echo $program_detail['code']; ?></td>
								</tr>
								<tr>
									<td><div  class="label-column">Program name</div></td><td><?php echo $program_detail['programme']; ?></td>
								</tr>
								<tr>
									<td><div  class="label-column">University offered</div></td><td><?php echo $program_detail['un_name']; ?></td>
								</tr>
								<tr>
									<td><div  class="label-column">Faculty</div></td><td><?php echo $program_detail['faculty']; ?></td>
								</tr>
								<tr>
									<td><div  class="label-column">Duration <small>(in academic years)</small></div>
									</td><td><?php echo $program_detail['duration']; ?></td>
								</tr>
								<tr>
									<td><div  class="label-column">Brief description</div></td><td><?php echo $program_detail['description']; ?></td>
								</tr>
								<tr>
									<td><div  class="label-column">Requirements</div></td><td><?php echo $program_detail['requirements']; ?></td>
								</tr>
							</table>
							<a href="programmes.php" class="btn btn-default text_right">BACK</a>
							<?php
										}
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php include_once('includes/footer.inc'); ?>
				</div>
			</div>
		</div>
		 <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
$(function () { $('#myModal').modal({
keyboard: true
})});
</script>
	</body>
</html>	
