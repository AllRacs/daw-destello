<?php
include("sesionstart.php");
?>
<?php
    include("include/cabecera.inc");
    if(isset($_SESSION["email"])){
        include("include/header_logged.inc");
    } else {
        include("include/header.inc");
    }
    include("include/nav.inc");
?>
<style>
    <?php include 'CSS/main_registro.css';?>
</style>
<main>
        <h1>New album</h1>

        <form id="form_registro" action="mi_perfil.php">
            <!--Register_Form-->
            <label for="input_name">
                <span>Title:</span>
            </label><!-- User/email REGISTER -->
            <input id="input_title" type="text" name="input_title" value="" placeholder="Title" required>
            <br>
            <label for="input_desc">
                <span>Description:</span>
            </label>
            <input id="input_desc" type="text" name="input_desc" value="" placeholder="Description">
            <br>
            <!--Register_End-->
            <span>
                <button type="submit" name="input_submit" value="">Submit</button>
            </span>
        </form>

</main>
<?php
    require_once("include/fin.inc");
?>
