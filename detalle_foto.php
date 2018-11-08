<?php
    include("include/cabecera.inc");
    include("include/header.inc");
    include("include/nav.inc");
?>
<style>
    <?php include 'CSS/main_indexANDdetalle_foto.css';?>
</style>
<<<<<<< HEAD
<?php

if($_SESSION["login"]){/*Si has iniciado sesion puedes ver esto*/
?>
<!--Muestra toda la información sobre una foto seleccionada en la página anterior (foto, título, fecha, país, álbum de fotos y usuario al que pertenece)-->

    <main class="main_detalle_foto">
        <div class="p_box">
          <label class="title"><?php echo htmlspecialchars($_GET['titulo']);?></label>
          <span> - </span>
           <label class="ubicacion"><?php echo htmlspecialchars($_GET['pais']);?></label>
           <span> - </span>
           <label for="">Álbum fotos del bosque prohibido</label>
           <br>
           <figure>
               <a href="">
                  <img src="<?php echo htmlspecialchars($_GET['img']);?>" alt="[foto_not_found]">
              </a>
            </figure>
           <span class="icon-heart-empty"></span>
           <span class="icon-comment-empty"></span>
           <label><?php echo htmlspecialchars($_GET['usuario']);?></label>
           <time datetime="2018-10-01"><?php echo htmlspecialchars($_GET['fecha']);?></time>
           </div>
    </main>
<!--
=======
<!--Muestra toda la información sobre una foto seleccionada en la página anterior (foto, título, fecha, país, álbum de fotos y usuario al que pertenece)-->
>>>>>>> e36228d17ee040223e5bf0cb42a221e882960639
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
<<<<<<< HEAD
-->
<?php
}else{/*Si no has iniciado sesion se te recomiendo iniciarla*/
    echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
}


=======
<?php
>>>>>>> e36228d17ee040223e5bf0cb42a221e882960639
    require_once("include/fin.inc");
?>
