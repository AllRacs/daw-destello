<?php
include("sesionstart.php");
?>
<?php
    include("include/cabecera.inc");
    include("include/header_logged.inc");
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
    require_once("include/fin.inc");
?>
