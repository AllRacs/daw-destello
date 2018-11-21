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
    img{
      width: 300px;
      height: 300px;
    }
</style>
<?php

if(isset($_SESSION["user"])){/*Si has iniciado sesion puedes ver esto*/
  $titulo = htmlspecialchars($_GET['titulo']);
  $sentencia = 'SELECT fotos.Titulo, fotos.Descripcion, fotos.Fecha, paises.NomPais, fotos.Fichero, fotos.Alternativo, albumes.IdAlbum
  FROM Fotos, Albumes, Paises
  WHERE fotos.album = albumes.IdAlbum AND fotos.pais = paises.IdPais AND (albumes.Titulo  LIKE "'.$titulo.'") ORDER BY fotos.fecha ASC';
  if(!($misalbumes = $mysqli->query($sentencia))) {
    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
    echo '</p>';
    exit;
  }else{
    //Pruebas
  }

  echo '<table><tr>';
  echo '<th>Foto</th><th>Nombre</th><th>Descripcion</th><th>Fecha</th><th>Pais</th>';
  echo '</tr>';
  // Recorre el resultado y lo muestra en forma de tabla HTML
  while($fila = $misalbumes->fetch_assoc()) {
    echo '<tr>';
    echo '<td><figure >
          <a href="detalle_foto.php?titulo=' . $fila['Titulo'] . '&img=img/' . $fila['Fichero'] . '&alt=' . $fila['Alternativo'] . '&fecha=' . $fila['Fecha'] . '&pais=' . $fila['NomPais'] . '&usuario=' . $_SESSION['user'] . '">
          <img src="img/' . $fila['Fichero'] . '" alt="' . $fila['Alternativo'] . '">
          </a>
          </td></figure>';
    echo '<td>' . $fila['Titulo'] . '</td>';
    echo '<td>' . $fila['Descripcion'] . '</td>';
    echo '<td>' . $fila['Fecha'] . '</td>';
    echo '<td>' . $fila['NomPais'] . '</td>';
    echo '</tr>';
  }
  echo '</table>';

?>



<?php
}else{/*Si no has iniciado sesion se te recomiendo iniciarla*/
    echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
}


    require_once("include/fin.inc");
?>
