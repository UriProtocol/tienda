<?php
include_once('../sesiones.php');
include_once('../conexion2.php');


$id=$_REQUEST['id'];

//CONSULTA
$consulta="delete from pago where id='$id'";

$resultado=mysqli_query($con,$consulta);

if ($resultado){
  echo "<script>
  alert('Registro eliminado con Éxito');
  location.href='pagos.php';
  </script>";
}
else 
{
  echo "<script>
  alert('Registro NO eliminado, intentelo de nuevo ...');
  location.href='pagos.php';
  </script>";
}



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
</head>
<body style="background-color:#EAEDED">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a href="#"><i style="color:white; margin-right: 1rem" class="fa-solid fa-user-secret h1"></i></a>
        <a href="index.php" class="navbar-brand mb-0 h1" style="margin-right: 2rem;">Pancholines Software</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="width:100%">
                <!-- <li class="nav-item"><input style="height:1rem; translate:0 0.3rem; background-color:transparent; padding-inline-end: 2.5rem;" type="text" class="form-control form-control-sm" placeholder="Buscar en toda la tienda..."></li> -->
                <li style="margin-left:auto" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i style="translate: 0 0.2rem" class="fa fa-user-circle h5"></i> <?php echo $us ?> 
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="pagos.php">Mis pagos</a></li>
                        <li><a class="dropdown-item" href="../mapa/index.php">Mis ubicaciones</a></li>
                        <li><a class="dropdown-item" href="../logout.php">Cerrar Sesion</a></li>
                    </ul>
                </li>
                <?php if ($priv=='admin') { ?>
                <li class="nav-item"><a href="view/administrarProductos.php" class="nav-link">Administrar Productos <i style="translate: 0 0.2rem" class="fa fa-box h5"></i></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    </nav>
</body>
</html>