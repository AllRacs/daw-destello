<?php
    include("include/cabecera.inc");
    include("include/header.inc");
    include("include/nav.inc");
?>
<style>
    <?php include 'CSS/main_indexANDdetalle_foto.css';?>
</style>
<!--Muestra toda la información sobre una foto seleccionada en la página anterior (foto, título, fecha, país, álbum de fotos y usuario al que pertenece)-->
<main class="main_detalle_foto">
    <div class="p_box">
        <label class="title">Búho</label>
        <span> - </span>
        <label class="ubicacion">Bosque</label>
        <span> - </span>
        <label for="">Álbum fotos del bosque prohibido</label>
        <br>
        <figure>
            <a href="detalle_foto.php">
                <img src="img/buho.jpg" alt="[foto_not_found]">
            </a>
        </figure>
        <span class="icon-heart-empty"></span>
        <span class="icon-comment-empty"></span>
        <label>Harry Potter</label>
        <time datetime="2018-10-01">01/10/2018</time>
    </div>
</main>
<?php
    require_once("include/fin.inc");
?>
