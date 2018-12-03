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
<?php include 'CSS/main_album_form_solicitud.css';?>
</style>
<?php

if(isset($_SESSION["user"])){/*Si has iniciado sesion puedes ver esto*/
    $titulo = htmlspecialchars($_GET['titulo']);
    $sentencia = 'SELECT f.Titulo as titulofoto, a.Descripcion, u.NomUsuario, f.IdFoto, f.Fecha, a.Titulo as tituloalbum, p.NomPais, f.Fichero, f.Alternativo, a.IdAlbum
    FROM fotos f, albumes a, paises p, usuarios u
    WHERE u.IdUsuario = a.Usuario AND a.IdAlbum = f.Album AND f.Pais = p.IdPais AND (a.Titulo  LIKE "'.$titulo.'") ORDER BY f.fecha ASC';
    if(!($misalbumes = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }else{
        //Pruebas
    }
    $fecha = 'SELECT max(FRegistro) as fechamin, min(FRegistro) as fechamax FROM fotos, albumes WHERE fotos.album = albumes.IdAlbum';
    $fechas = $mysqli->query($fecha);
    $fila1 = $fechas->fetch_assoc();
    echo '<main class="main_album"><table><tr>';
    echo '<p>Titulo: '.$titulo.'</p>';
    echo '<th>Foto</th><th>Nombre</th><th>Fecha</th><th>Pais</th>';
    echo '</tr>';
    // Recorre el resultado y lo muestra en forma de tabla HTML
    $cont = 0;
    while($fila = $misalbumes->fetch_assoc()) {
        if($cont < 1){
            echo '<p>Descripcion: '.$fila["Descripcion"].'</p>';
            echo '<p>El Intervalo de fechas va desde: '.$fila1['fechamax'].' hasta '.$fila1['fechamin'].'</p>';
            $cont++;
        }
        echo '<tr>';
        echo '<td>
        <figure>
        <a href="detalle_foto.php?id='.$fila["IdFoto"].'">
        <img src="'.$fila["Fichero"].'" alt="[foto_not_found]">
        </a>
        </figure>
        </td>';
        echo '<td>'.$fila['tituloalbum'].'</td>';
        echo '<td>'.$fila['Fecha'].'</td>';
        echo '<td>'.$fila['NomPais'].'</td>';
        echo '</tr>';
    }
    echo '</table></main>';

    ?>



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
