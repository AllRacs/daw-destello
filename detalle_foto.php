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
    <?php include 'CSS/main_indexANDdetalle_foto.css';?>
</style>
<?php

if(isset($_SESSION["user"])){/*Si has iniciado sesion puedes ver esto*/

  $titulo = htmlspecialchars($_GET['titulo']);
  $sentencia = 'SELECT fotos.Titulo, fotos.Descripcion, fotos.Fecha, paises.NomPais, fotos.Fichero, fotos.Alternativo, albumes.IdAlbum
  FROM Fotos, Albumes, Paises
  WHERE fotos.album = albumes.IdAlbum AND fotos.pais = paises.IdPais AND (fotos.Titulo  LIKE "'.$titulo.'") ORDER BY fotos.fecha ASC';
  if(!($misalbumes = $mysqli->query($sentencia))) {
    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
    echo '</p>';
    exit;
  }else{
    //Pruebas
  }

  // Recorre el resultado y lo muestra en forma de tabla HTML
  $fila = $misalbumes->fetch_assoc();

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
-->
<?php
// Libera la memoria ocupada por el resultado
$misalbumes->close();

// Cierra la conexión
$mysqli->close();
}else{/*Si no has iniciado sesion se te recomiendo iniciarla*/
    echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
}


    require_once("include/fin.inc");
?>
