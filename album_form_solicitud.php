﻿<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Spark - Fotos, fotos y m&aacute;s fotos</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto|Charmonman" rel="stylesheet">
        <link rel="stylesheet" href="css/general.css">
        <link rel="alternate stylesheet" title="estilo accesible" href="css/accesibilidad.css">
        <link rel="stylesheet" href="css/print.css">
        <link rel="stylesheet" href="css/main_album_form_solicitud.css">
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

        <main class="main_form_solicitud">
            <h2>Solicitud impresi&oacute;n &aacute;lbum</h2>
            <label for="check_info">
                <span>Descripci&oacute;n y tarifa</span>
                <span class="icon-hand-pointer-o" aria-hidden="true"> Click me</span>
                <span id="icon_row" class="icon-down-circled2" aria-hidden="true"></span>
            </label>
            <input type="checkbox" id="check_info" value="">
            <div id="box_info">
                <p>A través de este formulario va a solicitar que se le imprima de forma física el álbum que usted seleccione y se le enviará a la dirección y fecha (estimada) que se desee.</p>
                <h4>Prices</h4>
                <table id="lista_concepto">
                    <tr>
                        <td>Concept</td>
                        <td>Price</td>
                    </tr>
                    <tr>
                        <td>&lt; 5 pages</td>
                        <td>0.10 &euro;/page</td>
                    </tr>
                    <tr>
                        <td>between 5 and 10 pages</td>
                        <td>0.08 &euro;/page</td>
                    </tr>
                    <tr>
                        <td>&gt; 11 pages</td>
                        <td>0.07 &euro;/page</td>
                    </tr>
                    <tr>
                        <td>Black and white</td>
                        <td>0.03 &euro;/image</td>
                    </tr>
                    <tr>
                        <td>Colored</td>
                        <td>0.05 &euro;/image</td>
                    </tr>
                    <tr>
                        <td>Resolution &gt; 300 dpi</td>
                        <td>0.02 &euro;/image</td>
                    </tr>
                </table>
            </div>
            <form action="album_respuesta.php">
                <input type="text" placeholder="Autor" required>
                <br>
                <input type="text" placeholder="Title" required>
                <br>
                <input type="text" placeholder="Description, dedicatory, ...">
                <br>
                <input type="text" placeholder="email" required>
                <br>
                <input type="text" placeholder="Shipping direction" required>
                <br>
                <input type="text" placeholder="City" required>
                <br>
                <input type="text" placeholder="C.P." required>
                <br>
                <input type="text" placeholder="Tel.">
                <br>
                <label>Cover color</label>
                <input type="color" name="color_cover" value="#bbbbbb">
                <br>
                <input type="number" name="num_copies" placeholder="Num. copies" step="1" min="1">
                <br>
                <label>Res. print</label>
                <input type="range" name="resolucion" id="input_res" value="150" step="150" min="150" max="900"
                       onchange="document.getElementById('output_res').textContent = value">
                <output name="result" id="output_res">150</output>
                <br>
                <label>Album to print</label>
                <select name="album_selector" id="album_selector" required>
                    <option value="album1">Album1</option>
                    <option value="album2">Album2</option>
                    <option value="album3">Album3</option>
                </select>
                <br>
                <label>Reception date</label>
                <input type="date" name="recep_date">
                <br>
                <label>Print type</label>
                <label><input type="radio" name="color_bw" value="color"> Color</label>
                <label><input type="radio" name="color_bw" value="bnw"> Black / White</label>
                <br>
                <!--<input type="submit" name="enviar_form_impresion" value="Enviar">-->
                <button type="submit" name="boton_solicitud_enviar">Send</button>
            </form>
        </main>

        <footer>
            <div class="footer_items">
                &copy; <time datetime="2018">2018</time>
            </div>
            <div class="footer_items">
                <span>SPARK </span>
                <a href="#" class="icon_row_up">UP</a>
            </div>
        </footer>
    </body>
</html>
