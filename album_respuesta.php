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
?>
<style>
<?php include 'CSS/main_album_respuesta.css';?>
</style>
<?php

if(isset($_SESSION["user"])){/*Si has iniciado sesion puedes ver esto*/



    ?>
    <main class="main_album_respuesta">
        <h3>Confirmaci&oacute;n impresi&oacute;n &aacute;lbum</h3>
        <section>
            <ul>
                <?php
                $precio; $paginas=6; $col_bn; $res = 0; $ppag=0.1; /*precio por pag, minimo establecido <5 pag*/
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
                if($paginas > 5){
                    $ppag=0.08;
                }elseif($paginas > 11){
                    $ppag=0.07;
                }
                $precio = (($col_bn + $res +$ppag) * $paginas) * $numcop;
                echo '<li>Precio: ' . $precio.'</li>';

                $album = $_POST['Album'];
                $nombre = $_POST['Autor'];
                $titulo = $_POST['Title'];
                $descripcion = NULL;
                if(isset($_POST['Text'])){
                    $descripcion = $_POST['Text'];
                }
                $email = $_POST['Email'];
                $direccion = $_POST['Direccion'];
                $color = $_POST['Portada'];
                $copias = $_POST['numcop'];
                $resolucion = $_POST['res'];
                $fecha = $_POST['Entrega'];
                $Icolor = $_POST['Impresion'];
                $FRegistro = date("Y-m-d");
                $coste = $precio;

                $sentencia = 'SELECT IdAlbum FROM albumes WHERE Titulo ="'.$album.'"';
                if(!($idalb = $mysqli->query($sentencia))) {
                    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                    echo '</p>';
                    exit;
                }else{
                    /*echo $sentencia;
                    $paises = $resultado->fetch_assoc();
                    echo $paises["NomPais"];*/
                }

                $fila = $idalb->fetch_assoc();
                $IdAlbum = $fila['IdAlbum'];
                $sentencia2 = "INSERT INTO solicitudes
                (IdSolicitud, Album, Nombre, Titulo, Descripcion, Email, Direccion, Color, Copias, Resolucion, Fecha, IColor, FRegistro, Coste)
                VALUES (NULL, '$IdAlbum',
                    '$nombre', '$titulo', '$descripcion','$email','$direccion','$color','$copias','$resolucion','$fecha','$Icolor','$FRegistro','$coste')";
                echo '<br>' ;
                if(!($solicitud = $mysqli->query($sentencia2))) {
                    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                    echo '</p>';
                    exit;
                }else{
                    //Pruebas
                }
                echo 'Tu solicitud de impresión ha sido registrada, recibirás el album en el plazo de entrega estimado';
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
        <button onclick="location.href='album_form_solicitud.php'" type="button" name="boton_atras_confirmacion">Pedir otro album</button>
        <button onclick="location.href='mi_perfil.php'" type="submit" name="boton_confirmar_envio">Ir a mi perfil</button>
    </section>

</main>
<?php

}else{/*Si no has iniciado sesion se te recomiendo iniciarla*/
    echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
}
require_once("include/fin.inc");
?>
