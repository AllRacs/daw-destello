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
<main>
    <h1>
        Resultado de búsqueda:
    </h1>
    <?php
    /*PONERLO EN FORMA DE ETIQUEDAS, NO EN ENUMERACION*/

    // if(!empty($_GET['busqueda_top'])){
    //     echo '<p style="padding-left:6em">'.$_GET["busqueda_top"].'</p>';
    // } else if(!empty($_GET)){
    //     foreach ($_GET as $key => $value) {
    //         if(!empty($value)){
    //             echo '<li>'.$key.': '.$value.'</li>';
    //
    //             // $sentencia = 'SELECT titulo, Descripcion, Fecha, Pais, Fichero, Alternativo, Album, paises.NomPais
    //             // FROM Fotos, Paises
    //             // WHERE paises.NomPais LIKE ("'.$_GET["Country"].'") AND titulo LIKE ("'.$_GET["Title"].'")
    //             // OR titulo LIKE ("'.$_GET["Title"].'")
    //             // OR paises.NomPais LIKE ("'.$_GET["Country"].'")';
    //             $sentencia = 'SELECT u.NomUsuario, f.Titulo, f.FRegistro, p.NomPais, f.Fichero, f.IdFoto FROM usuarios u JOIN albumes a JOIN fotos f JOIN paises p
    //             WHERE u.IdUsuario = a.Usuario AND a.IdAlbum = f.Album AND f.Pais = p.IdPais';
    //
    //             if(true){
    //                 //concatenacion de condicionales
    //             }
    //
    //             $sentencia .='ORDER BY f.FRegistro DESC';
    //
    //             if(!($buscar = $mysqli->query($sentencia))) {
    //                 echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
    //                 echo '</p>';
    //                 exit;
    //             }
    //         }
    //
    //
    //         foreach ( $_GET["busqueda_avanzada"] as $busqueda_avanzada ) {
    //             if(!empty($busqueda_avanzada)){
    //                 echo $busqueda_avanzada;
    //
    //             }
    //             if(!($busqueda_avanzada === end($_GET["busqueda_avanzada"]))){
    //                 echo ", ";
    //             }
    //         }
    //     }
    //
    // }

    if(!empty($_GET)){
        $sentencia = 'SELECT u.NomUsuario, f.Titulo, f.FRegistro, p.NomPais, f.Fichero, f.IdFoto FROM usuarios u JOIN albumes a JOIN fotos f JOIN paises p
        WHERE u.IdUsuario = a.Usuario AND a.IdAlbum = f.Album AND f.Pais = p.IdPais ';

        if(isset($_GET["busqueda_top"]) && !empty($_GET["busqueda_top"])){
            //concatenacion de condicionales
            echo '<p style="padding-left:6em">'.$_GET["busqueda_top"].'</p>';
            $sentencia .=' AND f.Titulo LIKE "'.$_GET["busqueda_top"].'" ';
        }

        $sentencia .=' ORDER BY f.FRegistro DESC';

        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }
    }
    echo '<div class="container_posting">';
    // Recorre el resultado y lo muestra en forma de tabla HTML
    while($fila = $resultado->fetch_object()) {
        echo <<<ddd
        <div class="p_box">
        <label class="title">$fila->Titulo</label>
        <span> - </span>
        <label class="ubicacion">$fila->NomPais</label>
        <br>
        <figure>
        <a href="detalle_foto.php?id=$fila->IdFoto">
        <img src="$fila->Fichero" alt="[foto_not_found]">
        </a>
        </figure>
        <span class="icon-heart-empty"></span>
        <span class="icon-comment-empty"></span>
        <label>$fila->NomUsuario</label>
        <time datetime="2018-10-01">$fila->FRegistro</time>
        </div>
ddd;
    }
    echo '</div>';
    ?>

</main>
<?php
// Libera la memoria ocupada por el resultado
// Cierra la conexión
$mysqli->close();
require_once("include/fin.inc");
?>
