<?php
include("sesionstart.php");
?>
<?php
include("include/cabecera.inc");
if(isset($_SESSION["user"])){
    include("include/header_logged.inc");
} else {
    include("include/header.inc");
}
include("include/nav.inc");
?>
<style>
<?php include 'CSS/main_formulario_busqueda.css';?>
</style>

<main>
<?php

if(isset($_SESSION["user"])){/*Si has iniciado sesion puedes ver esto*/
    // echo 'Página respuesta álbum, realizar la inserción en la DB aquí';
    //Title=&Description=&Date=&Country=&photo=&Alternative=&Album=
    // if(isset($_GET["estilo"])){
    //     //UPDATE `usuarios` SET `Estilo` = '3' WHERE `usuarios`.`IdUsuario` = 1;
    //     $sentencia = 'UPDATE usuarios SET Estilo = '.$_GET["estilo"].' WHERE usuarios.Email LIKE "'.$_SESSION["user"].'"';
    //     echo $sentencia;
    //     if(!($mysqli->query($sentencia))) {
    //         echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
    //         echo '</p>';
    //         exit;
    //     }
    //     // if ($mysqli->query($sentencia) === TRUE) {
    //     //     echo "New record created successfully";
    //     // } else {
    //     //     echo "Error: " . $sentencia . "<br>" . $mysqli->error;
    //     // }
    //
    //     // Cierra la conexión con la base de datos
    //     $mysqli->close();
    // }
    echo '<p style="padding-left:8em;padding-top:1em">El estilo se ha cambiado correctamente.</p>';
    echo '<a id="volver_al_perfil" href="mi_perfil.php">Volver al perfil</a>';
} else { /*Si no has iniciado sesion se te recomiendo iniciarla*/
    echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
}
echo '</main>';
require_once("include/fin.inc");
?>
