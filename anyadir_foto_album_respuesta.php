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
    // echo 'Página respuesta álbum, realizar la inserción en la DB aquí';
    //Title=&Description=&Date=&Country=&photo=&Alternative=&Album=
    if(isset($_GET["Title"]) && isset($_GET["Description"]) && isset($_GET["Date"]) && isset($_GET["Country"]) && isset($_GET["photo"]) && isset($_GET["Alternative"]) && isset($_GET["Album"])){
        echo '<p>Haciendo inserción</p>';
        if (!empty($_GET["Title"])) {
            $titulo = $_GET["Title"];
        } else {
            $titulo = 'NULL';
        }
        if (!empty($_GET["Description"])) {
            $desc = $_GET["Description"];
        } else {
            $desc = 'NULL';
        }
        if (!empty($_GET["Date"])) {
            $date = $_GET["Date"];
        } else {
            $date = 'NULL';
        }
        if (!empty($_GET["Country"])) {
            $country = $_GET["Country"];
        } else {
            $country = 'NULL';
        }
        if (!empty($_GET["photo"])) {
            $photo = $_GET["photo"];
        } else {
            $photo = 'NULL';
        }
        if (!empty($_GET["Alternative"])) {
            $alter = $_GET["Alternative"];
        } else {
            $alter = 'NULL';
        }
        if (!empty($_GET["Album"])) {
            $album = $_GET["Album"];
        } else {
            $album = 'NULL';
        }
        $registro = date("Y/m/d h:i");
        //INSERT INTO fotos (IdFoto, Titulo, Descripcion, Fecha, Pais, Album, Fichero, Alternativo, FRegistro)
        //VALUES (NULL, Medusa2, Foto de medusa en el mar, 2018-11-13, 2, 1, img/medusa.jpg, medusita, 2018-12-04 00:00:00)
        $sentencia = "INSERT INTO fotos (IdFoto, Titulo, Descripcion, Fecha, Pais, Album, Fichero, Alternativo, FRegistro)
        VALUES (NULL, '$titulo', '$desc', '$date', '$country', '$album', img/'$photo', $alter, $registro)";
        echo "$date hola";
        echo $sentencia;
        // Ejecuta la sentencia SQL
        if(!mysqli_query($mysqli, $sentencia)){
            die("Error: no se pudo realizar la inserción");
        } else {
            echo "se ha hecho la insercion";
        }

        // Cierra la conexión con la base de datos
        mysqli_close($mysqli);
    }
    echo '<p style="padding-left:8em;padding-top:1em">La foto se ha añadido correctamente.</p>';
    echo '<a id="volver_al_perfil" href="mi_perfil.php">Volver al perfil</a>';
} else { /*Si no has iniciado sesion se te recomiendo iniciarla*/
    echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
}
echo '</main>';
require_once("include/fin.inc");
?>
