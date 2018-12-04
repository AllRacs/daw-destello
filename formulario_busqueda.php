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

$sentencia = 'SELECT NomPais FROM Paises ORDER BY NomPais ASC';
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
<?php include 'CSS/main_formulario_busqueda.css';?>
</style>
<main>
    <h1>Advance Search</h1>
    <section>
        <form id="form_search" action="resultado_busqueda.php" method="GET">
            <!--Advance Search Form-->
            <label>
                <span>Title:</span>
                <input type="text" name="Title" id="input_title" value="" placeholder="Title">
            </label>
            <br>
            <label>
                <span>Author:</span>
                <input type="text" name="Author" id="input_author" value="" placeholder="Author">
            </label>
            <br>
            <label>
                <span>Album:</span>
                <input type="text" name="Album" id="input_album" value="" placeholder="Album">
            </label>
            <br>
            <label>
                <span>Country:</span>
                <select name="Country" id="input_country" required>
                    <option value="Pais">País</opcion>
                        <?php while($fila = $pais->fetch_assoc()){
                            echo'
                            <option value="'.$fila['NomPais'].'">'.$fila['NomPais'].'</option>
                            ';
                        }
                        ?>
                    </select>
                </label>
                <br>
                <label>
                    <span>Date:</span>
                    <input type="date" name="date" id="input_date" value="">
                </label>
                <br><br>
                <button type="submit" id="Advance Search Button">Search</button>
                <!--End Form-->
            </form>
        </section>
    </main>
    <?php
    $pais->close();

    // Cierra la conexión
    $mysqli->close();

    require_once("include/fin.inc");
    ?>
