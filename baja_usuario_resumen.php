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

    //SELECT u.Email AS User, a.Titulo, COUNT(f.Album) FROM fotos f JOIN albumes a JOIN usuarios u WHERE f.Album = a.IdAlbum AND a.Usuario = u.IdUsuario AND a.Usuario = 2 GROUP BY f.Album
    $albumes = 'SELECT a.Titulo AS Album, COUNT(f.Album) AS cont FROM fotos f JOIN albumes a JOIN usuarios u WHERE f.Album = a.IdAlbum AND a.Usuario = u.IdUsuario AND u.Email like "'.$_SESSION["user"].'" GROUP BY f.Album';
    if(!($resultado = $mysqli->query($albumes))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }

    echo '<p>Se van a borrar los siguientes datos, además de la información de su cuenta:</p>';
    echo '<ul>';
    while($fila = $resultado->fetch_object()) {
        echo '<li>'.$fila->Album.': '.$fila->cont.' fotos</li>';
    }
    echo '</ul>';
    //autentificación usuario
    if(isset($_GET["err_auth"])){
        echo '<p style="padding:1em 0em 0em 2em; color:red">Contraseña incorrecta</p><br>';
    }
    echo <<<HHH
        <form action="baja_usuario_borrar.php" method="post">
            <label for="pass_auth">Autentificación usuario: </label>
            <input type="password" id="pass_auth" name="pass_auth" required>
            <br>
            <button id="baja_borrar_usuario" type="submit" name="baja_borrar_usuario">Borrar cuenta</button>
        </form>
HHH;
    //-----------------------

    $resultado->close();
    $mysqli->close();
} else { /*Si no has iniciado sesion se te recomiendo iniciarla*/
    echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Crear cuenta</a>';
}
echo '</main>';
require_once("include/fin.inc");
?>
