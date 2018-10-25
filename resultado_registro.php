<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Spark - Fotos, fotos y m&aacute;s fotos</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto|Charmonman" rel="stylesheet">
        <link rel="stylesheet" href="css/general.css">
        <link rel="alternate stylesheet" title="estilo accesible" href="css/accesibilidad.css">
        <link rel="stylesheet" href="css/print.css">
        <link rel="stylesheet" href="css/main_album_respuesta.css">
        <link rel="stylesheet" href="css/fontello.css">
    </head>
    <body>
        <header>
            <a href="index.php"><img id="logo" alt="Spark logo" src="img/logo.jpg"></a>
            <div class="top_header">
                <form action="resultado_busqueda.php" method="GET">
                    <!-- Busqueda -->
                    <input type="text" name="busqueda_top" placeholder="Search..." autofocus >
                    <button type="submit" id="busqueda">Busqueda</button>
                    <a href="formulario_busqueda.php">Avanzada</a>
                </form>
                <div id="user_status">
                    <!-- Botones segun estado sesion usuario -->
                    <label for="check_login">Iniciar sesión</label>
                    <a href="registro.php">Registrarse</a>
                    <a href="mi_perfil.php">Perfil</a>
                </div>
            </div>
        </header>

        <input type="checkbox" id="check_login">
        <nav>
            <form id="form_login" action="mi_perfil.php">
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

        <main class="main_album_respuesta">
            <h1>Datos de Registro</h1>
            <section>
                <p><b>Nombre de Usuario:</b> <?php echo htmlspecialchars($_POST['input_name']); ?></p>
                <p><b>Contraseña:</b> <?php echo htmlspecialchars($_POST['input_pass']); ?></p>
                <p><b>Email:</b> <?php echo htmlspecialchars($_POST['input_email']); ?></p>
                <p><b>Fecha de Nacimiento:</b> <?php echo htmlspecialchars($_POST['input_calendar']); ?></p>
                <p><b>Ciudad:</b> <?php echo htmlspecialchars($_POST['input_city']); ?></p>
                <p><b>Pais:</b> <?php echo htmlspecialchars($_POST['input_country']); ?></p>
            <section>
        </main>

        <footer>
            <div class="footer_items">
                &copy; <time datetime="2018">2018</time>
            </div>
            <div class="footer_items">
                <span>SPARK </span>
                <a href="#" class="icon_row_up">SUBIR</a>
            </div>
        </footer>
    </body>
</html>
