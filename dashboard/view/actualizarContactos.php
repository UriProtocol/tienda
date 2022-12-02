<?php
include_once('../../sesiones.php');

$resultado = '';

if(isset($_REQUEST['con']) && isset($_REQUEST['plat'])){
    $plat = $_REQUEST['plat'];
    $con = $_REQUEST['con'];
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
$plat = $_POST['plataforma'];
$con = $_POST['contacto'];

$in = json_encode(array("plataforma"=>"$plat", "contacto"=>"$con"));

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/tienda/dashboard/controllers/productos.php?op=updateCon',
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

$resultado = 'actualizadoC';
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

    <button class="btn btn-primary mt-4 ms-4"><a href='administrarContactos.php' class="btn fs-5 ml-5 text-light">Volver</a></button>
    <center>
        <h1 class="fw-bold">Actualizar Contactos</h1>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <div class="row g-3 align-items-center col-5">
                    <div class="col-auto">
                        <label class="col-form-label fs-5 fw-bold" for="contacto">Contacto:</label>
                    </div>
                    <div class="col-auto w-100 mb-3 fs-5">
                        <input class="form-control fs-5" type="text" placeholder="<?php echo ($plat == 'WhatsApp') ? 'Número de telefono' : 'Dirección de contacto' ?>" name="contacto" value="<?php echo $con ?>">
                    </div>
                        <input type="hidden" name="plataforma" value="<?php echo $plat ?>">
                    
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