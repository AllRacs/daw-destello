<?php
include("sesionstart.php");
?>
<?php
    include("include/cabecera.inc");
    include("include/header.inc");
    include("include/nav.inc");
?>
<style>
    <?php include 'CSS/main_registro.css';?>
</style>
<main>
        <h1>Register</h1>

        <form id="form_registro" action="resultado_registro.php" method="POST">
            <!--Register_Form-->
            <label for="user_img">
                <span class="hiddeofscreen">Profile Picture</span>
                <span class="icon-file-image" aria-hidden="true"></span><!-- User Picture REGISTER -->
            </label>
            <input id="user_img" type="file" name="register" value="Upload image">
            <br>
            <label for="input_name">
                <span class="hiddeofscreen">Usuario:</span>
                <span class="icon-user-circle-o" aria-hidden="true"></span>
            </label><!-- User/email REGISTER -->
            <input id="input_name" type="text" name="input_name" value="" placeholder="User Name" required>
            <br>
            <label for="input_pass">
                <span class="hiddeofscreen">Password:</span>
                <span class="icon-key" aria-hidden="true"></span><!-- Password REGISTER -->
            </label>
            <input id="input_pass" type="password" name="input_pass" value="" placeholder="Password" required>
            <br>
            <label for="input_pass_confirm">
                <span class="hiddeofscreen">Repeat password:</span>
                <span class="icon-key" aria-hidden="true"></span><!-- Password Confirm REGISTER -->
            </label>
            <input id="input_pass_confirm"type="password" name="input_pass_confirm" value="" placeholder="Repeat Password" required>
            <br>
            <label for="input_email">
                <span class="hiddeofscreen">Email:</span>
                <span class="icon-at" aria-hidden="true"></span><!-- E-mail REGISTER -->
            </label>
            <input id="input_email" type="email" name="input_email" value="" placeholder="E-mail" required>
            <br>
            <label for="input_calendar">
                <span class="hiddeofscreen">Birthday:</span>
                <span class="icon-calendar" aria-hidden="true"></span><!-- Birthday REGISTER -->
            </label>
            <input id="input_calendar" type="date" name="input_calendar" value="" placeholder="Birthday">
            <br>
            <label for="input_city">
                <span class="icon-home-outline" aria-hidden="true"></span><!-- Location REGISTER -->
            </label>
            <input id="input_city" type="text" name="input_city" value="" placeholder="City">
            <br>
            <label for="input_country">
                <span class="icon-home-outline" aria-hidden="true" style="color:grey"></span>
            </label>
            <input id="input_country" type="text" name="input_country" value="" placeholder="Country">
            <br>
            <!--Register_End-->
            <span>
                <label for="check_login" id="have_an_acc">Already have an account?</label>
                <button type="submit" name="input_submit" value="Registrar">Registrar</button>
            </span>
        </form>

</main>
<?php
    require_once("include/fin.inc");
?>
