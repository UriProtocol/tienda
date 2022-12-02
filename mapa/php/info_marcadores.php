<?php
 include('connection.php');
 $result = mysqli_query($con, "SELECT * FROM mapa");
  // Agregamos la direccion y tiempo a la ventana de información de cada marcador, puedes agregar la información que desees, nosotros agregaremos 'nombre' y 'direccion' 
 
  if($result->num_rows > 0){
    
    while($row = $result->fetch_assoc()){ ?>
    
    ['<div class="info_content">' + '<h3><?php echo $row['direccion']; ?></h3>' + '<p><?php echo $row['tiempo'] ; ?></p>' +'</div>'], 
 
    <?php }
  }
 
?>