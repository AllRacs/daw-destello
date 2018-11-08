<?php
    include("include/cabecera.inc");
    include("include/header.inc");
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
<<<<<<< HEAD
                <input type="text" name="Title" id="input_title" value="" placeholder="Title">
=======
                <input type="text" name="busqueda_avanzada[]" id="input_title" value="" placeholder="Title">
>>>>>>> e36228d17ee040223e5bf0cb42a221e882960639
            </label>
            <br>
            <label>
                <span>Author:</span>
<<<<<<< HEAD
                <input type="text" name="Author" id="input_author" value="" placeholder="Author">
=======
                <input type="text" name="busqueda_avanzada[]" id="input_author" value="" placeholder="Author">
>>>>>>> e36228d17ee040223e5bf0cb42a221e882960639
            </label>
            <br>
            <label>
                <span>Album:</span>
<<<<<<< HEAD
                <input type="text" name="album" id="input_album" value="" placeholder="Album">
=======
                <input type="text" name="busqueda_avanzada[]" id="input_album" value="" placeholder="Album">
>>>>>>> e36228d17ee040223e5bf0cb42a221e882960639
            </label>
            <br>
            <label>
                <span>Country:</span>
<<<<<<< HEAD
                <input type="text" name="Country" id="input_country" value="" placeholder="Country">
=======
                <input type="text" name="busqueda_avanzada[]" id="input_country" value="" placeholder="Country">
>>>>>>> e36228d17ee040223e5bf0cb42a221e882960639
            </label>
            <br>
            <label>
                <span>Date:</span>
<<<<<<< HEAD
                <input type="date" name="date" id="input_date" value="">
=======
                <input type="date" name="busqueda_avanzada[]" id="input_date" value="">
>>>>>>> e36228d17ee040223e5bf0cb42a221e882960639
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
