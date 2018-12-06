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
<?php include 'CSS/main_mi_perfil.css';
include 'CSS/main_configuracion.css'?>
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
                echo '<p>Configuracion, elige el estilo de página que deseas usar:</p>';
                //consusta a bd
                $sentencia = 'SELECT * FROM Estilos';
                if(!($resultado = $mysqli->query($sentencia))) {
                    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                    echo '</p>';
                    exit;
                }
                echo '<form id="form_estilo" action="guardar_estilo.php" method="GET">';
                //select > option para cada css
                echo '<select name="estilo" id="select_estilo" required>';
                while($fila = $resultado->fetch_object()) {
                    echo '<option ';
                    if($_SESSION["estiloid"] == $fila->IdEstilo) {
                         echo 'selected';
                    }
                    echo ' value="'.$fila->IdEstilo.'" >'.$fila->Fichero.'</option>';
                }
                echo "</select><br>";
                echo '<button type="submit" name="input_submit" value="Guardar">Guardar estilo</button>';
                echo '</form>';


                echo '<p>Detalles de usuario:</p>';
                $sentencia2 = 'SELECT NomPais FROM Paises';
                if(!($pais = $mysqli->query($sentencia2))) {
                    echo "<p>Error al ejecutar la sentencia <b>$sentencia2</b>: " . $mysqli->error;
                    echo '</p>';
                    exit;
                }

                $sentencia3 = 'SELECT * FROM usuarios u where u.Email like "'.$_SESSION["user"].'"';
                if(!($usuu = $mysqli->query($sentencia3))) {
                    echo '<p>Error al ejecutar la sentencia <b>'.$sentencia3.'</b>: ' . $mysqli->error;
                    echo '</p>';
                    exit;
                }
                $usu = $usuu->fetch_object();
                echo <<<ggg

                <form id="form_registro" action="guardar_cambios.php" method="POST">
                <!--Register_Form-->
                <label for="user_img">
                <span class="hiddeofscreen">Profile Picture</span>
                <!--<span class="icon-file-image" aria-hidden="true"></span> User Picture REGISTER -->
                <img src="$usu->Foto" alt="">
                </label>
                <input id="user_img" type="file" name="register" value="Upload image">
                <br>
                <label for="input_name">
                <span class="hiddeofscreen">Usuario:</span>
                <span class="icon-user-circle-o" aria-hidden="true"></span>
                </label><!-- User/email REGISTER -->
                <input id="input_name" type="text" name="input_name" value="$usu->NomUsuario" placeholder="User Name" minlength="3" maxlength="15" title="Numeros y Letras Inglesas. Longitud entre 3 y 15 caracteres">
                <br>
                <label for="input_pass">
                <span class="hiddeofscreen">Password:</span>
                <span class="icon-key" aria-hidden="true"></span><!-- Password REGISTER -->
                </label>
                <input id="input_pass" type="text" name="input_pass_modify" value="$usu->Clave" placeholder="Password" minlength="6" maxlength="15" title="Numeros y Letras Inglesas. Longitud entre 3 y 15 caracteres. Obligatorio una mayuscula, una minuscula y un numero" required>
                <br>
                <label for="input_email">
                <span class="hiddeofscreen">Email:</span>
                <span class="icon-at" aria-hidden="true"></span><!-- E-mail REGISTER -->
                </label>
                <input id="input_email" type="email" name="input_email" value="$usu->Email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title>
                <br>
                <label for="input_calendar">
                <span class="hiddeofscreen">Birthday:</span>
                <span class="icon-calendar" aria-hidden="true"></span><!-- Birthday REGISTER -->
                </label>
                <input id="input_calendar" type="date" name="input_calendar" value="$usu->FNacimiento" placeholder="Birthday">
                <br>
                <label for="input_city">
                <span class="icon-home-outline" aria-hidden="true"></span><!-- Location REGISTER -->
                </label>
                <input id="input_city" type="text" name="input_city" value="$usu->Ciudad" placeholder="City">
                <br>
                <label for="input_country">
                <span>Country:</span>
                <select name="Country" id="input_country" required>
ggg;
                while($fila = $pais->fetch_assoc()){
                    echo'<option value="'. $fila['NomPais'] .'">'. $fila['NomPais'] .'</option>';
                }
                echo '</select>
                </label>
                <br>
                <!--Register_End-->
                <span>
                <button type="submit" name="input_submit" value="Guardar">Guardar</button>
                </span>
                </form>
                </div>
                </section>
                </main>';

                // Libera la memoria ocupada por el resultado
                $resultado->close();
                // Cierra la conexión
                $mysqli->close();
            }else{/*Si no has iniciado sesion se te recomiendo iniciarla*/
                echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
            }
            require_once("include/fin.inc");
            ?>
