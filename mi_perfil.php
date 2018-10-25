<?php
    include("include/cabecera.inc");
    include("include/header.inc");
    include("include/nav.inc");
?>
<style>
    <?php include 'CSS/main_mi_perfil.css';?>
</style>
<main>
    <h3>Mi perfil</h3>
    <div id="navegacion_perfil">
        <label><button onclick="location.href=#" type="button">Mis Datos</button></label>
        <label><button onclick="location.href=#" type="button">Mis Álbumes</button></label>
        <label><button onclick="location.href='nuevo_album.php'" type="button">Crear Album</button></label>
        <label><button onclick="location.href='album_form_solicitud.php'" type="button">Solicitar Impresión de Album</button></label>
        <label><button onclick="location.href=baja_usuario.php" type="button">Darme de Baja</button></label>
    </div>
    <div id="container_posting_perfil">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero labore maxime tenetur nesciunt pariatur nihil nemo molestiae ab ut, atque ea, ex non beatae, quaerat numquam doloribus velit blanditiis hic corporis fugiat incidunt saepe unde corrupti. Quo delectus nam beatae nulla quia non accusantium culpa dolorum assumenda. Tempore, veniam labore!</p>
    </div>
 </main>
 <?php
     require_once("include/fin.inc");
 ?>
