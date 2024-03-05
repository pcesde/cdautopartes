<?php 
include "header.php";
if (isset( $_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
?>
<!-- Page Content -->
<div class="container">
    <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
        <h1 class="fw-light">Administrar Usuario</h1>
        <p class="lead">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuarios">
                Agregar Usuario
            </button>
            <hr>
            <div id="tablaUsuariosLoad"></div>
        </p>
        </div>
    </div>
</div>
<?php 
include "usuarios/modalAgregar.php";
include "usuarios/modalActualizar.php";
include "footer.php";
include "usuarios/modalCambiarPassword.php";
?>
    <script src="../public/js/usuarios/usuarios.js"></script>
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
