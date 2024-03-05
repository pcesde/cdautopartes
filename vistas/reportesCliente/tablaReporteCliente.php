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
                    ' ',
                    ' ',
                    persona.nombre) AS nombrePersona,
            equipo.id_equipo AS idEquipo,
            equipo.nombre AS nombreEquipo,
            reporte.descripcion_problema AS problema,
            reporte.estatus AS estatus,
            reporte.solucion_problema AS solucion,
            reporte.fecha AS fecha,
            reporte.fecha_actualizado AS fecha_actualizado,
            reporte.asignado AS asignado
    FROM
        t_reportes AS reporte
            INNER JOIN
        t_usuarios AS usuario ON reporte.id_usuario = usuario.id_usuario
            INNER JOIN
        t_persona AS persona ON usuario.id_persona = persona.id_persona
            INNER JOIN
        t_cat_equipo AS equipo ON reporte.id_equipo = equipo.id_equipo
            AND reporte.id_usuario = '$idUsuario'";
    $respuesta = mysqli_query($conexion, $sql);
?>
<div class="box-typical box-typical-padding">
    <div class="table-responsive">
   <table id="tablaReportesClienteDataTable" class="table table-bordered table-striped table-vcenter js-dataTable-full table-sm">
    <thead>
        <th>#</th>
        <th>Persona</th>
        <th>Dispositivo</th>
        <th>Fecha</th>
        <th>Fecha Actualizado</th>
        <th>Descripcion</th>
        <th>Estado</th>
        <th>Soporte</th>
        
    </thead>
    <tbody>
        <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
        <tr>
            <td><?php echo $contador++; ?></td>
            <td><?php echo $mostrar['nombrePersona'];?></td>
            <td><?php echo $mostrar['nombreEquipo'];?></td>
            <td><?php echo $mostrar['fecha'];?></td>
            <td><?php echo $mostrar['fecha_actualizado']?></td>
            <td><?php echo $mostrar['problema'];?></td>
           <td>
                            <?php
                            $estatus = $mostrar['estatus'];
                            $cadenaEstatus = '';

                            if ($estatus == 0) {
                                $cadenaEstatus = '<span class="badge bg bg-warning">CERRADO</span>';
                            } elseif ($estatus == 1) {
                                $cadenaEstatus = '<span class="badge bg-info">ABIERTO</span>';
                            } elseif ($estatus == 2) {
                                $cadenaEstatus = '<span class="badge bg-success">EN PROCESO</span>';
                            } elseif ($estatus == 3) {
                                $cadenaEstatus = '<span class="badge bg-secondary">NUEVO</span>';
                            }

                            echo $cadenaEstatus;
                            ?>
                        </td>
            <!--<td><?php echo $mostrar['solucion'];?></td>-->
            <td>
                <?php 
                $asignado = $mostrar['solucion'];
                        if ($asignado == 1111) {
                            echo "Soporte 1";
                        } elseif ($asignado == 1112) {
                            echo "Soporte 2";
                        } elseif ($asignado == 1113) {
                            echo "Soporte 3";
                        } elseif ($asignado == 1114) {
                            echo "Soporte 4";  
                        };
                ?>
            </td>
            
        </tr>
        <?php } ?>
    </tbody>
   </table>
  </div> 
</div> 
<script>
    $(document).ready(function(){
        $('#tablaReportesClienteDataTable').DataTable();
    });
</script>