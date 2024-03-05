<?php 
class Conexion {
    private $conexion;

    public function conectar() {
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $db = "mesadeayuda";

        $this->conexion = mysqli_connect($servidor, $usuario, $password, $db);
        return $this->conexion;
    }

    public function desconectar() {
        if ($this->conexion) {
            mysqli_close($this->conexion);
        }
    }
}
?>
