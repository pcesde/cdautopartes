<?php 
include "header.php";

if (isset($_SESSION['usuario']) && ($_SESSION['usuario']['rol'] == 2)) {
            $servername = "localhost";
        $username = "root";  // Cambia esto si tu usuario de MySQL es diferente
        $password = "";      // Cambia esto si tu contraseña de MySQL es diferente
        $dbname = "mesadeayuda";

        $conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos de la base de datos
$sqlTotal = "SELECT COUNT(*) AS total FROM t_reportes";
$resultTotal = $conn->query($sqlTotal);
$rowTotal = $resultTotal->fetch_assoc();
$totalTickets = $rowTotal['total'];

$sqlAbierto = "SELECT COUNT(*) AS abierto FROM t_reportes WHERE estatus = 1";
$resultAbierto = $conn->query($sqlAbierto);
$rowAbierto = $resultAbierto->fetch_assoc();
$ticketsAbiertos = $rowAbierto['abierto'];

$sqlCerrado = "SELECT COUNT(*) AS cerrado FROM t_reportes WHERE estatus = 0";
$resultCerrado = $conn->query($sqlCerrado);
$rowCerrado = $resultCerrado->fetch_assoc();
$ticketsCerrados = $rowCerrado['cerrado'];

$sqlEnProceso = "SELECT COUNT(*) AS proceso FROM t_reportes WHERE estatus = 2";
$resultEnProceso = $conn->query($sqlEnProceso);
$rowEnProceso = $resultEnProceso->fetch_assoc();
$EnProceso = $rowEnProceso['proceso'];

$sqlNuevo = "SELECT COUNT(*) AS nuevo FROM t_reportes WHERE estatus = 3";
$resultNuevo = $conn->query($sqlNuevo);
$rowNuevo = $resultNuevo->fetch_assoc();
$nuevoTicket = $rowNuevo['nuevo'];

$conn->close();
?>
<!-- Page Content -->

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="row">
                <section class="card">
                    <header class="card-header">
                    <?php date_default_timezone_set('America/Asuncion');?>
                         Grafico Estadístico 
                        <p>Fecha y hora: <?php echo date('Y-m-d H:i'); ?></p>  
                    </header>
                            <div class="card-block">
                            <div id="chartContainer" style="height: 300px;">
                                      <canvas id="myChart"></canvas>
                                       
                                  </div>
                            </div>
                 </section>
            </div>
  
        </div>
    </div> 
</div>  
               
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/shim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');

var datosDesdeBackend = {
    labels: ['Total Ticket','Nuevo Ticket', 'Ticket Abierto', 'Ticket Cerrado', 'En Proceso'],
    datasets: [{
       label: 'Actualmente existe <?php echo $nuevoTicket;?> ticket sin abrir',
        data: [<?php echo $totalTickets; ?>, <?php echo $nuevoTicket;?>, <?php echo $ticketsAbiertos; ?>, <?php echo $ticketsCerrados; ?>, <?php echo $EnProceso; ?>],
        backgroundColor: [
            '#FF5733',
            '#9BE357',
            '#176653', // Azul
            '#FF6384',
            '#4BC0C0'  // Turquesa
        ],
        borderColor: [
            '#FF5733',
            '#9BE357',
            '#176653', // Azul
            '#FF6384',
            '#4BC0C0'  // Turquesa
        ],
        borderWidth: 3
    }]
};
var opcionesDelGrafico = {
    responsive: true,
    maintainAspectRatio: false,
    aspectRatio: 2,
    scales: {
        y: {
            beginAtZero: true,
        }
    },
    plugins: {
        legend: {
            labels: {
                fontColor: 'red' // Cambia 'red' por el color que desees
            }
        }
    }
};
var myChart = new Chart(ctx, {
    type: 'bar',
    data: datosDesdeBackend,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        aspectRatio: 2,
        scales: {
            y: {
                beginAtZero: true,
                
            }
        }
    }
});
</script>




<?php
include "footer.php";
} elseif (isset( $_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {
    include "../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
?>
<!-- Page Content -->
<div class="container d-flex justify-content-center align-items-center">
    <div class="card border-0 shadow my-5">
    <div class="card-body p-5 text-center">
    <h1 class="fw-bold display-4">Bienvenidos al Sistema de Ticket</h1>
    <p class="fw-light fs-5">Si tiene alguna incidencia, puede generar su ticket desde aquí.</p>
    <p class="lead">
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalCrearReporte">
            Crear Ticket
        </button>
    </p>
</div>

    </div>
</div>

<?php 
include "reportesCliente/modalCrearReporte.php";
include "footer.php";
?>
<script src="../public/js/reportesCliente/reportesCliente.js"></script>
<?php
}else{
    header("location:../index.html");
}
?>
