<?php
include_once('../sesiones.php');
include_once('../conexion2.php');

$consulta = "SELECT * FROM pago WHERE usuario= '$id'";
$resultado = mysqli_query($con,$consulta);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pancholines shop</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <?php include_once("../dashboard/nav.php") ?>
</head>
<body style="background-color:#EAEDED">
    <div class="container mt-5">
        <h1 style="text-align:center" class="mb-3">Revisa tus pagos</h1>
    
        <div class="table-responsive col-md-12 p-2">
    <table class="table table-responsive table-hover table-bordered border-dark">
      <thead>
        <tr class="table-dark" style="text-align: center;">
          <th scope="col" style="width: 5%;">No.</th>
          <th scope="col" style="width: 10%;">Producto</th>
          <th scope="col" style="width: 5%;">Precio</th>
          <th scope="col" style="width: 10%;">Pagaste con</th>
          <th scope="col" style="width: 10%;">Estado de pago</th>
          <th scope="col" style="width: 10%;">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($fila=mysqli_fetch_assoc($resultado)) {?>
        <tr style="text-align: center;">
          <th><?php echo $fila['id']?></th>
          <td><?php echo $fila['producto']?></td>
          <td><?php echo $fila['precio']?></td>
          <td><?php echo $fila['tipo_pago']?></td>
          <?php if($fila['status_pago']=="approved"){ ?>
            <td class="text-success fw-bold">Aprovado</td>
          <?php }else { ?>
            <td class="text-danger fw-bold">Pendiente</td>
          <?php } ?>
          <td><button type="button" class="btn btn-danger"><a href="eliminarpagos.php?id=<?php echo $fila['id']?>"><i class="bi bi-trash text-light"></i></a></button></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
</div>
</body>
</html>