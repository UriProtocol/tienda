<?php
include_once('../sesiones.php');
include_once('../conexion2.php');
include_once("php/connection.php");
?>
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Icon tab -->
    <link rel="apple-touch-icon" sizes="180x180" href="./sgrp-ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./sgrp-ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./sgrp-ico/favicon-16x16.png">
    <link rel="manifest" href="./sgrp-ico/site.webmanifest">


    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/sidemenu.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" type="text/css" href="kkk.css">
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <title>Ubicaciones</title>
</head>

<body>

<?php include_once("../dashboard/nav.php") ?>

    <section class="home">
        <div class="content">

            <div>
                <div class="titulares">
                    <h2 class="t-title">Ubicaciones registradas</h2>
                </div>

                <div class="table-container">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-condensed">
                                <thead>
                                    <th class="table_head">ID</th>
                                    <th class="table_head">Direccion</th>
                                    <th class="table_head">Tiempo</th>
                                    <th class="table_head">Acción</th>
                                </thead>
                                <?php
                                include_once("php/connection.php");
                                $consulta = "select * FROM mapa";
                                $resultado = mysqli_query($con, $consulta);


                                if (mysqli_num_rows($resultado) > 0) {
                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                        $locationid = $fila['id'];

                                ?>
                                        <tr>
                                            <td data-label="ID" data-label="ID"><?php echo $locationid; ?></td>
                                            <td data-label="Tienda"><?php echo $fila['direccion'] ?></td>
                                            <td data-label="Tiempo"><?php echo $fila['tiempo'] ?></td>
                                            <!-- <td data-label="Localizacion"><a class="btn btn-danger btn-abrir" id="btn-abrir" ><i class='bx bxs-map'> Ver</i></a></td> -->
                                            <td data-label="Localizacion"> <button data-id='<?php echo $fila    ['id']; ?>' class="userinfo btn btn-success">Mapa</button></td>
                                                    
                                        </tr>
                                <?php

                                    }
                                }

                                ?>



                            </table>
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
    <!-- MODAL -->
    
  <script type='text/javascript'>
    $(document).ready(function() {
      $('.userinfo').click(function() {
        var mapid = $(this).data('id');
        $.ajax({
          url: 'select.php',
          type: 'post',
          data: {
            mapid: mapid
          },
          success: function(response) {
            $('.modal-body').html(response);
            $('#empModal').modal('show');
          }
        });
      });
    });
  </script>
  </div>
  <div class="modal fade" id="empModal" role="dialog">
    <div class="modal-dialog"  style="display: flex; align-items: center; justify-content: center;">
      <div class="modal-content" style="width: 7000px; height: 100%; text-align: center;">
        <div class="modal-header">
        </div>
        <div class="modal-body">


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    <!-- Termina MODAL -->
    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");
        const table = document.querySelector('#table');


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");
            table.classList.add("table-dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Modo Oscuro";

            } else {
                modeText.innerText = "Modo Claro";
                table.classList.add("table-light");
                table.classList.remove("table-dark");
            }
        });

        var elements = document.getElementsByClassName('table-td');

        for (var i = 0; i < elements.length; i++) {
            var value = elements[i].innerText || elements[i].textContent;

            if (value === 'inactivo') {
                elements[i].classList.add("table-danger");
            } else if (value === 'activo') {
                elements[i].classList.add("table-success");
            }
        }
    </script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript" src="js/main.js"></script>
    <!-- JS Bootsrap -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- JQuery -->
    <!-- JS Popper -->
</body>

</html>