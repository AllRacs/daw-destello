<?php
include("sesionstart.php");
include("filtrado.php");
include("include/fichero.php");
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
<?php include 'CSS/main_mi_perfil.css';
include 'CSS/main_configuracion.css'?>
</style>
<?php

if(isset($_SESSION["user"])){/*Si has iniciado sesion puedes ver esto*/
    ?>
    <main>
        <h3>Mensaje</h3>
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
                <label><button onclick="location.href='baja_usuario_resumen.php'" type="button">Darme de Baja</button></label>
END;
                ?>
            </div>

            <?php
            $clave= $_POST['input_current_pass'];

            function password(){
              $clave= $_POST['input_current_pass'];
              $pass = false;
              if($clave === $_SESSION['pass']){
                $pass = true;
              }
              return $pass;
            }

            if(filtrado()==true && password()==true){
            echo'<div id="container_posting_perfil">
                <p>Cambios en los datos guardados.</p>
            </div>';
            $name = mysqli_real_escape_string($mysqli, $_POST['input_name']);
            $email = mysqli_real_escape_string($mysqli,  $_POST['input_email']);
            $password = mysqli_real_escape_string($mysqli, $_POST['input_pass_modify']);
            $fnac = mysqli_real_escape_string($mysqli,  $_POST['input_calendar']);
            $ciudad = mysqli_real_escape_string($mysqli, $_POST['input_city']);
            $pais = mysqli_real_escape_string($mysqli, $_POST['input_country']);

            $currentemail = $_SESSION["user"];
            $sentencia = "UPDATE usuarios SET
            NomUsuario = '$name',
            Email= '$email',
            Clave= '$password',
            FNacimiento= '$fnac',
            Ciudad= '$ciudad',
            Pais= '$pais'";
            // if(isset($_POST["register"])){
            //     print "foto esta en el post";
            // }
            if (empty($_FILE['register'])) {
                $s = 'SELECT Foto FROM usuarios WHERE Email = "'.$currentemail.'"';
                if(!($r = $mysqli->query($s))) {
                    echo "<p>Error al ejecutar la sentencia <b>$s</b>: " . $mysqli->error;
                    echo '</p>';
                    exit;
                }
                $fila = $r->fetch_object();
                unlink('img/'.$fila->Foto);
                $foto = comprobarficheroperfil();
                $sentencia.=', Foto = "'.$foto.'"';
            }

            $sentencia.=" WHERE usuarios.email = '$currentemail'";
            if(!($mysqli->query($sentencia))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                echo '</p>';
                exit;
            }
            $_SESSION["user"] = $email;
            $_SESSION["pass"] = $password;

          }else{
            if(password()==false){
              echo'<div id="container_posting_perfil">
                  <p>Vaya! Tu contraseña no es correcta :(</p>
              </div>';
            }else{
            echo'<div id="container_posting_perfil">
                <p>Algo ha salido mal. Lo siento :(</p>
            </div>';
            }
          }
            ?>
        </section>
    </main>
    <?php
$mysqli->close();
$r->close();
}else{/*Si no has iniciado sesion se te recomiendo iniciarla*/
    echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
}
require_once("include/fin.inc");
?>
