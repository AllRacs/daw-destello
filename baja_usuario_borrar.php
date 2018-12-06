<?php
include("sesionstart.php");
if(true){
    //
    $sentencia = '';
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

$extra = 'index.php';
/*header("Location: $host$uri/$extra?user=$user&pass=$pass");*/
header("Location: $extra");
 ?>
