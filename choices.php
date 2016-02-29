<?php

	include_once('functions/functions.inc.php');
	if(!isset($_SESSION['user_id'])) {
		header('location: signin.php?login=false');
	}
	include_once('handler/handle_academic_details.php');
	if(isset($_POST['next'])) {
		header('location:upload_slip.php');
	}
?>
<html>
	<head>
		<title>UAS :: Choice of application</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/uos-main.css">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="js/validateMenu.js" type="text/javascript"></script>
		<script type="text/javascript">
			function getPrograms(counter) {
				str = $('#'+counter).val();
				targetId = 'choice_' + counter;
				if (str === "") {
					document.getElementById("choice").innerHTML = "";
					return;
				}else {
					if (window.XMLHttpRequest) {
						//code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					}else {
						//code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
					}
					xmlhttp.onreadystatechange = function () {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

							document.getElementById(targetId).innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET", "getchoices.php?q="+str, true);
					xmlhttp.send();
				}
				
			}
		</script>
		
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
					<?php// include_once('includes/hornav.php'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				&nbsp;
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?php include_once('includes/sidemenu.php'); ?>
				</div>
				<div class="col-md-9">
					<form class="uos-form uos-form-aligned" action="upload_slip.php" method="post">
						<fieldset>
							<legend>Choices</legend>
							<!--div class="uos-help-inline uas-instruct"-->
								<p>Programmes Applying for ( A maximum of<strong>seven</strong>
								 choices in total with a maximum of <strong>three</strong> programme choices from one university ) 
								<p>Use programme code to specify your choice of programme. (e.g LNR-AGE for Bachelor of Science in 
								Agricultural Engineering). Click <a href="programmes.php">here</a> to view programme codes
							<!--/div-->
							<?php
									$counter = 1;
									for($i=1; $i<8;$i++){
								?>
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-1" for="university"><?php echo $i;?></label>
										<div class="col-sm-4">
											<select name="uni_name" class="col-md-12 uni_select" onchange="getPrograms(<?php echo $counter; ?>)" 
											id="<?php echo $counter; ?>" onblur="getSelected(<?php echo $counter; ?>)">
												<option>--Select university--</option>
												<?php
													$university = new University();
													$university->retrieve();
													$univ = $_SESSION['unima'];
													foreach($univ as $un):
												?>
												<option value="<?php echo $un['code']?>" ><?php echo $un['name']; ?></option>
												<?php endforeach ;?>
											</select>
										</div>
										<div class="col-sm-6">
										<select name="choice[]" class="col-md-12" id="choice_<?php echo $counter; ?>">
												<option value="1">--select program--</option>
										</select>
										</div>
									</div>
								</div>
								<?php 
									$counter++;
									}
								?>
						</fieldset>
						<div class="form-group col-md-offset-8">
							<input type="reset" value="RESET" class="btn btn-primary">
							<input type="submit" value="NEXT" class="btn btn-success col-md-offset-1">
						</div>
					</form>
				</div>
			</div>
			<div class="row">
					<?php include_once('includes/footer.inc'); ?>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		function getUni_id() {
				var id = document.getElementById('uni_id').value;
				//var orderOption = orderList.options[orderList.selectedIndex].value;
				window.location.href = 'choices.php?uni_id='+id;
			}
		</script>
</html>