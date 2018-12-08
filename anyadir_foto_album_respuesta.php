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
<?php include 'CSS/main_formulario_busqueda.css';?>
</style>

<main>
    <?php
    if(isset($_SESSION["user"])){/*Si has iniciado sesion puedes ver esto*/
        // echo 'Página respuesta álbum, realizar la inserción en la DB aquí';
        //Title=&Description=&Date=&Country=&photo=&Alternative=&Album=
        if(isset($_GET["Titulo"]) && isset($_GET["Description"]) && isset($_GET["Date"]) && isset($_GET["Country"]) && isset($_GET["photo"]) && isset($_GET["Alternative"]) && isset($_GET["Album"])){
            if (!empty($_GET["Titulo"])) {
                $titulo = mysqli_real_escape_string($mysqli, $_GET["Titulo"]);
            } else {
                $titulo = 'NULL';
            }
            if (!empty($_GET["Description"])) {
                $desc = mysqli_real_escape_string($mysqli, $_GET["Description"]);
            } else {
                $desc = 'NULL';
            }
            if (!empty($_GET["Date"])) {
                $date = mysqli_real_escape_string($mysqli, $_GET["Date"]);
            } else {
                $date = 'NULL';
            }
            if (!empty($_GET["Country"])) {
                $country = mysqli_real_escape_string($mysqli, $_GET["Country"]);
            } else {
                $country = 'NULL';
            }
            if (!empty($_GET["photo"])) {
                $photo = mysqli_real_escape_string($mysqli, $_GET["photo"]);
            } else {
                $photo = 'NULL';
            }
            if (!empty($_GET["Alternative"])) {
                $alter = mysqli_real_escape_string($mysqli, $_GET["Alternative"]);
            } else {
                $alter = 'NULL';
            }
            if (isset($_GET["Album"]) && !empty($_GET['Album'])) {
                echo'album existe';
                $album = mysqli_real_escape_string($mysqli, $_GET["Album"]);
            } else {
                $album = 'NULL';
            }
            $registro = date("Y/m/d h:i:s");
            //INSERT INTO fotos (IdFoto, Titulo, Descripcion, Fecha, Pais, Album, Fichero, Alternativo, FRegistro)
            //VALUES (NULL, Medusa2, Foto de medusa en el mar, 2018-11-13, 2, 1, img/medusa.jpg, medusita, 2018-12-04 00:00:00)
            $sentencia = "INSERT INTO fotos (IdFoto, Titulo, Descripcion, Fecha, Pais, Album, Fichero, Alternativo, FRegistro)
            VALUES (NULL, '$titulo', '$desc', '$date', '$country', '$album', 'img/$photo', '$alter', '$registro')";
            if(!($mysqli->query($sentencia))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                echo '</p>';
                exit;
            }
            // if ($mysqli->query($sentencia) === TRUE) {
            //     echo "New record created successfully";
            // } else {
            //     echo "Error: " . $sentencia . "<br>" . $mysqli->error;
            // }

            // Cierra la conexión con la base de datos
            $mysqli->close();

            echo '<p style="padding-left:8em;padding-top:1em">La foto se ha añadido correctamente.</p>';

            echo '<a id="volver_al_perfil" href="mi_perfil.php">Volver al perfil</a>';
        }
            echo 'Vaya, algo salió mal, debes rellenar todos los campos obligatorios para poder subir una foto.';


    } else { /*Si no has iniciado sesion se te recomiendo iniciarla*/
        echo '¡Vaya! parece que no estás loggeado <a href="registro.php">Accede ahora</a>';
    }
    echo '</main>';
    require_once("include/fin.inc");
    ?>
