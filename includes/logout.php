<div style="background: #ecdbb7; padding:5px;color: #0b1f61;" class="text-right">Logged in as:
<?php
	if(isset($_SESSION['user_name'])) {
		echo $_SESSION['user_name'];
	}
?> | 
	<a onclick="return confirtWithAlertify()"> Logout</a> |
	<a href="changePass.php">Change password</a>
</div>