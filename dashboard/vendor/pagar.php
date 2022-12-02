<?php
require_once 'autoload.php';

MercadoPago\SDK::setAccessToken('TEST-1934391802829909-101223-c01150772a811154630cfc1e965f8bee-277588512');

//Crear un objeto de preferencia
$preference = new MercadoPago\Preference();

$producto = $_GET['producto'];
$usuario = $_GET['usuario'];
$nombre = $_GET['nombre'];
$precio = $_GET['precio'];

// Crear un item en la preferencia
$item = new MercadoPago\Item();
$item->id = $producto;
$item->title = $nombre;
$item->quantity = 1;
$item->unit_price = $precio;
$item->currency_id = "MXN";

$preference->items = array($item);

$preference->back_urls = array(
  "success" => "http://localhost/tienda/dashboard/vendor/captura.php?producto=$producto&usuario=$usuario&precio=$precio",
  "pending" => "http://localhost/tienda/dashboard/vendor/pendiente.php?producto=$producto&usuario=$usuario&precio=$precio",
  "failure" => "http://localhost/tienda/dashboard/vendor/fallo.php",
);

$preference->save();

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
<script src="https://sdk.mercadopago.com/js/v2"></script>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Para pagar tu producto has clic en el siguiente boton</h5>
    <div class="checkout-btn mt-4 row justify-content-center align-items-center"></div>
    <script>
      const mp = new MercadoPago('TEST-83f35549-5659-480c-b7d0-10d6e71f7951', {
        locale: 'es-MX'
      });

      mp.checkout({
        preference: {
        id: '<?php echo $preference->id; ?>'
        }, 
       render: {
        container: '.checkout-btn',
        label: 'Pagar con MP'
        }
      });
    </script> 
  </div>
</div>
</body>
</html>