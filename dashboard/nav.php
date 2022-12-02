<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a href="http://localhost/tienda/dashboard"><i style="color:white; margin-right: 1rem" class="fa-solid fa-user-secret h1"></i></a>
        <a href="http://localhost/tienda/dashboard" class="navbar-brand mb-0 h1" style="margin-right: 2rem;">Pancholines Software</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="width:100%">
                <!-- <li class="nav-item"><input style="height:1rem; translate:0 0.3rem; background-color:transparent; padding-inline-end: 2.5rem;" type="text" class="form-control form-control-sm" placeholder="Buscar en toda la tienda..."></li> -->
                <?php if(strpos($actual_link, "mapa") !== false){ ?>
                    <li style="margin-left:auto" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i style="translate: 0 0.2rem" class='bx bx-map icon'></i>Acciones   
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li class="nav-item"><a href="../mapa/index.php" class="nav-link"> Registrar Ubicaciones <i style="translate: 0 0.2rem" class='bx bxs-location-plus icon'></i></a></li>
                        <li class="nav-item"><a href="../mapa/ubicaciones.php" class="nav-link"> Ubicaciones <i style="translate: 0 0.2rem" class='bx bx-map icon'></i></a></li>
                        <li class="nav-item"><a href="../mapa/mapa.php" class="nav-link"> Mapa <i style="translate: 0 0.2rem" class='bx bxs-map-alt icon'></i></a></li>
                    </ul>
                </li>
                <?php } ?>
                <li style="margin-left:auto" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i style="translate: 0 0.2rem" class="fa fa-user-circle h5"></i> <?php echo $us ?> 
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="http://localhost/tienda/dashboard/pagos.php">Mis pagos</a></li>
                        <?php if ($priv=='admin') { ?>
                        <li><a class="dropdown-item" href="http://localhost/tienda/dashboard/view/administrarPublicaciones.php">Publicaciones</a></li>
                        <li><a class="dropdown-item" href="http://localhost/tienda/dashboard/view/administrarContactos.php">Contactos</a></li>
                        <?php } ?>
                        <li><a class="dropdown-item" href="http://localhost/tienda/mapa">Mis ubicaciones</a></li>
                        <li><a class="dropdown-item" href="http://localhost/tienda/logout.php">Cerrar Sesion</a></li>
                    </ul>
                </li>
                <?php if ($priv=='admin') { ?>
                <li class="nav-item"><a href="http://localhost/tienda/dashboard/view/administrarProductos.php" class="nav-link">Administrar Productos <i style="translate: 0 0.2rem" class="fa fa-box h5"></i></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>