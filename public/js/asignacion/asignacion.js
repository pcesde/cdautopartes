$(document).ready(function(){
    $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php', function() {
        // Una vez que la tabla se ha cargado, inicializa DataTables y agrega los botones
        $('#tablaAsignacionDataTable').DataTable({
            dom: 'Bfrtip', // Para habilitar los botones y la barra de búsqueda
            buttons: [
                'excelHtml5',
                'pdfHtml5'
            ]
        });
    });
});

function asignarEquipo(){
    $.ajax({
        type: "POST",
        data:$('#frmAsignarEquipo').serialize(),
        url: "../procesos/asignacion/asignar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();

            if (respuesta == 1) {
                $('#frmAsignarEquipo')[0].reset();
                $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
                swal.fire(":D","Asignado con exito!","success");
            }else{
                swal.fire(":(","Error al asignar!" + respuesta,"error");
            }

        }
    });
    return false;
}

function eliminarAsignacion(idAsignacion){
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
                data:"idAsignacion=" + idAsignacion,
                url: "../procesos/asignacion/eliminarAsignacion.php",
                success:function(respuesta){
                    if (respuesta == 1) {
                        $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
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

