<?php
	if (isset($_POST['firstname'])
	&& isset($_POST['surname'])
	&& isset($_POST['dob'])
	&& isset($_POST['sex'])
	&& isset($_POST['nationality'])
	&& isset($_POST['district'])
	&& isset($_POST['t_authority'])
	&& isset($_POST['village'])
	&& isset($_POST['c_address'])
	&& isset($_POST['c_tel'])
	&& isset($_POST['c_mobile'])
	&& isset($_POST['c_email'])
	&& isset($_FILES['pass_photo'])){
	//echo $_FILES['pass_photo']['name'];die();
	if(!empty($_FILES["pass_photo"]["name"])) {
		$file_name=$_FILES["pass_photo"]["name"];
		$temp_name=$_FILES["pass_photo"]["tmp_name"];
		$image_type=$_FILES["pass_photo"]["type"];
		$ext_type = new Application();
		$ext_type->getImageExtension($image_type);
		$image_name=$file_name;
		$target_path="images/".$image_name;
		
		if(move_uploaded_file($temp_name,$target_path)){
			$_SESSION['pass_photo'] = $target_path;
			$_SESSION['firstname'] = $_POST['firstname'];
			$_SESSION['surname'] = $_POST['surname'];
			$_SESSION['initial'] = " ";
			$_SESSION['dob'] = $_POST['dob'];
			$_SESSION['sex'] = $_POST['sex'];
			$_SESSION['nationality'] = $_POST['nationality'];
			$_SESSION['district'] = $_POST['district'];
			$_SESSION['t_authority'] = $_POST['t_authority'];
			$_SESSION['village'] = $_POST['village'];
			$_SESSION['c_address'] = $_POST['c_address'];
			$_SESSION['c_tel'] = $_POST['c_tel'];
			$_SESSION['c_mobile'] = $_POST['c_mobile'];
			$_SESSION['c_email'] = $_POST['c_email'];
		}
	}
	
	
/**	$_SESSION['pass_photo'] = $destination;
	
	 if(isset($_POST['initial'])) {
	 	$_SESSION['initial'] = $_POST['initial'];
	 }
	 echo $_SESSION['pass_photo'];
	 die();
		}
	}else {
		echo 'File type!!!';
		die();
	}*/
}else {
	//echo "Watch out!!";die();
}
?>