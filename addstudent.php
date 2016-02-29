<?php
	include_once('functions/functions.inc.php');
	if(!isset($_SESSION['user_id'])) {
		header('location: signin.php?login=false');
	}
	if(isset($_POST['next'])) {
		
		header("location:addnextkin.php");
	}
?>
<html>
	<head>
		<title>UAS :: Candidate details</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/jquery-ui.css">
		<link rel="stylesheet" href="css/uos-main.css">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js" type="text/javascript"></script>
		<script src="js/validateMenu.js" type="text/javascript"></script>
		<script type="text/javascript">
			function ValidateFileUplooad(){
				image = $('#image');
				fileUploadPath = image.val();
				
				if(fileUploadPath !=""){
					var ext = fileUploadPath.substring(fileUploadPath.lastIndexOf(".") + 1).toLowerCase();
					if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "bmp"){
						if(image.files && image.files[0]){
							var reader = new FileReader();
							reader.onload = function(e){
								$('#display').attr('src', e.target.result);
								$('.image_container').show();
							}
							reader.readAsDataURL(image.files[0]);
						}
					}else{
						alert("File not valid. Upload .gif, .bmp, .png or .jpg files.");
						image.focus();
						fileUploadPath = "";
						return false;
					}
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
					<?php //include_once('includes/hornav.php'); ?>
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
					<form id="form1" class="uos-form uos-form-aligned student-form" role="form" accept-charset="UTF-8" action="addnextkin.php" method="POST"
					enctype="multipart/form-data">
						<fieldset><legend>Applicant's details</legend>
						<div class="form-group">
							<label for="pass_photo">Passpord ID : </label>
								<!--div class="col-md-offset-2 image_container" style="display: none">
								<img src="" width="100px" height="100px" id="display"></div-->
								<img id="blah" src="#" alt=""  width="100px" height="100px" style="border: white;">
								<input type="file" id="image" name="pass_photo" onchange="return ValidateFileUplooad()" required>
						</div>
						<div class="form-group">
							<label for="surname">Surname :</label>
							<input type="text" name="surname" id="surname" required >
							<label for="firstname">Firstname :</label>
							<input type="text" name="firstname" id="firstname" required >
						</div>
						<div class="form-group">
							<label for="initial">Initials :</label>
							<input type="text" name="initial" id="initial">
							<label for="sex">Sex : </label>
								<input type="radio" value="male" name="sex" required>Male
								<input type="radio" value="female" name="sex" required>Female
						</div>
						<div class="form-group">
							<label for="dob">Date of birth : </label>
							<input type="date" name="dob" id="dnatepicker" placeholder="YYYY-MM-DD" required>
							<label for="nationality">Nationality : </label>
							<input type="text" id="countries" name="nationality">
						</div>
						<div class="form-group">
							<label for="district">Home district : </label>
							<!--input type="text" id="district" name="district"-->
							<select name="district" id="district" required style="width:220px">
								<option>--select your district--</option>
							<?php
								$select_district = new System();
								$select_district->retrieveDistricts();
								if(isset($_SESSION['districts'])) { 
									$districts = $_SESSION['districts'];
									foreach($districts as $district){
										
							?>
							
								<option value="<?php echo $district['id'];?>"><?php echo $district['name']; ?></option>
							
							<?php
									}
								}
							?>
							</select>
							<label for="t_authority">T/A :</label>
							<input type="text" name="t_authority" id="t_authority" required>
						</div>
						<div class="form-group">
							<label for="village">Village : </label>
							<input type="text" name="village" id="village" required>
							<label for="tel">Tel : </label>
							<input type="text" name="c_tel" id="phone">
						</div>
						<div class="form-group">
							<label for="mobile">Mobile : </label>
							<input type="tel" name="c_mobile" id="phone">
							<label for="c_email">Email : </label>
							<input type="email" name="c_email" id="c_email" required>
						</div>
						<div class="form-group">
							<label for="addr">Contact address : </label>
							<textarea name="c_address" id="addr" required></textarea>
						</div>
						</fieldset>
						<fieldset>
						<div class="form-group col-md-offset-8">
							<input type="reset" value="RESET" class="btn btn-primary">
							<input type="submit" value="NEXT" class="btn btn-success col-md-offset-1">
						</div>
						</fieldset>
					</form>
				</div>
			</div>
			<div class="row">
				<?php include_once('includes/footer.inc'); ?>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="js/uas-autocomplete.js"></script>
	<script type="text/javascript">
			jQuery(function () {
				$('#datepicker').datepicker();
			});
			function readURL(input) {
        		if (input.files && input.files[0]) {
            	var reader = new FileReader();
            
            	reader.onload = function (e) {
                	$('#blah').attr('src', e.target.result);
            	}
               reader.readAsDataURL(input.files[0]);
        		}
    		}
    		$("#image").change(function(){
        readURL(this);
    });
	</script>
	<!--script type="text/javascript">
		$(function () {
			var state = true;
			$('#form1').submit(function () {
				if (state) {
					$('ul li #addstudent_div').css('background','green');
				}
			});
		});
	</script-->
</html>