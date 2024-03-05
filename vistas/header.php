<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/plantilla.css">
    <link rel="stylesheet" href="../public/datatable/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../public/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/datatable/dataTables.buttons.min.js">
    <link rel="stylesheet" href="../public/fontawesome/css/all.css">
    <title>CD Autopartes</title>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-light static-top mb-5 shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CD Autopartes</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="inicio.php">Inicio</a>
                    </li>
                    <?php if ($_SESSION['usuario']['rol'] == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="misDispositivos.php">Mis dispositivos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="misReportes.php">Mis Reportes</a>
                        </li>
                    <?php } elseif ($_SESSION['usuario']['rol'] == 2) { ?>
                        <!-- De aquí son las vistas del administrador -->
                        <li class="nav-item">
                            <a class="nav-link" href="usuarios.php">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="asignacion.php">Equipos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reportes.php">Reportes</a>
                        </li>
                    <?php }?>
                    <li class="nav-item dropdown">
                        <a style="color: red" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuario: <?php echo $_SESSION['usuario']['nombre'];?>
                        </a>
                        <?php if ($_SESSION['usuario']['rol'] == 2) { ?> <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Editar Datos</a> 
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">Salir</a> 
                            <?php } elseif ($_SESSION['usuario']['rol'] == 1) { ?> <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                
                            <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">Salir</a> 
                            <?php }?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido de tu página aquí -->

    <script src="../public/jquery/jquery-3.7.1.min.js"></script>
    <script src="../public/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>



</body>
</html>
