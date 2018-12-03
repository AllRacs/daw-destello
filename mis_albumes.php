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
<?php include 'CSS/main_album_form_solicitud.css';?>
</style>
<?php

if(isset($_SESSION["user"])){/*Si has iniciado sesion puedes ver esto*/

    $sentencia = 'SELECT Titulo, Descripcion FROM Albumes, Usuarios WHERE albumes.usuario = usuarios.IdUsuario AND usuarios.email LIKE "'.$_SESSION["user"].'"';
    if(!($misalbumes = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }else{

    }
    echo '<table><tr>';
    echo '<th>Titulo</th><th>Descripcion</th>';
    echo '</tr>';
    // Recorre el resultado y lo muestra en forma de tabla HTML
    while($fila = $misalbumes->fetch_assoc()) {
        echo '<tr>';
        echo '<td><a href="album.php?titulo='. $fila['Titulo'] .'">' . $fila['Titulo'] . '</a></td>';
        echo '<td>' . $fila['Descripcion'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    
    $misalbumes->close();
    // Cierra la conexión
    $mysqli->close();
}else{/*Si no has iniciado sesion se te recomiendo iniciarla*/
    echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
}


require_once("include/fin.inc");
?>
