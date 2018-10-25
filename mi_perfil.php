<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Spark - Fotos, fotos y m&aacute;s fotos</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto|Charmonman" rel="stylesheet">
        <link rel="stylesheet" href="css/general.css">
        <link rel="alternate stylesheet" title="estilo accesible" href="css/accesibilidad.css">
        <link rel="stylesheet" href="css/print.css">
        <link rel="stylesheet" href="css/main_mi_perfil.css">
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
                    <!--<button type="button" name="button_log">Iniciar Sesion</button>
                    <a href="registro.php">Registrarse</a>-->
                    <a href="mi_perfil.php">Perfil</a>
                    <a href="index.php">Cerrar sesion</a>
                </div>
            </div>
        </header>

        <!--
        <input type="checkbox" id="check_login">
        <nav>
            <form id="form_login">
                <span id="icon_user">[icon_user]</span>
                <input type="email" name="input_email" value="" placeholder="E-mail">
                <br>
                <span class="">[icon_pass]</span>
                <input type="password" name="input_pass" value="" placeholder="Contrase&ntilde;a">
                <br>
                <a href="#">He oldivadado la contrase&ntilde;a</a>
                <input type="submit" name="input_submit" value="Conectar">
            </form>
        </nav>-->

        <main>
            <h3>Mi perfil</h3>
            <div id="navegacion_perfil">
                <label><button onclick="location.href='mis_datos'" type="button">Mis Datos</button></label>
                <label><button onclick="location.href='mis_albumes'" type="button">Mis Álbumes</button></label>
                <label><button onclick="location.href='crear_album'" type="button">Crear Album</button></label>
                <label><button onclick="location.href='album_form_solicitud.php'" type="button">Solicitar Impresión de Album</button></label>
                <label><button onclick="location.href='baja_usuario.php'" type="button">Darme de Baja</button></label>
            </div>
            <div id="container_posting_perfil">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero labore maxime tenetur nesciunt pariatur nihil nemo molestiae ab ut, atque ea, ex non beatae, quaerat numquam doloribus velit blanditiis hic corporis fugiat incidunt saepe unde corrupti. Quo delectus nam beatae nulla quia non accusantium culpa dolorum assumenda. Tempore, veniam labore!</p>
            </div>
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
