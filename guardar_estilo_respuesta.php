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
    echo '<p style="padding-left:8em;padding-top:1em">El estilo se ha cambiado correctamente a '.$_SESSION["estilonombre"].'.</p>';
    echo '<a id="volver_al_perfil" href="mi_perfil.php">Volver al perfil</a>';
} else { /*Si no has iniciado sesion se te recomiendo iniciarla*/
    echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
}
echo '</main>';
require_once("include/fin.inc");
?>
