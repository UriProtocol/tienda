<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="sidebars.css" rel="stylesheet">
  </head>
  <body class="p-3 m-0 border-5 bd-example">

    <!-- Example Code -->
    
    <nav class="navbar navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Api Restful</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">AppwebOS</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
          <nav class="fixed-top">
  <main class="d-flex flex-nowrap">
    <div class="bg-dark d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="#" class="nav-link text-white btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-bold" aria-current="page" data-bs-toggle="collapse" data-bs-target="#home-collapse">
            Categorias
          </a>
          <div class="collapse show" id="home-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-3 small">
              <li><a href="../view/administrarCategoria.php" class="link-light d-inline-flex text-decoration-none rounded">Administrar</a></li>
              <li><a href="../view/nuevoCategoria.php" class="link-light d-inline-flex text-decoration-none rounded">Nuevo</a></li>
            </ul>
          </div>
        </li>
        <li>
          <a href="#" class="nav-link text-white btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-bold" aria-current="page" data-bs-toggle="collapse" data-bs-target="#pro-collapse">
            Productos
          </a>
          <div class="collapse show" id="pro-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="../view/administrarProductos.php" class="link-light d-inline-flex text-decoration-none rounded">Administrar</a></li>
              <li><a href="../view/nuevoProducto.php" class="link-light d-inline-flex text-decoration-none rounded">Nuevo</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
    <div class="b-example-vr"></div>
  </main>
</nav class="navbar navbar-dark bg-dark fixed-top">
              
          </div>
        </div>
      </div>
    </nav>
    
    <!-- End Example Code -->
    <script src="sidebars.js"></script>
  </body>
</html>