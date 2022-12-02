<?php
include_once('../sesiones.php');
include_once('../conexion2.php');
include_once("php/connection.php");
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Icon tab -->
    <link rel="apple-touch-icon" sizes="180x180" href="./sgrp-ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./sgrp-ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./sgrp-ico/favicon-16x16.png">
    <link rel="manifest" href="./sgrp-ico/site.webmanifest">


    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/sidemenu.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/buttons.css">
<!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <!--datables estilo bootstrap 4 CSS-->  
  <link rel="stylesheet"  type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Mapa</title>
    <style type="text/css">
      #mapa {
            height: 90vh;
      }
      .h2s {
        font-size: 3vh;
      }
    </style>
</head>

  <body> 
 
  <?php include_once("../dashboard/nav.php") ?>

    <section class="home">
        <div class="content">

        <!-- Contenedor del Mapa de Google --> 
        <div id="mapa">
            
        </div>               


<div class="row mt-3">

  <div class="col-md-12">

    <h2 class="h2s">Direcciónes en la Base de Datos MySQL</h2>

    <!-- Archivo PHP con la lógica para mostrar una tabla con las ubicaciones -->
    <?php include('php/app.php'); ?> 
    
  </div>
  
</div>  


<hr>          


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLJdkDe4edPXzvPqYaoM-cYUeUfJWh1rs&callback=initMap&v=weekly" defer></script>

<script type="text/javascript">
function initMap() {
var map;
var bounds = new google.maps.LatLngBounds();
var mapOptions = {
    mapTypeId: 'roadmap'
};

map = new google.maps.Map(document.getElementById('mapa'), {
    mapOptions
});

map.setTilt(50);

// Crear múltiples marcadores desde la Base de Datos 
var marcadores = [
    <?php include('php/marcadores.php'); ?>
];

// Creamos la ventana de información para cada Marcador
var ventanaInfo = [
    <?php include('php/info_marcadores.php'); ?>
];

// Creamos la ventana de información con los marcadores 
var mostrarMarcadores = new google.maps.InfoWindow(),
    marcadores, i;

// Colocamos los marcadores en el Mapa de Google 
for (i = 0; i < marcadores.length; i++) {
    var position = new google.maps.LatLng(marcadores[i][1], marcadores[i][2]);
    bounds.extend(position);
    marker = new google.maps.Marker({
        position: position,
        map: map,
        title: marcadores[i][0]
    });

    // Colocamos la ventana de información a cada Marcador del Mapa de Google 
    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            mostrarMarcadores.setContent(ventanaInfo[i][0]);
            mostrarMarcadores.open(map, marker);
        }
    })(marker, i));

    // Centramos el Mapa de Google para que todos los marcadores se puedan ver 
    map.fitBounds(bounds);
}

// Aplicamos el evento 'bounds_changed' que detecta cambios en la ventana del Mapa de Google, también le configramos un zoom de 14 
var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
    this.setZoom(14);
    google.maps.event.removeListener(boundsListener);
});

}

// Lanzamos la función 'initMap' para que muestre el Mapa con Los Marcadores y toda la configuración realizada 
google.maps.event.addDomListener(window, 'load', initMap);
</script>
        
    </section>
    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");
        const table = document.querySelector('#table');


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");
            table.classList.add("table-dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Modo Oscuro";

            } else {
                modeText.innerText = "Modo Claro";
                table.classList.add("table-light");
                table.classList.remove("table-dark");
            }
        });


        var elements = document.getElementsByClassName('table-td');

        for (var i = 0; i < elements.length; i++) {
            var value = elements[i].innerText || elements[i].textContent;

            if (value === 'inactivo') {
                elements[i].classList.add("table-danger");
            } else if (value === 'activo') {
                elements[i].classList.add("table-success");
            }
            else if (value === 'indefinido') {
                elements[i].classList.add("table-warning");
        }
    }
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>    
   
  <script type="text/javascript" src="js/main.js"></script> 
  </body>
</html>
