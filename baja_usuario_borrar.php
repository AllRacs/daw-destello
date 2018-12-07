<?php
include("sesionstart.php");
$passauth = $_POST["pass_auth"];
if($passauth == $_SESSION["pass"]){
    //DELETE FROM usuarios WHERE usuarios.IdUsuario = 3
    $sentencia = 'DELETE FROM usuarios WHERE usuarios.IdUsuario = "'.$_SESSION["id"].'"';
    echo $sentencia;
    if(!($mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }
    // Cierra la conexión con la base de datos
    $mysqli->close();
    $extra = 'cerrar_sesion.php';
    /*header("Location: $host$uri/$extra?user=$user&pass=$pass");*/
    header("Location: $extra");
} else {
    $mysqli->close();
    $extra = 'baja_usuario_resumen.php?err_auth';
    header("Location: $extra");
}

 ?>
