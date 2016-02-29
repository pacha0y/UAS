<?php
	include_once('../functions/functions.inc.php');
	if(!isset($_SESSION['admin_user'])) {
		header('location:signin.php');
	}
?>
<html>
	<head>
		<title>UAS :: View applications</title>
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
      	.sub {font-weight: bold;}
      	.data_header{background: grey; color: #fff;}
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
				<div class="col-md-12">
				<?php 
					if(empty($_GET['app_id'])) {
				?>
				<table class="table table-striped">
					<caption>View applications</caption>
						<thead>
							<tr>
								<th>Exam number</th>
								<th>Full name</th>
								<th>Email</th>
								<th>Sex</th>
								<th>Points</th>
								<th>District</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$getApplications = new Application();
								$getApplications->viewApplications(4);
								
							if(isset($_SESSION['applications'])) {
								$appl = $_SESSION['applications'];
								
								foreach($appl as $application){
						?>
						<tr>
							<td><?php	echo $application['exam_number']; ?></td>
							<td><?php	echo $application['firstname'].' '.$application['lastname']; ?></td>
							<td><?php echo $application['email'];?></td>
							<td><?php echo $application['sex'];?></td>
							<td><?php echo $application['points'];?></td>
							<td><?php echo $application['district']; ?></td>
							<td>
							<a class="btn btn-default viewApplicant" href="viewapplications.php?app_id=<?php echo $application['exam_number'];?>">View</a></td>
						</tr>
						<?php	
								}
							}
						?>
						
						</tbody>
					</table>
					<div class="text-right">
				<ul class="pagination">
				<?php 
					if(isset($_SESSION['application_pages'])){//check if session is set.
							echo $_SESSION['application_pages'];
							}?>
				</ul>
				</div>
				</div>
					<?php
						}else {
							$appl_id = $_GET['app_id'];
							$application_data = new Application();
							$application_data->getApplicationData($appl_id);
							if(isset($_SESSION['application_data'])) {
								foreach($_SESSION['application_data'] as $details){
						?>
						<div class="panel panel-default">
							<table class="table">
								<tr><td rowspan="5"><img src="../<?php echo $details['photo'];?>" width="150" height="150"></td></tr>
								<tr class="data_header"><td colspan="6">1. Applicant's personal details</td></tr>								
								<tr><td><div class="sub">Exam ID: </div></td><td><?php echo $details['exam_id'];?></td><td></td><td></td><td></td><td></td></tr>
								<tr><td><div class="sub">First name: </div></td><td><?php echo $details['first_name'];?></td>
									<td><div class="sub">Last name: </div></td><td><?php echo $details['last_name'];?></td>
									<td><div class="sub">Last name: </div></td><td><?php echo $details['initials'];?></td>
								</tr>
								<tr><td><div class="sub">Sex: </div></td><td><?php echo $details['sex'];?></td>
										<td><div class="sub">Date of birth: </div></td><td><?php echo $details['dob'];?></td>
										<td><div class="sub">Nationality: </div></td><td><?php echo $details['nationality'];?></td>
								</tr>
								<tr class="data_header"><td colspan="8">2. Contacts</td></tr>
								<tr><td><div class="sub">Home district: </div></td><td><?php echo $details['district'];?></td>
										<td><div class="sub">Date of birth: </div></td><td><?php echo $details['traditional_authority'];?></td>
										<td><div class="sub">Nationality: </div></td><td><?php echo $details['village'];?></td><td></td><td></td>
								</tr>
								<tr><td><div class="sub">Contact address: </div></td><td><?php echo $details['contact_address'];?></td>
										<td><div class="sub">Tel: </div></td><td><?php echo $details['tel'];?></td>
										<td><div class="sub">Nationality: </div></td><td><?php echo $details['mobile'];?></td><td></td><td></td>
								</tr>
								<tr><td><div class="sub">Email address: </div></td><td><?php echo $details['email'];?></td>
										<td></td><td></td>
										<td></td><td></td><td></td><td></td>
								</tr>
								<tr class="data_header"><td colspan="8">3. Next of kin details</td></tr>
								<tr><td><div class="sub">Full name: </div></td><td><?php echo $details['full_name'];?></td>
										<td><div class="sub">Occupation: </div></td><td><?php echo $details['occupation'];?></td>
										<td><div class="sub">Contact address: </div></td><td><?php echo $details['contact_address'];?></td><td></td><td></td>
								</tr>
								<tr><td><div class="sub">Tel: </div></td><td><?php echo $details['tel'];?></td>
										<td><div class="sub">Mobile: </div></td><td><?php echo $details['mobile'];?></td>
										<td><div class="sub">Email: </div></td><td><?php echo $details['email'];?></td><td></td><td></td>
								</tr>
								<tr class="data_header"><td colspan="8">4. Academic records</td></tr>
								<tr><td><div class="sub">Previous school: </div></td><td><?php echo $details['previous_school'];?></td>
										<td><div class="sub">District: </div></td><td><?php echo $details['district'];?></td>
										<td></td><td></td><td></td><td></td>
								</tr>
								<tr class="data_header"><td colspan="8">5. MSCE sittings</td></tr>
								<?php
								$application_data->getMsceSitting($appl_id);
								if(isset($_SESSION['msce_sitting'])) {
									$i=1;
									foreach($_SESSION['msce_sitting'] as $msce_sitting){
								?>
								<tr><td><div class="sub"><?php $year = $application_data->getYear($msce_sitting['year']); echo $year;?></td>
										<td><div class="sub">Center name: </div></td><td><?php echo $msce_sitting['centre_name'];?></td>
										<td><div class="sub">Center number: </div></td><td><?php echo $msce_sitting['centre_number'];?></td>
										<td><div class="sub">Candidate number: </div></td><td><?php echo $msce_sitting['candidate_number'];?></td>
								
								<?php
									}
								}
								?>
								<tr class="data_header"><td colspan="8">6. Proof of application fee payment</td></tr>
								<tr><td><div class="sub">Bank name: </div></td><td><?php echo $details['bank'];?></td>
										<td><div class="sub">Branch: </div></td><td><?php echo $details['branch'];?></td>
										<td><div class="sub">Depositor's name: </div></td><td><?php echo $details['depositors_name'];?></td>
										<td><div class="sub">Depositor's mobile: </div></td><td><?php echo $details['depositors_mobile'];?></td>
								</tr>
							</table>
						</div>
						<?php
								}
							}
						}
					?>
				</div>
			</div>
			<div class="row footer">
				<?php include('../includes/footer.inc');?>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function () {
				$('.viewApplicant').click(function () {
					$('#here').val($(this).data('id'));
					//$('#myModal').modal('show');
				})
			})
		</script>
	</body>
</html>