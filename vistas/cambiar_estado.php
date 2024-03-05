<?php
// cambiar_estado.php

// Simula cambiar el estado en la base de datos
$estatus = 1;

// Devuelve un JSON con el nuevo estado
echo json_encode(['estatus' => $estatus]);
?>
