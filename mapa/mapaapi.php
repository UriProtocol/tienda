<?php
include_once("php/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mapa</title>
</head>
<body>
  <script>
    function iniciarMap(){
  var coord = {lat:<?php echo $fila['latitud']; ?> ,lng: <?php echo $fila['longitud']; ?>};
  var map = new google.maps.Map(document.getElementById('map'),{
    zoom: 10,
    center: coord
  });
  var marker = new google.maps.Marker({
    position: coord,
    map: map
  });
}
  </script>
</body>
</html>
