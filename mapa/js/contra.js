
$(document).ready(function() {

	$('#pass2').keyup(function() {

		var pass1 = $('#pass1').val();
		var pass2 = $('#pass2').val();
        var btn = $('#regis');

		if ( pass1 == pass2 ) {
			$('#error2').text("La contraseña coincide").css("color", "green");
            $('#boton').attr("disabled",false);
		}else if (pass2 == ""){
			$('#error2').text("").css("color", "red");
		
		} else if (pass1 != pass2){
			$('#error2').text("La contraseña no coincide").css("color", "red");
            $('#boton').attr("disabled",true);
}
	});

});