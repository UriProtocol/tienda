function hideshow(){
    var pass= document.getElementById("pass1");
    var show= document.getElementById("hide1");
    var hide= document.getElementById("hide2");

    if(pass.type === 'password'){
        pass.type = 'text';
        show.style.display = "none";
        hide.style.display = "block";
        hide.style.position = "absolute";
    }
    else {
        pass.type = 'password';
        show.style.display = "block";
        show.style.position = "absolute";
        hide.style.display = "none";
    }
}
function hideshow0(){
    var pass= document.getElementById("passlog");
    var show= document.getElementById("hidea");
    var hide= document.getElementById("hideb");

    if(pass.type === 'password'){
        pass.type = 'text';
        show.style.display = "none";
        hide.style.display = "block";
        hide.style.position = "absolute";
    }
    else {
        pass.type = 'password';
        show.style.display = "block";
        show.style.position = "absolute";
        hide.style.display = "none";
    }
}