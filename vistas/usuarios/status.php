<?php
include "../../clases/Conexion.php";
$con = new Conexion();

// Verifica que la conexión esté establecida antes de ejecutar la consulta
if ($con->conectar()) {
    $mysqli = $con->conectar(); // Obtén el objeto mysqli desde la conexión

    if (isset($_GET['id']) && isset($_GET['estado'])) {
        $id = $_GET['id'];
        $estado = ($_GET['estado'] == 'activo') ? 1 : 2;

        // Utiliza el objeto mysqli en lugar de la conexión
        $q = "UPDATE t_usuarios SET activo=$estado WHERE id_usuario=$id";
        mysqli_query($mysqli, $q);

        // Redirige a la misma página con el nuevo estado
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
    $con->desconectar(); // Desconecta después de realizar la consulta
} else {
    // Manejo de error si la conexión no está establecida
    echo "Error: No se pudo establecer la conexión a la base de datos.";
}
?>
