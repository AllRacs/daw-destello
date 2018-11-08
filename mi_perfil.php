<?php
include("sesionstart.php");
?>
<?php
    include("include/cabecera.inc");
    include("include/header_logged.inc");
?>
<style>
    <?php include 'CSS/main_mi_perfil.css';?>
</style>
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
                    <label><button onclick="location.href='mi_perfil.php?datos&user=$user&pass=$pass'" type="button">Mis Datos</button></label>
                    <label><button onclick="location.href=#" type="button">Mis Álbumes</button></label>
                    <label><button onclick="location.href='nuevo_album.php'" type="button">Crear Album</button></label>
                    <label><button onclick="location.href='album_form_solicitud.php'" type="button">Solicitar Impresión de Album</button></label>
                    <label><button onclick="location.href=baja_usuario.php" type="button">Darme de Baja</button></label>
END;
            ?>
        </div>
        <div id="container_posting_perfil">
            <?php
            if(isset($_GET["datos"])){
                echo '<p>User: '.$_GET["user"].'</p><p>Pass: '.$_GET["pass"].'</p>';
            } else {
                echo '<p>Se muestran todas las fotos del user...</p>';
            }
            ?>
        </div>
    </section>
 </main>
 <?php
     require_once("include/fin.inc");
 ?>
