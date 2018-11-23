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
<?php

if(isset($_SESSION["user"])){/*Si has iniciado sesion puedes ver esto*/


  $sentencia = 'SELECT NomPais FROM Paises';
  if(!($pais = $mysqli->query($sentencia))) {
    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
    echo '</p>';
    exit;
  }else{
    /*echo $sentencia;
    $paises = $resultado->fetch_assoc();
    echo $paises["NomPais"];*/
  }
    $sentencia = 'SELECT Titulo FROM Albumes, Usuarios WHERE usuarios.IdUsuario = albumes.usuario AND usuarios.Email LIKE "'.$_SESSION["user"].'"';
    if(!($album = $mysqli->query($sentencia))) {
      echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
      echo '</p>';
      exit;
    }else{
      /*echo $sentencia;
      $paises = $resultado->fetch_assoc();
      echo $paises["NomPais"];*/
    }
?>

<main>
    <h1>Add Photo to Album</h1>
    <section>
        <form id="form_photo" action="resultado_busqueda.php" method="GET">
            <!--Advance Search Form-->
            <label>
                <span>Title:</span>
                <input type="text" name="Title" id="input_title" value="" placeholder="Title" required>
            </label>
            <br>
            <label>
                <span>Description:</span>
                <input type="text" name="Description" id="input_description" value="" placeholder="Description">
            </label>
            <br>
            <label>
                <span>Date:</span>
                <input type="date" name="Date" id="input_date" value="" required>
            </label>
            <br>
            <label>
                <span>Country:</span>
                <select name="Country" id="input_country" required>
                  <?php while($fila = $pais->fetch_assoc()){
                    echo'
                    <option value="'. $fila['NomPais'] .'">'. $fila['NomPais'] .'</option>
                    ';
                  }
                  ?>
                </select>
            </label>
            <br>
            <label>
                <span>Photo:</span>
                <input id="photo" type="file" name="photo" value="Upload photo">
            </label>
            <label>
                <span>Alternative text:</span>
                <input type="text" name="Alternative" id="input_alternative" value="" placeholder="Alternative Text">
            </label>
            <label>
                <span>Album:</span>
                <select name="Album" id="input_album" required>
                  <?php while($fila = $album->fetch_assoc()){
                    echo'
                    <option value="'. $fila['Titulo'] .'">'. $fila['Titulo'] .'</option>
                    ';
                  }
                  ?>
                </select>
            </label>
            <br><br>
            <button type="submit" id="Upload_button">Upload</button>
            <!--End Form-->
        </form>
    </section>
</main>
<?php
// Libera la memoria ocupada por el resultado
$pais->close();
$album->close();
// Cierra la conexión
$mysqli->close();
}else{/*Si no has iniciado sesion se te recomiendo iniciarla*/
    echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
}

    require_once("include/fin.inc");
?>
