<?php
include("sesionstart.php");
if(isset($_GET["estilo"])){
    //UPDATE `usuarios` SET `Estilo` = '3' WHERE `usuarios`.`IdUsuario` = 1;
    $sentencia = 'UPDATE usuarios SET Estilo = '.$_GET["estilo"].' WHERE usuarios.Email LIKE "'.$_SESSION["user"].'"';
    echo $sentencia;
    if(!($mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }
    // if ($mysqli->query($sentencia) === TRUE) {
    //     echo "New record created successfully";
    // } else {
    //     echo "Error: " . $sentencia . "<br>" . $mysqli->error;
    // }

    // Cierra la conexión con la base de datos
    $mysqli->close();
}

$extra = 'guardar_estilo_respuesta.php';
/*header("Location: $host$uri/$extra?user=$user&pass=$pass");*/
header("Location: $extra");
 ?>
