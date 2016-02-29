<?php
	//session_start();
	if(isset($_POST['bank_name'])
		&& isset($_POST['bank_branch'])
		&& isset($_POST['depositor_name'])
		&& isset($_POST['depositor_mobile'])
		&& isset($_FILES['deposit_slip'])) {
			//echo 'Here we are'.$_FILES['deposit_slip'];die();
			if(!empty($_FILES["deposit_slip"]["name"])) {
				//echo 'Am here';die();
				$file_name=$_FILES["deposit_slip"]["name"];
				$temp_name=$_FILES["deposit_slip"]["tmp_name"];
				$image_type=$_FILES["deposit_slip"]["type"];
				$ext_type = new Application();
				$ext_type->getImageExtension($image_type);
				//$extension = $ext_type;
				//echo $extension;die();
				$image_name=$file_name;
				$target_path="images/".$image_name;
				//echo $target_path;die();
				if(move_uploaded_file($temp_name,$target_path)){
					$_SESSION['bank_name'] = $_POST['bank_name'];
					$_SESSION['bank_branch'] = $_POST['bank_branch'];
					$_SESSION['depositor_name'] = $_POST['depositor_name'];
					$_SESSION['depositor_mobile'] = $_POST['depositor_mobile'];
					$_SESSION['deposit_slip'] = $target_path;
				}
			}
		}
?>