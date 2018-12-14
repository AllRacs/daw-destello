<?php
include("sesionstart.php");
include("filtrado.php");
include("include/fichero.php");

include("include/cabecera.inc");
if(isset($_SESSION["user"])){
    include("include/header_logged.inc");
} else {
    include("include/header.inc");
    include("include/nav.inc");
}

if(isset($_POST['input_email'])){
    $existe=false;
    $email=$_POST['input_email'];

    $sentencia = "SELECT Email FROM usuarios where Email = '$email'";
    if(!($resultado2 = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }
    $fila = $resultado2->fetch_object();

    if($email == $fila["Email"]){
        $existe = true;
    }


}
if(filtrado() == true && !$existe){//Comprobacion datos -- mysqli_real_escape_string($mysqli, nombre)
    $name= mysqli_real_escape_string($mysqli, $_POST['input_name']);
    $clave= mysqli_real_escape_string($mysqli, $_POST['input_pass']);
    $email= mysqli_real_escape_string($mysqli, $_POST['input_email']);
    if(isset($_POST['input_sex'])){
        $sexo= mysqli_real_escape_string($mysqli, $_POST['input_sex']);
    }else{
        $sexo=0;
    }

    $fnac= mysqli_real_escape_string($mysqli, $_POST['input_calendar']);
    $ciudad= mysqli_real_escape_string($mysqli, $_POST['input_city']);
    $pais= mysqli_real_escape_string($mysqli, $_POST['input_country']);
    if (empty($_POST["photo"])) {
        $foto = mysqli_real_escape_string($mysqli, comprobarficherosubida());

    } else {

        $foto = 'img/default.img';
    }
    $freg=date("Y-m-d");
    $estilo=1;
    $sentencia = "INSERT INTO usuarios (IdUsuario, NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, Foto, FRegistro, Estilo)
    VALUES (NULL,
        '$name',
        '$clave',
        '$email',
        '$sexo',
        '$fnac',
        '$ciudad',
        '$pais',
        '$foto',
        '$freg',
        '$estilo')";
        if(!($mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }

    ?>

    <main class="main_album_respuesta">
        <h1>Datos de Registro</h1>
        <p><figure>
            <?php echo'<img class="profile" src=img/'.$foto.' " alt="[foto_not_found]">';?>
        </a>
    </figure>
    <p>Nombre de Usuario: <?php echo htmlspecialchars($_POST['input_name']); ?></p>
    <p>Contraseña: <?php echo htmlspecialchars($_POST['input_pass']); ?></p>
    <p>Email: <?php echo htmlspecialchars($_POST['input_email']); ?></p>
    <p>Fecha de Nacimiento: <?php echo htmlspecialchars($_POST['input_calendar']); ?></p>
    <p>Ciudad: <?php echo htmlspecialchars($_POST['input_city']); ?></p>
</main>
<?php

$mysqli->close();
}else{
    if($existe){
        echo '<p>Ya existe una cuenta con este correo: '.$email.'</p>';
    }
    echo'<a href="registro.php">Vuelve a intentarlo</a>';
}


require_once("include/fin.inc");
?>
