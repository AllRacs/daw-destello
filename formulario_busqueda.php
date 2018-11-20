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
                <input type="text" name="album" id="input_album" value="" placeholder="Album">
            </label>
            <br>
            <label>
                <span>Country:</span>
                <input type="text" name="Country" id="input_country" value="" placeholder="Country">
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
    require_once("include/fin.inc");
?>
