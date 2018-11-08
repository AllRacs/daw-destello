<input type="checkbox" id="check_login">
<nav>
    <form id="form_login" action="controlacceso.php" method="post">
        <span id="icon_user" class="icon-user-circle-o" aria-hidden="true"></span><!-- Usuario/email LOGIN -->
        <input type="email" name="input_email" value="" placeholder="E-mail" required>
        <br>
        <span class="icon-key" aria-hidden="true"></span><!-- Pass LOGIN -->
        <input type="password" name="input_pass" value="" placeholder="Contrase&ntilde;a" required>
        <br><!-- Fin campos form -->
        <a href="#">He oldivadado la contrase&ntilde;a</a>
        <input type="submit" name="input_submit" value="Conectar">
    </form>
</nav>
