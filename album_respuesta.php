<?php
    include("include/cabecera.inc");
    include("include/header.inc");
    include("include/nav.inc");
?>
<style>
    <?php include 'CSS/main_album_respuesta.css';?>
</style>
<main class="main_album_respuesta">
    <h3>Confirmaci&oacute;n impresi&oacute;n &aacute;lbum</h3>
    <section>
        <ul>
            <li>Autor</li>
            <li>Titulo</li>
            <li>Texto adicional</li>
            <li>Email</li>
            <li>Dir envio</li>
            <li>Telf contacto</li>
            <li>Color portada</li>
            <li>Num. copias</li>
            <li>Resolucion</li>
            <li>&Aacute;lbum a Imprimir</li>
            <li>Color o B&W</li>
        </ul>
        <button onclick="location.href='album_form_solicitud.php'" type="button" name="boton_atras_confirmacion">Atrás</button>
        <button type="submit" name="boton_confirmar_envio">Confirmar</button>
    </section>

</main>
<?php
    require_once("include/fin.inc");
?>
