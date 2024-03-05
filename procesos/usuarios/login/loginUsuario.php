<?php 
    session_start();
    $usuario = $_POST['login'];
    $password = sha1($_POST['password']);

    include "../../../clases/Usuarios.php";
    $Usuario = new Usuarios();

    echo $Usuario->loginUsuario($usuario, $password);
    ?>