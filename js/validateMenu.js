$(document).ready(function(){
    required = $("[required]");
    $('#submit').click(function(){
    	required.each(function () {
    		value = $(this).val();
    		
    		if (value === '') {
    			alert('All fields required');
    		}else {
    			$('#addstudent_div').addClass("glyphicon glyphicon-ok")
    		}
    	})
    });
});