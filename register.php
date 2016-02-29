<?php
	include_once('functions/functions.inc.php');
	
	if (isset($_POST['submit'])){
		if(isset($_SESSION["code"]) && $_SESSION["code"] == $_POST['captcha']) {
			$firstname = $_POST['fname'];
			$lastname = $_POST['lname'];
			$email = $_POST['email1'];
			$exam_number = $_POST['ex_number'];
			$applicant_dob = $_POST['dob'];
			$sex = $_POST['sex'];
		
			//$get_register_query = new User();
			//$get_register_query->createAccount($exam_number,$firstname, $lastname, $email,$applicant_dob,$sex);
			//header('location:feedback.php?registered=results');
		}else {
			$_SESSION['wrong_captcha'] = true;
		}
		
	}
?>
<html> 
	<head>
		<title>UAS :: Create account</title>
		<link type="image/x-icon" 	rel="shortcut icon" 	href="favicon.ico"  		>
		<link type="text/css" 	 	rel="stylesheet" 		href="css/bootstrap.min.css">
		<link type="text/css"	 	rel="stylesheet" 		href="css/puas-main.css"		>
		<link type="text/css"		rel="stylesheet" 		href="css/styles.css"		>		
		<link type="text/css"		rel="stylesheet"  	href="css/alertify.core.css" 	>
		<link type="text/css"		rel="stylesheet"  	href="css/alertify.default.css" >
		
     	<script type="text/javascript">
     		function CheckUsername(){
				var Username = $('#exam_no');
				//alert(Username);
				if(Username != ""){
					if(Username.val().length < 15 || Username.length > 19){
						alertify.alert('Username must have more than 15 characters but less than 19 characters!');
						Username.focus();
						return false;
					}else if (window.XMLHttpRequest){
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp=new XMLHttpRequest();
					}else{
						// code for IE6, IE5
			  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
							var value = xmlhttp.responseText;
							//alert(value);
							if(value.length > 0){
								//$('#errorSpan').("The exam number you entered is already registered in the system");
								alertify.alert("The exam number you entered is already registered in the system");//
								Username.focus();
								return;
								alert($('#errorSpan').val());
							}else{
								document.getElementById('errorSpan').innerHTML="";
							}
						}
			  		}
			  		var username =Username.val();
			  		//alert(username);
					xmlhttp.open("GET","checkUserId.php?q="+username,true);
					xmlhttp.send();
				}
			}
		</script>
		<script type="text/javascript">
			function CheckUser() {
				//alert('here we are');
				Username = $('#exam_no');
				Firstname = $('#fname');
				Lastname = $('#lname');
				Dob = $('#dob');
				Sex = $('#sex');
				//alert(Dob.val()+' '+Firstname.val()+' '+Lastname.val()+' '+Sex.val()+' '+Username.val());}
				if(Username.val() != "" && Firstname.val() != "" && Lastname.val() != "" && Dob.val() != "" && Sex.val() != ""){
					//alert('We are in');
					if (window.XMLHttpRequest){
						// code for IE7+, Firefox, Chrome, Opera, Safari
			  			xmlhttp=new XMLHttpRequest();
			  		}else{
				  		// code for IE6, IE5
			  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  		}
					xmlhttp.onreadystatechange=function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
							var value = xmlhttp.responseText;
							//alert(value);
							if(value != 0){
								alert(value);
							}else{
								alert("User not found. Please make sure you have entered correct details.");
							}
						}
			  		}
					username =Username.val();
			  		fname =Firstname.val();
			  		lname =Lastname.val();
			  		sex =Sex.val();
			  		dob = Dob.val();
			  		//alert(dob);
					xmlhttp.open("GET","checkUser.php?q="+username+"&&p="+fname+"&&r="+lname+"&&s="+dob+"&&t="+sex,true);
					xmlhttp.send();
				}
			}
     	</script>
	</head>
	<body>
		<div class="container">
			<div class="row uas-header">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<?php include_once('includes/header.php'); ?>
						</div>
					</div>
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
				<div class="col-md-12">
				<div class="row">
				<div class="col-md-12">
					<div style="background: #ecdbb7; padding:5px;color: #0b1f61;" class="text-left">
						<a href="signin.php">Login</a> | Create account
					</div>
				</div>	
			</div>
					<div class="row">
						<div class="col-md-12">
							<h4>CREATE NEW ACCOUNT</h4>
							<hr>
							<div class="instruction">INSTRUCTIONS:</div>
							<ol>
								<li>Please fill in all the fields.</li>
								<li>You are required to use names and examination number which you used for your recent MSCE exams.</li>
								<li>Make sure you sign up using your email address.</li>
							</ol>
							<div class="note">NOTE: Default password will be sent to your email.
								Your examination number will be used as a user ID to log in.
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<hr>
							<form action='register.php' method='post' name='register' class='puas-form register-form' onsubmit="return CheckUser()">
								<fieldset>
									<div class="form-group col-md-offset-1">
										<label for="exam_no">MSCE Exam # : </label>
										<input type="text" name="ex_number" id="exam_no" required="true" onblur="return CheckUsername()">
									</div>
									<div class="form-group col-md-offset-1">
										<label for="fname">Firstname : </label>
										<input type="text" name="fname" id="fname" required="true">
										<label for="lname">Last name : </label>
										<input type="text" name="lname" id="lname" required="true">								
									</div>
									<div class="form-group col-md-offset-1">
										<label for="dob">Date of birth : </label>
										<input type="text" name="dob" id="dob" required="true" placeholder="YYYY-MM-DD">
										<label for="sex">Sex : </label>
										<input type="text" name="sex" id="sex" required="true">
									</div>
									<div class="form-group col-md-offset-1">
										<label for="email">Email : </label>
										<input type="email" name="email1" id="email" required="true">
										<label for="email">Confirm Email : </label>
										<input type="email" name="email2" id="email" required="true">
									</div>
									<div class="form-group col-md-offset-1">
										<label for="captcha">Enter the text: </label>
										<input type="text" id="captcha1" name="captcha" required="true">
										<img src="captcha.php" alt="captcha" id="img">
										<?php
											if(isset($_SESSION['wrong_captcha']) && $_SESSION['wrong_captcha'] = 'true') {
										?>
										 <div class="col-md-offset-2" style="color:red">Wrong text! Type again.</div>
										<?php
											unset($_SESSION['wrong_captcha']);
											}
										?>	
									</div>
									<div class="form-group col-md-offset-10">
										<input class='btn btn-primary' type='reset' value='Clear' >
										<input class='btn btn-success' type="submit" name="submit" value='Sign Up' >
									</div>
								</fieldset>	
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<?php include_once('includes/footer.inc'); ?>
			</div>
		</div>
		<script type="text/javascript"	src="js/jquery-2.1.4.min.js"></script>
     	<script type="text/javascript"	src="js/alertify.min.js" 	></script>
		<script type="text/javascript"	src="js/bootstrap.min.js"	></script>
		<script type="text/javascript"	src="script.js"				></script>
	</body>
</html>