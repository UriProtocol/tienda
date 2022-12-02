<?php
include "php/connection.php";

$mapid = $_POST['mapid'];

$consulta = "select * from mapa where id=" . $mapid;
$resultado = mysqli_query($con, $consulta);
while ($fila = mysqli_fetch_array($resultado)) {
     $lat = $fila['latitud'];
     $lng = $fila['longitud'];
?>
<link rel="stylesheet" href="kkk.css">
<div>
    <div>
    <div class="map" id="map">
          </div>
          <script>
                    function iniciarMap() {
                        var coord = {
                            lat: <?php echo $lat; ?>,
                            lng: <?php echo $lng; ?>
                        };
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 20,
                            center: coord
                        });
                        var marker = new google.maps.Marker({
                            position: coord,
                            map: map
                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtVF9jeydjoY6uO86BYqDhYZ-kXnQ45h4&callback=iniciarMap"></script>                                                  
    </div>
     
</div>
      

   

<?php } ?>