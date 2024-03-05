$(document).ready(function(){
    $('#tablaReporteAdminLoad').load('reportesAdmin/tablaReportesAdmin.php', function() {
        // Una vez que la tabla se ha cargado, inicializa DataTables y agrega los botones
        $('#tablaReportesAdminDataTable').DataTable({
            dom: 'Bfrtip', // Para habilitar los botones y la barra de búsqueda
            buttons: [
                'excelHtml5',
                'pdfHtml5'
            ]
        });
    });
});
function eliminarReporteAdmin(idReporte){
    Swal.fire({
        title: 'Estas seguro de eliminar este registro?',
        text: "una vez eliminado no podra ser recuperado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data:"idReporte=" + idReporte,
                url: "../procesos/reportesCliente/eliminarReporteCliente.php",
                success:function(respuesta){
                    if (respuesta == 1) {
                        $('#tablaReporteClienteLoad').load('reportesCliente/tablaReporteCliente.php');
                        swal.fire(":D","Eliminado con exito!","success");
                    }else{
                        swal.fire(":(","Error al eliminar!" + respuesta,"error");
                    }
        
                }
            });    
        }
        });
        return false;
}
function obtenerDatosSolucion(idReporte){
    $.ajax({
        type: "POST",
        data:"idReporte=" + idReporte,
        url: "../procesos/reportesAdmin/obtenerSolucion.php",
        success:function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idReporte').val(respuesta['idReporte']);
            $('#solucion').val(respuesta['solucion']);
            $('#estatus').val(respuesta['estatus']);
        }
    });
    
}
function agregarSolucionReporte(){
    $.ajax({
        type: "POST",
        data:$('#frmAgregarSolucionReporte').serialize(),
        url: "../procesos/reportesAdmin/actualizarSolucion.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaReporteAdminLoad').load('reportesAdmin/tablaReportesAdmin.php');
                swal.fire(":D","Agregado con exito!", "success");
            }else{
                swal.fire(":(","Error al agregar!" + respuesta, "error");
            }
        }
    });
    return false;
}