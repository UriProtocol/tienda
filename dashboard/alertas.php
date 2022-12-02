<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.all.min.js"></script>

<!-- ALERTAS PARA INICIO DE SESION -->
<?php if ($resultado=="ingresadoo") { ?>
    <script>
        function mensaje(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Bienvenido <?php echo $us?>',
                showConfirmButton: true
            }).then(function(){
                location.href='dashboard/index.php'
            });
        }
        mensaje();
    </script>
<?php } ?>

<?php if ($resultado=="error") { ?>
    <script>
        function mensaje(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Contraseña o usuario incorrecto',
                showConfirmButton: true
            });
        }
        mensaje();
    </script>
<?php } ?>


<!-- ----------------------------------------------------- -->


<!-- ALERTAS PARA PRODUCTOS -->
<!-- Alerta insertar producto -->
<?php if ($resultado=="exito1") { ?>
    <script>
        function mensaje(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Registro insertado exitosamente',
                showConfirmButton: true
            }).then(function(){
                location.href='administrarProductos.php'
            });
        }
        mensaje();
    </script>
<?php } ?>

<?php if ($resultado=="exitoInsta") { ?>
    <script>
        function mensaje(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Publicación ingresada exitosamente',
                showConfirmButton: true
            }).then(function(){
                location.href='administrarPublicaciones.php'
            });
        }
        mensaje();
    </script>
<?php } ?>

<!-- Alerta actualizar producto -->
<?php if ($resultado=="actualizadoP") { ?>
    <script>
        function mensaje(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Registro actualizado exitosamente',
                showConfirmButton: true
            }).then(function(){
                location.href='administrarProductos.php'
            });
        }
        mensaje();
    </script>
<?php } ?>

<!-- Alerta actualizar contacto -->
<?php if ($resultado=="actualizadoC") { ?>
    <script>
        function mensaje(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Contacto actualizado exitosamente',
                showConfirmButton: true
            }).then(function(){
                location.href='administrarContactos.php'
            });
        }
        mensaje();
    </script>
<?php } ?>

<?php if ($resultado=="actualizadoInsta") { ?>
    <script>
        function mensaje(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Publicación actualizada exitosamente',
                showConfirmButton: true
            }).then(function(){
                location.href='administrarPublicaciones.php'
            });
        }
        mensaje();
    </script>
<?php } ?>

<!-- Alerta eliminar producto -->
<?php if ($resultado=="eliminadoP") { ?>
    <script>
        function mensaje(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Registro eliminado exitosamente',
                showConfirmButton: true
            }).then(function(){
                location.href='administrarProductos.php'
            });
        }
        mensaje();
    </script>
<?php } ?>

<?php if ($resultado=="eliminadoInsta") { ?>
    <script>
        function mensaje(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Publicación eliminada exitosamente',
                showConfirmButton: true
            }).then(function(){
                location.href='administrarPublicaciones.php'
            });
        }
        mensaje();
    </script>
<?php } ?>