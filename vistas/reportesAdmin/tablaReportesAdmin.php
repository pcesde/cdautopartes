<?php
session_start();
include "../../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$idUsuario = $_SESSION['usuario']['id'];
$contador = 1;
$sql = "SELECT 
            reporte.id_reporte AS idReporte,
            reporte.id_usuario AS idUsuario,
            CONCAT(persona.paterno,
                    ' ') AS nombrePersona,
            equipo.id_equipo AS idEquipo,
            equipo.nombre AS nombreEquipo,
            reporte.descripcion_problema AS problema,
            reporte.estatus AS estatus,
            reporte.solucion_problema AS solucion,
            reporte.fecha AS fecha,
            reporte.fecha_actualizado AS fecha_actualizado
            
        FROM
            t_reportes AS reporte
            INNER JOIN t_usuarios AS usuario ON reporte.id_usuario = usuario.id_usuario
            INNER JOIN t_persona AS persona ON usuario.id_persona = persona.id_persona
            INNER JOIN t_cat_equipo AS equipo ON reporte.id_equipo = equipo.id_equipo
        ORDER BY reporte.fecha DESC";
$respuesta = mysqli_query($conexion, $sql);
?>

<div class="box-typical box-typical-padding">
    <div class="table-responsive">
        <table id="tablaReportesAdminDataTable" class="table table-bordered table-striped table-vcenter js-dataTable-full table-sm">
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th>Dispositivo</th>
                <th>Fecha</th>
                <th>Fecha Actualizado</th>
                <th>Descripcion</th>
                <th>Estatus</th>
                <th>Legajo Soporte</th>
                <th>Accion</th>
              
            </thead>
            <tbody>
                <?php while ($mostrar = mysqli_fetch_array($respuesta)) : ?>
                    <tr>
                        <td><?= $contador++ ?></td>
                        <td><?= $mostrar['nombrePersona'] ?></td>
                        <td><?= $mostrar['nombreEquipo'] ?></td>
                        <td><?= $mostrar['fecha'] ?></td>
                        <td><?= $mostrar['fecha_actualizado'] ?></td>
                        <td><?= $mostrar['problema'] ?></td>
                        <td>
                           <?php
                            $estatus = $mostrar['estatus'];
                            $cadenaEstatus = '';

                            if ($estatus == 0) {
                                $cadenaEstatus = '<span class="badge bg-warning">CERRADO</span>';
                            } elseif ($estatus == 1) {
                                $cadenaEstatus = '<span class="badge bg-danger">ABIERTO</span>';
                            } elseif ($estatus == 2) {
                                $cadenaEstatus = '<span class="badge bg-success">EN PROCESO</span>';
                            } elseif ($estatus == 3) {
                                $cadenaEstatus = '<span class="badge bg-secondary">NUEVO</span>';
                            }

                            echo $cadenaEstatus;
                            ?>
                        </td>
                       
                        <td><?= $mostrar['solucion'] ?></td>
                        <td>
                            <button class="btn btn-info btn-sm" onclick="obtenerDatosSolucion('<?php echo $mostrar['idReporte']; ?>')"
                                data-toggle="modal" data-target="#modalAgregarSolucionReporte">
                                Solucion
                            </button>
                            
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div> <!-- Cierre del contenedor responsive -->
</div>


<script>
    $(document).ready(function () {
        $('#tablaReportesAdminDataTable').DataTable();
    });
</script>
