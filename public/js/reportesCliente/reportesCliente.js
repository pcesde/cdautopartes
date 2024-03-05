$(document).ready(function(){
    $('#tablaReporteClienteLoad').load('reportesCliente/tablaReporteCliente.php');
});
function agregarNuevoReporte(){
    $.ajax({
        type: "POST",
        data:$('#frmNuevoReporte').serialize(),
        url: "../procesos/reportesCliente/agregarNuevoReporte.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaReporteClienteLoad').load('reportesCliente/tablaReporteCliente.php');
                $('#frmNuevoReporte')[0].reset();
                swal.fire(":D","Agregado con exito!","success");
            }else{
                swal.fire(":(","Error al agregar!" + respuesta,"error");
            }
        }
    });

    return false;
}
function eliminarReporteCliente(idReporte){
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