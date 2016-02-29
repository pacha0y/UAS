$(document).ready(function () {
	$('#submit1').attr('disabled', true);
	var required = $('#surname, #firstname, #dob,#t_authority,#village, #c_email, #addr');
	required.keyup(function () {
		if ($(this).val().length > 0) {
			$(this).data('valid',true);
		}else {
			$(this).data('valid',false);
		}
		required.each(function () {
			if ($(this).data('valid') == true) {
				valid = true;
			}else {
				valid = false;
			}
			});
			if (valid == true) {
				$('#submit1').prop('disabled', false);
			}else {
				$('#submit1').prop('disabled', true);
			}
		});
		$('#form1').submit(function () {
			$('#done').addClass('glyphicon glyphicon-ok');
		});
		$('#done').attr('class', 'glyphicon glyphicon-ok');
		
		function CheckUsername(){
		//
		var illegalChars = /\W/;
		var Username = document.getElementById('exam_no');
		//alert(Username);
		if(Username.value != "")
		{
			if(Username.value.length < 5 || Username.value.length > 45){
				alert('Username must have more than 5 characters but less than 45 characters!');
				Username.focus();
				return false;
			}else if(illegalChars.test(Username.value)){
				alert('Username contains illegal characters');
				Username.focus();
				return false;
			}else if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					var value = xmlhttp.responseText;
					if(value.length > 0)
					{
						alert("User already exist in the system");//
						Username.focus();
					}
					else
					{
						document.getElementById('errorSpan').innerHTML="";
					}
				}
			  }
			  var username =Username.value;
			xmlhttp.open("GET","checkUserId.php?q="+username,true);
			xmlhttp.send();
		}
	}
		
});