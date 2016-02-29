function confirmLogout() {
      		var log = confirm('do you really want to logout');
      			if (log == false) {
      				return false;
      			}
      	}
      	function confirtWithAlertify() {
      		// confirm dialog
				alertify.confirm("Do you really want to logout?", function (e) {
    			if (e) {
        			window.location.href = "logout.php";
    			} else {
        			// user clicked "cancel"
    			}
			});
      	}