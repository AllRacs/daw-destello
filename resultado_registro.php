<?php
include("sesionstart.php");
include("filtrado.php");

include("include/cabecera.inc");
if(isset($_SESSION["user"])){
    include("include/header_logged.inc");
} else {
    include("include/header.inc");
    include("include/nav.inc");
}


if(filtrado() == true){//Comprobacion datos -- mysqli_real_escape_string($mysqli, nombre)
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
    $foto="img/defaul.img";
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
            <p>Nombre de Usuario: <?php echo htmlspecialchars($_POST['input_name']); ?></p>
            <p>Contraseña: <?php echo htmlspecialchars($_POST['input_pass']); ?></p>
            <p>Email: <?php echo htmlspecialchars($_POST['input_email']); ?></p>
            <p>Fecha de Nacimiento: <?php echo htmlspecialchars($_POST['input_calendar']); ?></p>
            <p>Ciudad: <?php echo htmlspecialchars($_POST['input_city']); ?></p>
        </main>
        <?php
        $directory = 'img/users/'.$email.'';
        mkdir($directory);
        $mysqli->close();
    }else{
        echo'<a href="registro.php">Vuelve a intentarlo</a>';
    }


    require_once("include/fin.inc");
    ?>
