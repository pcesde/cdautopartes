<?php
include "../../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql ="SELECT 
            usuarios.id_usuario AS idUsuario,
            usuarios.usuario AS nombreUsuario,
            roles.nombre AS rol,
            usuarios.id_rol AS idRol,
            usuarios.ubicacion AS ubicacion,
            usuarios.activo AS estatus,
            usuarios.id_persona AS idPersona,
            persona.nombre AS nombrePersona,
            persona.paterno AS paterno,
            persona.materno AS materno,
            persona.fecha_nacimiento AS fechaNacimiento,
            persona.sexo AS sexo,
            persona.correo AS correo,
            persona.telefono AS telefono
    FROM 
        t_usuarios AS usuarios
            INNER JOIN
        t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
            INNER JOIN
        t_persona AS persona ON usuarios.id_persona = persona.id_persona";
        
$respuesta = mysqli_query($conexion,$sql);
?>
<div class="box-typical box-typical-padding">
<div class="table-responsive">
<table id="tablaUsuariosDataTable" class="table table-bordered table-striped table-vcenter js-dataTable-full table-sm">
    <thead>
        <th>Apellido</th>
        
        <th>Nombre</th>
        <th>Edad</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Usuario</th>
        <th>Ubicacion</th>
        <th>Area</th>
        
        <th>Estado</th>
        <th>Editar</th>
        
    </thead>
    <tbody>
        <?php
            while ($mostrar = mysqli_fetch_array($respuesta)) {
                
        ?>
            <tr>
                <td><?php echo $mostrar ['paterno'];?></td>
                
                <td><?php echo $mostrar ['nombrePersona']; ?></td>
                <td><?php echo $mostrar ['fechaNacimiento']; ?></td>
                <td><?php echo $mostrar ['telefono'];?></td>
                <td><?php echo $mostrar ['correo'];?></td>
                <td><?php echo $mostrar ['nombreUsuario']; ?></td>
                <td><?php echo $mostrar ['ubicacion'];?></td>
                <td><?php echo $mostrar ['sexo'];?></td>
                
                <td>
                <?php 
    $id = isset($mostrar['idUsuario']) ? $mostrar['idUsuario'] : 'ID_no_definido';
    
    if (isset($mostrar['estatus'])) {
        $estado = $mostrar['estatus'] == 1 ? 'inactivo' : 'activo';
        $url = "usuarios/status.php?id=" . urlencode($id) . "&estado=" . urlencode($estado);
        $class = $mostrar['estatus'] == 1 ? 'btn-success' : 'btn-danger';
        $text = $mostrar['estatus'] == 1 ? 'Activo' : 'Inactivo';
    } else {
        // Si 'estatus' no está definido, proporciona valores predeterminados
        $url = "#";  // o la URL que prefieras
        $class = 'btn-secondary';  // o la clase que prefieras
        $text = 'Estado no definido';  // o el texto que prefieras
    }
?>

    
    <a href="<?php echo $url; ?>" class="btn btn-sm <?php echo $class; ?>">
        <?php echo $text; ?>
    </a>
</td>




                <td>
                    <button class="btn btn-secondary btn-sm"
                    data-toggle="modal" 
                    data-target="#modalActualizarUsuarios"
                    onclick="obtenerDatosUsuario(<?php echo $mostrar['idUsuario']?>)">
                        Editar
                    </button>
                </td>
               
                
            </tr>
            <?php }?>
        </tbody>
    </table>
  </div>
</div>
<script>
    // JavaScript para cambiar visualmente el estado sin recargar la página
    document.addEventListener("DOMContentLoaded", function () {
        // Obtiene todos los botones con la clase 'btn-activo'
        var btnActivos = document.querySelectorAll('.btn-estado');

        // Asigna un evento click a cada botón
        btnActivos.forEach(function (btn) {
            btn.addEventListener('click', function (event) {
                event.preventDefault(); // Evita que el enlace realice la acción predeterminada

                // Obtiene el ID y el estado del botón
                var id = btn.dataset.id;
                var estado = btn.dataset.estado;

                // Realiza una petición AJAX para actualizar el estado
                var xhr = new XMLHttpRequest();
                xhr.open('GET', `usuarios/status.php?id=${id}&estado=${estado}`);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Actualiza visualmente el estado del botón
                        btn.classList.toggle('btn-success');
                        btn.classList.toggle('btn-danger');
                        btn.textContent = (estado === 'activo') ? 'Inactivo' : 'Activo';
                        btn.dataset.estado = (estado === 'activo') ? 'inactivo' : 'activo';
                    }
                };
                xhr.send();
            });
        });
    });
</script>


<script>
    $(document).ready(function(){
        $('#tablaUsuariosDataTable').DataTable();

    });
</script>