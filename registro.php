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

$sentencia = 'SELECT NomPais, IdPais FROM Paises';
if(!($pais = $mysqli->query($sentencia))) {
    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
    echo '</p>';
    exit;
}else{
    /*echo $sentencia;
    $paises = $resultado->fetch_assoc();
    echo $paises["NomPais"];*/
}
?>
<style>
<?php include 'CSS/main_registro.css';?>
</style>
<main>
    <h1>Register</h1>

    <form id="form_registro" action="resultado_registro.php" method="POST">
        <!--Register_Form-->
        <label for="user_img">
            <span class="hiddeofscreen">Profile Picture</span>
            <span class="icon-file-image" aria-hidden="true"></span><!-- User Picture REGISTER -->
        </label>
        <input id="user_img" type="file" name="register" value="Upload image">
        <br>
        <label for="input_name">
            <span class="hiddeofscreen">Usuario:</span>
            <span class="icon-user-circle-o" aria-hidden="true"></span>
        </label><!-- User/email REGISTER -->
        <input id="input_name" type="text" name="input_name" value="" placeholder="User Name" minlength="3" maxlength="15" title="Numeros y Letras Inglesas. Longitud entre 3 y 15 caracteres">
        <br>
        <label for="input_pass">
            <span class="hiddeofscreen">Password:</span>
            <span class="icon-key" aria-hidden="true"></span><!-- Password REGISTER -->
        </label>
        <input id="input_pass" type="password" name="input_pass" value="" placeholder="Password" minlength="6" maxlength="15" title="Numeros y Letras Inglesas. Longitud entre 6 y 15 caracteres. Obligatorio una mayuscula, una minuscula y un numero" required>
        <br>
        <label for="input_pass_confirm">
            <span class="hiddeofscreen">Repeat password:</span>
            <span class="icon-key" aria-hidden="true"></span><!-- Password Confirm REGISTER pattern ="/^[A-Za-z0-9]+$"-->
        </label>
        <input id="input_pass_confirm" type="password" name="input_pass_confirm" value="" placeholder="Repeat Password" minlength="6" maxlength="15"  title="Numeros y Letras Inglesas. Longitud entre 3 y 15 caracteres. Obligatorio una mayuscula, una minuscula y un numero" required>
        <br>
        <label for="input_email">
            <span class="hiddeofscreen">Email:</span>
            <span class="icon-at" aria-hidden="true"></span><!-- E-mail REGISTER -->
        </label>
        <input id="input_email" type="email" name="input_email" value="" placeholder="E-mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title =""><!-- Comprobamos que el dom principal sea menor >2 y <4 con {2,4} -->
        <br>
        <label for="input_calendar">
            <span class="hiddeofscreen">Birthday:</span>
            <span class="icon-calendar" aria-hidden="true"></span><!-- Birthday REGISTER -->
        </label>
        <input id="input_calendar" type="date" name="input_calendar" value="" placeholder="Birthday">
        <br>
        <!-- <input id="input_sexh" type="radio" name="input_sex" value="1">
        <label for="input_sexh">Hombre</label>
        <input id="input_sexm" type="radio" name="input_sex" value="2">
        <label for="input_sexm">Mujer</label> -->
        <select class="" id="input_sex" name="input_sex">
            <option value="1">Hombre</option>
            <option value="2">Mujer</option>
        </select>
        <br>
        <label for="input_city">
            <span class="icon-home-outline" aria-hidden="true"></span><!-- Location REGISTER -->
        </label>
        <input id="input_city" type="text" name="input_city" value="" placeholder="City">
        <br>
        <label for="input_country">
            <span>Country:</span>
            <select name="input_country" id="input_country" required>
                    <option value="">Elige uno</option>
                <?php while($fila = $pais->fetch_assoc()){
                    echo'<option value="'. $fila['IdPais'] .'">'. $fila['NomPais'] .'</option>';
                }
                ?>
            </select>
        </label>
        <br>
        <!--Register_End-->
        <span>
            <label for="check_login" id="have_an_acc">Already have an account?</label>
            <button type="submit" name="input_submit" value="Registrar">Registrar</button>
        </span>
    </form>

</main>
<?php
$pais->close();


// Cierra la conexión
$mysqli->close();
require_once("include/fin.inc");
?>
