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
    echo '<p>Resumen de los datos del usuario</p>';
    echo '<a id="volver_al_perfil" href="index.php">Borrar cuenta</a>';
} else { /*Si no has iniciado sesion se te recomiendo iniciarla*/
    echo '¡Vaya! parece que no estás loggeado <a href="alta_usuario_borrar.php">Borrar cuenta</a>';
}
echo '</main>';
require_once("include/fin.inc");
?>
