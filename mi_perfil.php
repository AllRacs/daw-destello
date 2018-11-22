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
    <h3>Mi perfil</h3>
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
                $sentencia = 'SELECT * FROM usuarios where Email like "'.$_SESSION["user"].'"';
                if(!($resultado = $mysqli->query($sentencia))) {
                    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                    echo '</p>';
                    exit;
                }

                $fila = $resultado->fetch_object();
                echo '<p>Nombre: '.$fila->NomUsuario.'</p>';
                //Render image
                /*DATA IMAGE MIRAR PH1 DE 16-17*/
                $foto = imagejpeg($fila->Foto);
                echo '<p>Email: '.$fila->Email.'</p>';
                echo '<p>Nacimiento: '.$fila->FNacimiento.'</p>';
                echo '<p>Ciudad: '.$fila->Ciudad.'</p>';

                $sentencia = 'SELECT NomPais FROM usuarios u, paises p where p.IdPais = u.Pais and u.Email like "'.$_SESSION["user"].'"';
                if(!($resultado = $mysqli->query($sentencia))) {
                    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                    echo '</p>';
                    exit;
                }

                $fila = $resultado->fetch_object();
                echo '<p>Pais: '.$fila->NomPais.'</p>';
            } else {
                echo '<p>Se muestran todas las fotos del user...</p>';
            }
            ?>
        </div>
    </section>
 </main>
 <?php
 }else{/*Si no has iniciado sesion se te recomiendo iniciarla*/
     echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
 }
     require_once("include/fin.inc");
 ?>
