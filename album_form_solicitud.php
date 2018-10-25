<?php
    include("include/cabecera.inc");
    include("include/header.inc");
    include("include/nav.inc");
?>
<style>
    <?php include 'CSS/main_album_form_solicitud.css';?>
</style>
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
<?php
    require_once("include/fin.inc");
?>
