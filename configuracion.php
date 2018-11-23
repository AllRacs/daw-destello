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
?>
<style>
    <?php include 'CSS/main_mi_perfil.css';?>
</style>
<?php

if(isset($_SESSION["user"])){/*Si has iniciado sesion puedes ver esto*/
?>
<main>
    <h3>Configuracion</h3>
    <section>
        <div id="navegacion_perfil">
            <?php
            if(empty($_GET["user"]) && empty($_GET["pass"])){
                $user = "";
                $pass = "";
            } else {
                $user = $_GET["user"];
                $pass = $_GET["pass"];
            }
                echo <<<END
                    <label><button onclick="location.href='mi_perfil.php'" type="button">Mis Datos</button></label>
                    <label><button onclick="location.href='configuracion.php'" type="button">Configuracion</button></label>
                    <label><button onclick="location.href='mis_albumes.php'" type="button">Mis Álbumes</button></label>
                    <label><button onclick="location.href='nuevo_album.php'" type="button">Crear Album</button></label>
                    <label><button onclick="location.href='album_form_solicitud.php'" type="button">Solicitar Impresión de Album</button></label>
                    <label><button onclick="location.href='anyadir_foto_album.php'" type="button">Añadir Foto a Album</button></label>
                    <label><button onclick="location.href='baja_usuario.php'" type="button">Darme de Baja</button></label>
END;
            ?>
        </div>
        <div id="container_posting_perfil">
            <?php
            if(isset($_SESSION["user"])){
                // echo '<p>User: '.$_SESSION["user"].'</p>';
                echo '<p>Configuracion, elige el estilo de página que deseas usar:</p>';
                //consusta a bd
                $sentencia = 'SELECT * FROM Estilos';
                if(!($resultado = $mysqli->query($sentencia))) {
                  echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                  echo '</p>';
                  exit;
                }
                //select > option para cada css
                echo "<select>";
                while($fila = $resultado->fetch_object()) {
                  echo "<option>$fila->Fichero</option>";
                }
                echo "</select>";
            }
            ?>
        </div>
    </section>
 </main>
 <?php
 // Libera la memoria ocupada por el resultado
 $sentencia->close();
 // Cierra la conexión
 $mysqli->close();
 }else{/*Si no has iniciado sesion se te recomiendo iniciarla*/
     echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
 }
     require_once("include/fin.inc");
 ?>
