<?php
// Corregir el nombre del archivo de conexión según tu estructura de archivos
require_once "../clases/Conexion.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;
    $nuevaPassword = isset($_POST['nuevaPassword']) ? $_POST['nuevaPassword'] : null;

    if ($idUsuario !== null && $nuevaPassword !== null) {
        // Validar y procesar los datos

        // Actualizar la contraseña en la base de datos
        $conexion = Conexion::conectar();

        $sql = "UPDATE t_usuarios SET password = MD5(?) WHERE id_usuario = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("si", md5($nuevaPassword), $idUsuario);

        if ($query->execute()) {
            // Contraseña actualizada exitosamente
            echo json_encode(['success' => true]);
        } else {
            // Error al actualizar la contraseña
            echo json_encode(['success' => false, 'error' => 'Error al actualizar la contraseña']);
        }

        $query->close();
        Conexion::desconectar($conexion);
    } else {
        // Manejo de error si falta alguno de los datos requeridos
        echo json_encode(['success' => false, 'error' => 'Datos incompletos']);
    }
} else {
    // Redirección o manejo de error si no es una solicitud POST
    echo json_encode(['success' => false, 'error' => 'Solicitud no válida']);
}
?>
