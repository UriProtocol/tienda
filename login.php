<?php
require_once ('bootstrap/bootstrap.php');

session_start();

if(isset($_SESSION))
{
  session_destroy();
}

//Alerta
$resultado="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $us=$_POST['nombre'];
  $ps=$_POST['pass'];

  include_once('conexion2.php');

  $consulta="select username, password, privilegio, id from usuarios where username='$us' and password='$ps'";

  $resultado=$con->query($consulta);

  if($resultado->num_rows>0){

    if($fila=$resultado->fetch_assoc()){
      $priv=$fila['privilegio'];
      $id = $fila['id'];

      session_start();
      $_SESSION['id']=$id;
      $_SESSION['username']=$us;
      $_SESSION['password']=$ps;
      $_SESSION['privilegio']=$priv;

      $resultado = "ingresadoo";
    }
  }
  else 
  {



    $resultado="error";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>LOGIN DE ACCESO</title>
     
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css" />
</head>

<body class="bg-dark">
    <section>
      <div class="row g-0">
          <div class="col-lg-7 d-none d-lg-block img-1">
              <!-- <img src="img/form.jpg" alt=""> -->
          </div>
          
          <div class="col-lg-5 bg-dark d-flex flex-column align-items-end min-vh-100">
              <div class="px-lg-5 pt-lg-4 pb-lg-2 p-4 mb-auto w-100">
                  <!-- <img src="img/logo.png" class="img-fluid" width="15%"/> -->
              </div>
              <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
              <h1 class="font-weight-bold mb-4 text-light">Tienda Online</h1>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="mb-5">
                  <div class="mb-4">
                    <label for="nombre" class="form-label font-weight-bold text-light">Usuario</label>
                    <input type="text" class="form-control bg-dark-x border-0" name="nombre" placeholder="Ingresa tu nombre de usuario" required>
                  </div>
                  <div class="mb-4">
                    <label for="pass" class="form-label font-weight-bold text-light">Contraseña</label>
                    <input type="password" class="form-control bg-dark-x border-0 mb-2" name="pass" placeholder="Ingresa tu contraseña" required>
                  </div>
                  <button type="submit" class="btn btn-primary w-100" name="enviar">Iniciar sesión</button>
                  <button type="reset" class="btn btn-danger w-100 mt-4" name="borrar">Borrar</button>
                </form>
              </div>
              
              <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 mt-auto w-100">
                  <p class="d-inline-block mb-0"></p> <a href="" class="text-light font-weight-bold text-decoration-none"></a>
              </div>
          </div>
      </div>
    </section>

  <!-- Optional JavaScript -->
  <!-- Popper.js first, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>

<?php
include_once("dashboard/alertas.php");
?>