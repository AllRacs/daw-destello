<?php
include("sesionstart.php");
include("filtrado.php");

include("include/cabecera.inc");
if(isset($_SESSION["user"])){
    include("include/header_logged.inc");
} else {
    include("include/header.inc");
}


if(filtrado() == true){//Comprobacion datos

?>

<main class="main_album_respuesta">
    <h1>Datos de Registro</h1>
    <p>Nombre de Usuario: <?php echo htmlspecialchars($_POST['input_name']); ?></p>
    <p>Contraseña: <?php echo htmlspecialchars($_POST['input_pass']); ?></p>
    <p>Email: <?php echo htmlspecialchars($_POST['input_email']); ?></p>
    <p>Fecha de Nacimiento: <?php echo htmlspecialchars($_POST['input_calendar']); ?></p>
    <p>Ciudad: <?php echo htmlspecialchars($_POST['input_city']); ?></p>
    <p>Pais: <?php echo htmlspecialchars($_POST['input_country']); ?></p>
</main>
<?php
}else{
  echo'<a href="registro.php">Vuelve a intentarlo</a>';
}
require_once("include/fin.inc");
?>
