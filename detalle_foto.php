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
    if(isset($_GET['id']) && !empty($_GET['id'])&& is_numeric($_GET['id'])){

        $id= mysqli_real_escape_string($mysqli, $_GET['id']);
        $sentencia = 'SELECT * FROM fotos, paises WHERE paises.IdPais = fotos.pais AND  IdFoto = '.$id.' ';
        if(!($misalbumes = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }else{
            //Pruebas
        }

        // Recorre el resultado y lo muestra en forma de tabla HTML
        $fila = $misalbumes->fetch_object();

        ?>

        <!--Muestra toda la información sobre una foto seleccionada en la página anterior (foto, título, fecha, país, álbum de fotos y usuario al que pertenece)-->
        <?php if(!empty($fila)){
            echo <<<DOC
            <main class="main_detalle_foto">
            <div class="p_box">
            <label class="title">$fila->Titulo</label>
            <span> - </span>
            <label class="ubicacion">$fila->NomPais </label>
            <span> - </span>
            <label for="">Álbum fotos del bosque prohibido</label>
            <br>
            <figure>
            <a href="">
            <img src="$fila->Fichero" alt="$fila->Alternativo">
            </a>
            </figure>
            <span class="icon-heart-empty"></span>
            <span class="icon-comment-empty"></span>
            <label></label>
            <time datetime="2018-10-01">$fila->Fecha</time>
            </div>
            </main>
DOC;

        }else{
            echo'<h1>No existe el archivo que buscas, lo siento :(</h1>';
        }
        /*
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
        */

        // Libera la memoria ocupada por el resultado
        $misalbumes->close();

        // Cierra la conexión
        $mysqli->close();

    }else{
        echo'<h1>No existe el archivo que buscas, lo siento :(</h1>';

    }
}else{/*Si no has iniciado sesion se te recomiendo iniciarla*/
    echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
}


require_once("include/fin.inc");
?>
