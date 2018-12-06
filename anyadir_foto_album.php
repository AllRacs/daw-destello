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
    if(isset($_GET['input_title']) && isset($_GET['input_desc'])){
      echo 'Tu album ha sido creado y añadido a tus albumes, puedes agregar tu primera foto';

      $title=$_GET['input_title'];
      $desc=$_GET['input_desc'];
      $id=0;

      $sentencia = "INSERT INTO albumes (IdAlbum, Titulo, Descripcion, Usuario)
                    VALUES (NULL, '$title', '$desc', '$id')";
      echo '<br>' ;
      echo $sentencia;
      if(!($newalb = $mysqli->query($sentencia))) {
          echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
          echo '</p>';
          exit;
      }else{
          //Pruebas
      }


    }

    $sentencia = 'SELECT * FROM Paises';
    if(!($pais = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }else{
        /*echo $sentencia;
        $paises = $resultado->fetch_assoc();
        echo $paises["NomPais"];*/
    }
    $sentencia = 'SELECT * FROM Albumes a, Usuarios u WHERE u.IdUsuario = a.usuario AND u.Email = "'.$_SESSION["user"].'"';
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
        <h1>Añadir foto a álbum</h1>
        <section>
            <form id="form_photo" action="anyadir_foto_album_respuesta.php" method="GET">
                <!--Advance Search Form-->
                <label>
                    <span>Título:</span>
                    <input type="text" name="Title" id="input_title" value="" placeholder="Title" required>
                </label>
                <br>
                <label>
                    <span>Desc:</span>
                    <input type="text" name="Description" id="input_description" value="" placeholder="Description" required>
                </label>
                <br>
                <label>
                    <span>Fecha:</span>
                    <input type="date" name="Date" id="input_date" value="" required>
                </label>
                <br>
                <label>
                    <span>País:</span>
                    <select name="Country" id="input_country" required>
                        <?php while($fila = $pais->fetch_assoc()){
                            echo '<option value="'. $fila['IdPais'] .'">'. $fila['NomPais'] .'</option>';
                        }
                        ?>
                    </select>
                </label>
                <br>
                <label>
                    <span>Foto:</span>
                    <input id="photo" type="file" name="photo" value="Upload photo" required>
                </label>
                <label>
                    <span>Alter:</span>
                    <input type="text" name="Alternative" id="input_alternative" value="" placeholder="Alternative Text" required>
                </label>
                <label>
                    <span>Álbum:</span>
                    <select name="Album" id="input_album" required>
                        <?php while($fila = $album->fetch_assoc()){
                            echo '<option ';
                            if(isset($_GET["album"]) && $_GET["album"] == $fila['Titulo']){
                                echo 'selected';
                            }
                            echo ' value="'. $fila['IdAlbum'] .'">'. $fila['Titulo'] .'</option>';
                        }
                        ?>
                    </select>
                </label>
                <br><br>
                <button type="submit" id="Upload_button">Subir</button>
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
