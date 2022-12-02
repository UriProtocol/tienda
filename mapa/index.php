<?php
include_once('../sesiones.php');
include_once('../conexion2.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //   $id=$_POST['id'];
    $direccion = $_POST['direccion'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
   
    include_once('php/connection.php');

    $consulta = "insert into mapa values(null,'$direccion',now(),'$latitud','$longitud')";

    $resultado = mysqli_query($con, $consulta);

    if ($resultado) {
         echo "<script>
                 alert('Registro insertado Exitosamente');
              </script>";
        //$entrar = "insercion2";
    } else {
         echo "<script>
                 alert('Registro No insertado, intentelo de nuevo');
               </script>"; 
        //$entrar = "error2";
    }
}



?>
    <!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/sidemenu.css">
    <link rel="stylesheet" href="css/reg-ubi.css">
    <link rel="stylesheet" href="css/reg-ubi2.css">
    <link rel="stylesheet" href="css/mapa.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <?php include_once("../dashboard/nav.php") ?>

  <title>Registro de ubicaciones</title>
</head>

<body>


    <section class="home">
        <div class="text">Registro de ubicaciones</div>
        <div class="content">

            <div>

                <div class="table-container">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                        <div class="wrap">
                <div class="mapa">
                    <div id="map"></div>
                    <div class="hidden">
                        <p id="lat"></p>
                        <p id="long"></p>
                        <p id="accu"></p>
                    </div>
                    <script src="js/mapa.js"></script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLJdkDe4edPXzvPqYaoM-cYUeUfJWh1rs&callback=initMap&v=weekly" defer></script>
                </div>
                <div class="form">
                    <form action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); 
                                    ?>" method="post" class="form-control" enctype="multipart/form-data">
                        <div class="contenedor-form">
                        <div class="grupo">
                                <input type="text" name="direccion" class="casilla" placeholder="  ">
                                <label for="direccion" class="etiqueta">Direccion:</label>
                            </div>
                            <div class="grupo">
                                <input type="text" name="latitud" id="lat2" class="casilla" placeholder="  " required>
                                <label for="lat2" class="etiqueta">Latitud:</label>
                            </div>
                            <div class="grupo">
                                <input type="text" name="longitud" id="long2" class="casilla" placeholder="  " required>
                                <label for="long2" class="etiqueta">Longitud:</label>
                            </div>
                            <input type="submit" value="Registrar Ubicación" class="submit">
                    </form>
                </div>
            </div>
                            <div class="paginador" id="paginador"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.content -->
        </div>

        </div>


    </section>

    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Modo Claro";
            } else {
                modeText.innerText = "Modo Oscuro";

            }
        });
    </script>

</body>

</html>