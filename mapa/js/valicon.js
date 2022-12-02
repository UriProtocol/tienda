$(document).ready(function() {

	$('#pass1').keyup(function() {

		var pas1 = $('#pass1').val();
		var pas2 = $('#pass2').val();

		if ( pas1 == "" ) {
			$('#pass1').css("border-color","red");
		} else {
		}

	});

});
