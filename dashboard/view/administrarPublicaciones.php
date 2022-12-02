<?php
include_once('../../sesiones.php');
$endpoint="http://localhost/tienda/dashboard/controllers/productos.php?op=getInsta";

//Crear un objeto de tipo array assoc para guardar el contenido de JSON
$datos = json_decode(file_get_contents($endpoint), true);

?>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<?php include_once("../nav.php") ?>

<h1 style="text-align: center" class="fw-bold mt-4 mb-3">Contactos</h1>

<button class="btn btn-primary mt-2 mb-4 ms-4"><a href='nuevoPublicacion.php' class="btn fs-5 ml-5 text-light">Nueva Publicación</a></button>


<div class="table-responsive col-md-10 p-2 ms-auto me-auto">
    <table class="table table-responsive table-hover table-bordered border-dark">
      <thead>
        <tr class="table-dark" style="text-align: center;">
          <th scope="col" style="width: 10%;">Id</th>
          <th scope="col" style="width: 10%;">Link</th>
          <th scope="col" style="width: 10%;">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i=0;$i<count($datos);$i++){ ?>
        <tr style="text-align: center;">
          <td><?php echo $datos[$i]['id']?></td>
          <td><?php echo $datos[$i]['link']?></td>
          <td><a href="eliminarPublicaciones.php?id=<?php echo $datos[$i]['id']?>"><button type="button" class="btn btn-danger" style="margin: 0.5rem"><i class="bi bi-trash text-light"></i></button></a> <a href="actualizarPublicaciones.php?id=<?php echo $datos[$i]['id']?>&link=<?php echo $datos[$i]['link']?>"><button type="button" class="btn btn-primary" style="margin: 0.5rem"><i class="bi bi-arrow-clockwise text-light"></i></button></a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
</div>