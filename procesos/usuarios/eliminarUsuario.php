<?php
session_start();
include "Usuarios.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idUsuario'])) {
    $idUsuario = $_POST['idUsuario'];

    $usuarios = new Usuarios();
    $exito = $usuarios->eliminarUsuario($idUsuario);

    echo $exito ? "Éxito" : "Error al eliminar usuario";
} else {
    echo "Solicitud no válida";
}
