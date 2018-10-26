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
          <?php
            $precio; $paginas=6; $col_bn; $res = 0;
            $numcop = $_POST["numcop"];
            $ipp/*img por pag*/ = 5;
            foreach ($_POST as $key => $value) {
              echo '<li>'.$key.': '.$value.'</li>';
            }
            if(isset($_POST["color"])){
                $col_bn = 0.05;
            } else {
                $col_bn = 0.03;
            }
            if($_POST["res"] > 300){
                $res = 0.02;
            }
            $precio = (($col_bn + $res) * $paginas) * $numcop;
            echo 'Precio: ' . $precio;
          ?>
          <!--
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
          -->
        </ul>
        <button onclick="location.href='album_form_solicitud.php'" type="button" name="boton_atras_confirmacion">Atrás</button>
        <button type="submit" name="boton_confirmar_envio">Confirmar</button>
    </section>

</main>
<?php
    require_once("include/fin.inc");
?>
