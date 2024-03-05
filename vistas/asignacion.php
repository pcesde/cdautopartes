<?php 
include "header.php";
if (isset( $_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
    include "../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
?>
<style>
    .container {
        max-width: 1300px; /* Ajusta este valor según tus necesidades */
        margin: 100 auto; /* Centra el contenedor en la página */
    }
</style>
<!-- Page Content -->
<div class="container">
    <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
        <h1 class="fw-light">Asignacion de Equipos</h1>
        <p class="lead">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAsignarEquipo">
                Asignar Equipo
            </button>
            <hr>
            <div id="tablaAsignacionesLoad"></div>
        </p>
        </div>
    </div>
</div>
<?php 
include "asignacion/modalAsignar.php";
include "footer.php";
?>
<script src="../public/js/asignacion/asignacion.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<?php
}else{
    header("location:../index.html");
}
?>
