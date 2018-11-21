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
?>
<style>
    <?php include 'CSS/main_mi_perfil.css';?>
</style>
<?php

if(isset($_SESSION["user"])){/*Si has iniciado sesion puedes ver esto*/
?>
<main>
    <h3>Configuracion</h3>
    <section>
        <?php
        

         ?>
    </section>
 </main>
 <?php
 }else{/*Si no has iniciado sesion se te recomiendo iniciarla*/
     echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
 }


     require_once("include/fin.inc");
 ?>
