<?php
include_once('../../sesiones.php');

$resultado = '';

$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$precio = $_REQUEST['precio'];



if($_SERVER["REQUEST_METHOD"]=="POST"){
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$imagen = $_FILES['imagen']['name'];
$archivo = $_FILES['imagen']['tmp_name'];

$ruta = "../public/uploads" . $imagen;
$basae_datos = "public/uploads". $imagen;

move_uploaded_file($archivo,$ruta);

$in = json_encode(array("nombre"=>"$nombre", "precio"=>"$precio", "imagen"=>"$base_datos", "id"=>"$id"));

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/tienda/dashboard/controllers/productos.php?op=update',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS => $in,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$resultado = 'actualizadoP';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Document</title>
</head>
<body>

<?php include_once("../nav.php") ?>

    <button class="btn btn-primary"><a href='administrarProductos.php' class="btn fs-5 ml-5 text-light">Volver</a></button>
    <center>
        <h1 class="fw-bold">Actualizar Producto No. <?php echo $id ?></h1>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id?>">
                <div class="row g-3 align-items-center col-5">
                    <div class="col-auto">
                        <label class="col-form-label fs-5 fw-bold" for="nombre">Nombre:</label>
                    </div>
                    <div class="col-auto w-100 mb-3 fs-5">
                        <input class="form-control fs-5" type="text" placeholder="Nombre del producto" name="nombre" value="<?php echo $nombre ?>">
                    </div>
                        
                    <div class="col-auto">
                        <label class="col-form-label fs-5 fw-bold" for="precio">Nuevo precio:</label>
                    </div>
                    <div class="col-auto w-100 mb-3 fs-5">
                        <input class="form-control fs-5" type="text" placeholder="Precio del producto" name="precio" value="<?php echo $precio ?>">
                    </div>
                        
                    <div class="col-auto">
                        <label class="col-form-label fs-5 fw-bold" for="imagen">Nueva imagen:</label>
                    </div>
                    <div class="col-auto w-100 mb-3 fs-5">
                        <input class="form-control fs-5" type="file" name="imagen">
                    </div>
                </div>

                <div class="d-grid gap-4 col-5 mx-auto">
                    <button class="btn btn-primary w-100"><input class="btn text-light fs-5" type="submit" name="enviar" value="Enviar"></button>
                    <button class="btn btn-danger w-100"><input class="btn text-light fs-5" type="reset" name="borrar" value="Borrar"></button>
                </div>
                
            </form>
    </center>
</body>
</html>

<?php
	include_once("../alertas.php");
?>