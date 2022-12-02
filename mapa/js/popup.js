var btnAbrir= document.getElementById("btn-abrir"),
overlay= document.getElementById("overlay"),
popup= document.getElementById("popup"),
btnCerrar = document.getElementById("btn-cerrar");

btnAbrir.addEventListener('click',function(){
    overlay.classList.add('active');
    popup.classList.add('active');
});

btnCerrar.addEventListener('click',function(){
    overlay.classList.remove('active');
    popup.classList.remove('active');
});
