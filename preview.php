<?php
session_start();
	if(!isset($_SESSION['user_id'])) {
		header('location: signin.php?login=false');
	}

?>
<html>
	<head>
		<title>UAS :: Form preview </title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/uos-main.css">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<style type="text/css">
			body {background: #2f2f2f;}
			.preview_page {
				width: 1000px;
				align-content: center;
				box-shadow: 2px 2px 2px 2px grey;
				margin-top: 15px;
				margin-bottom: 15px;
				padding: 20px;
				background: white;
			}
			.preview_page-title{
				background: #ededed;
				padding: 5px;
			}
			.preview_page table {
				border: 1px solid black;
			}
			.preview_page .table-condensed {
				border: none;
			}
			
		</style>
	</head>
	<body>
		<div class="container" style="background: #2f2f2f;">
			<?php
			if(!isset($_SESSION['surname']) && !isset($_SESSION['nok_name'])) {
				echo "&nbsp;";
				echo "<div class='alert alert-danger'>Please complete the application form</div>";
				die();
			}
			?>
			<div class="preview_page">
				<div class="preview_page-header">
					<img src="images/logo.png" alt="">
					<div class="">UNDERGRADUATE COMPLETED APPLICATION FORM FOR THE 2015/2016 ACADEMIC YEAR
				</div><img src="<?php echo $_SESSION['pass_photo']; ?>" alt="" class="text-right">
				<div class="preview_page-title">A. Personal details</div>
					<div class="col-md-4">1.	Surname: <?php echo "<strong>".$_SESSION['surname']."</strong>"; ?></div>
						<div class="col-md-4">First Name: <?php echo "<strong>".$_SESSION['firstname']."</strong>";?></div>
						<?php 
							if(!empty($_SESSION['initial'])) {
						?>
						<div class="col-md-4">Initials: <?php echo "<strong>".$_SESSION['initial']."</strong>; "?></div>
						<?php
						}
						echo "<br>";
						?>
					<div class="col-md-4">2.	Date of birth: <?php echo "<strong>".$_SESSION['dob']."</strong>"; ?></div>
						<div class="col-md-4">Sex: <?php echo "<strong>".$_SESSION['sex']."</strong>"; ?></div>
						<div class="col-md-4">Nationality: <?php echo "<strong>".$_SESSION['nationality']."</strong>"; ?></div>
						<div class="col-md-4">	Home district: <?php echo "<strong>".$_SESSION['district']."</strong>"; ?></div>
						<div class="col-md-4">T/A: <?php echo "<strong>".$_SESSION['t_authority']."</strong>"; ?></div>
						<div class="col-md-4">Village: <?php echo "<strong>".$_SESSION['village']."</strong><br>"; ?></div>
					<div class="col-md-4">3.	Contact address: <?php echo "<strong>".$_SESSION['c_address']."</strong>"; ?></div>
						<div class="col-md-4">Tel: <?php echo "<strong>".$_SESSION['c_tel']."</strong>"; ?></div>
						<div class="col-md-4">Mobile: <?php echo "<strong>".$_SESSION['c_mobile']."</strong>"; ?></div>
						Email: <?php echo "<strong>".$_SESSION['c_email']."</strong><br>"; ?>
					<div class="preview_page-title">B. Details of next of kin</div>
					1. Full name: <?php echo "<strong>".$_SESSION['nok_name']."</strong>"; ?>
						Occupation: <?php echo "<strong>".$_SESSION['nok_occupation']."</strong><br>"; ?>
					2. Address <?php echo "<strong>".$_SESSION['nok_address']."</strong>";?>
						Tel: <?php echo "<strong>".$_SESSION['nok_tel']."</strong>"; ?>
						Mobile: <?php echo "<strong>".$_SESSION['nok_mobile']."</strong>";?>
						Email: <?php echo "<strong>".$_SESSION['nok_email']."</strong>";?>
					<div class="preview_page-title">C. Academic records</div>
					<div class="col-md-4">1. Previous school: <?php echo "<strong>".$_SESSION['prev_school']."</strong>";?></div>
						<div class="col-md-4">District: <?php echo "<strong>".$_SESSION['sc_district']."</strong><br>";?></div>
						
					<table width="100%" class="table table-bordered">
						<thead>
							<td><strong>2014 RESULTS</strong></td>
							<td><strong>2015 RESULTS</strong></td>
							<td><strong>2016 RESULTS</strong></td>
						</thead>
						<tr>
							<td>Center name: <?php echo "<strong>".$_SESSION['c_name_0']."</strong><br>";?></td>
							<td>Center name: <?php echo "<strong>".$_SESSION['c_name_1']."</strong><br>";?></td>
							<td>Center name: <?php echo "<strong>".$_SESSION['c_name_2']."</strong><br>";?></td>
						</tr>
						<tr>
							<td>Center number: <?php echo "<strong>".$_SESSION['c_number_0']."</strong><br>";?></td>
							<td>Center number: <?php echo "<strong>".$_SESSION['c_number_1']."</strong><br>";?></td> 
							<td>Center number: <?php echo "<strong>".$_SESSION['c_number_2']."</strong><br>";?></td>
						</tr>
						<tr>
							<td>Candidate number: <?php echo "<strong>".$_SESSION['cand_number_0']."</strong><br>";?></td> 
							<td>Candidate number: <?php echo "<strong>".$_SESSION['cand_number_1']."</strong><br>";?></td> 
							<td>Candidate number: <?php echo "<strong>".$_SESSION['cand_number_2']."</strong><br>";?></td>
						</tr>
					</table>
					<div class="preview_page-title">D. Choices</div>
					<?php
						$choice = $_SESSION['choice_array'];
						$number = 1;
						for($i = 0; $i < count($choice); $i++) {
							echo $number.".  ".$choice[$i]."<br>";
							$number++;
						}
					?>
					<div class="preview_page-title">E. Application fee payment details</div>
					<div class="col-md-6">Bank name: <?php echo "<strong>".$_SESSION['bank_name']."</strong>"; ?></div>
					<div class="col-md-6">Branch: <?php echo "<strong>".$_SESSION['bank_branch']."</strong>"; ?></div><br>
					<div class="col-md-6">Depositors's name: <?php echo "<strong>".$_SESSION['depositor_name']."</strong>"; ?></div>
					<div class="col-md-6">Depositors's number: <?php echo "<strong>".$_SESSION['depositor_mobile']."</strong>"; ?></div><br>
				</div>
		</div>
	</body>
</html>