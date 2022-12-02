<?php 

$payment = $_GET['payment_id'];
$status = $_GET['status'];
$payment_type = $_GET['payment_type'];
$order_id = $_GET['merchant_order_id'];
$producto = $_GET['producto'];
$usuario = $_GET['usuario'];
$precio = $_REQUEST['precio'];
$pagada = 'si';

include_once('../../conexion2.php');

$consulta = "INSERT INTO pago VALUES (NULL, '$usuario', '$producto', '$payment', '$status', '$payment_type', '$order_id', DEFAULT, '$precio')";
$resultado = $con->query($consulta);



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
    <style>
      body{
        background: rgba(0, 0, 0, 0.5);
      }
    </style>
</head>
<body class="m-0 vh-100 row justify-content-center align-items-center">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">¡Pago exitoso!</h5>
    <p class="badge bg-primary w-100 text-uppercase" style="font-size: 100%;"><a class="para_pagar text-white" href="../index.php?producto=<?php echo $producto ?>">Volver a la pagina</a></p>
    <div class="checkout-btn mt-4 row justify-content-center align-items-center"></div>
  </div>
</div>
</body>
</html>