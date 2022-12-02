$(document).ready(function() {
    $('#pass1').keyup(function(e) {
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{6,}).*", "g");
        var pas1 = $('#pass1').val();
    
    if(pas1 == "") {
            $('#passstrength').html('No puede dejar este campo vacio.').css("color", "red");
            $('#pass1').css("border-color","red");
            $('#contra').html('').css("color", "red");
            $('#cin').css("display","none");
            $('#error2').css("display","none");
         } else{
            if (false == enoughRegex.test($(this).val())) {
                $('#passstrength').html('Debe contener 8 o más carácteres, minusculas, mayusculas, numeros y caracteres especiales').css("color", "red");
                $('#pass1').css("border-color","red");
                $('#cin').css("display","none");
                $('#error2').css("display","none");
        } else if (strongRegex.test($(this).val())) {
                $('#passstrength').className = 'ok';
                $('#passstrength').html('Seguridad fuerte').css("color", "green");
                $('#pass1').css("border-color","green");
                $('#contra').html('').css("color", "red");
                $('#cin').css("display","");
                $('#error2').css("display","");
        } else if (mediumRegex.test($(this).val())) {
                $('#passstrength').className = 'alert';
                $('#passstrength').html('Seguridad media').css("color", "#D9C61E");
                $('#contra').html('').css("color", "red");
                $('#pass1').css("border-color","#D9C61E");
                $('#cin').css("display","none");
                $('#error2').css("display","none");
        }else {
                $('#passstrength').className = 'error';
                $('#passstrength').html('Seguridad débil').css("color", "red");
                $('#contra').html('').css("color", "red");
                $('#pass1').css("border-color","red");
                $('#cin').css("display","none");
                $('#error2').css("display","none");
        }
        return true;
         }
    });
    });