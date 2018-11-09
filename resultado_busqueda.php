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
    <?php include 'CSS/main_indexANDdetalle_foto.css';?>
</style>
<main>
   <h1>
       Resultado de búsqueda:
   </h1>
       <?php
       /*PONERLO EN FORMA DE ETIQUEDAS, NO EN ENUMERACION*/

        if(!empty($_GET['busqueda_top'])){
            echo htmlspecialchars($_GET['busqueda_top']);
        } else if(!empty($_GET)){
            foreach ($_GET as $key => $value) {
                if(!empty($value)){
                        echo '<li>'.$key.': '.$value.'</li>';
                }

              /*foreach ( $_GET["busqueda_avanzada"] as $busqueda_avanzada ) {
             if(!empty($busqueda_avanzada)){
                    echo $busqueda_avanzada;

                    }
                 if(!($busqueda_avanzada === end($_GET["busqueda_avanzada"]))){
                    echo ", ";
                }
               }*/
            }

        }
        ?>
        <div class="container_posting">
            <div class="p_box">
                <label class="title">Búho</label>
                <span> - </span>
                <label class="ubicacion">Bosque</label>
                <br>
                <figure>
                    <a href="detalle_foto.php?titulo=Buho&img=img/buho.jpg&alt=Buho&fecha=01/10/2018&pais=Bosque&usuario=Harry Potter">
                        <img src="img/buho.jpg" alt="[foto_not_found]">
                    </a>
                </figure>
                <span class="icon-heart-empty"></span>
                <span class="icon-comment-empty"></span>
                <label>Harry Potter</label>
                <time datetime="2018-10-01">01/10/2018</time>
            </div>

            <div class="p_box">
                <label class="title">cocodrilo</label>
                <span> - </span>
                <label class="ubicacion">Bosque</label>
                <br>
                <figure>
                    <a href="detalle_foto.php?titulo=Cocodrilo&img=img/cocodrilo.jpg&alt=Cocodrilo&fecha=01/10/2018&pais=Bosque&usuario=Harry Potter">
                        <img src="img/cocodrilo.jpg" alt="[foto_not_found]">
                    </a>
                </figure>
                <span class="icon-heart-empty"></span>
                <span class="icon-comment-empty"></span>
                <label>Harry Potter</label>
                <time datetime="2018-10-01">01/10/2018</time>
            </div>

            <div class="p_box">
                <label class="title">elefante</label>
                <span> - </span>
                <label class="ubicacion">Bosque</label>
                <br>
                <figure>
                    <a href="detalle_foto.php?titulo=elefante&img=img/elefante.jpg&alt=elefante&fecha=01/10/2018&pais=Bosque&usuario=Harry Potter">
                        <img src="img/elefante.jpg" alt="[foto_not_found]">
                    </a>
                </figure>
                <span class="icon-heart-empty"></span>
                <span class="icon-comment-empty"></span>
                <label>Harry Potter</label>
                <time datetime="2018-10-01">01/10/2018</time>
            </div>

            <div class="p_box">
                <label class="title">leon</label>
                <span> - </span>
                <label class="ubicacion">Bosque</label>
                <br>
                <figure>
                    <a href="detalle_foto.php?titulo=leon&img=img/leon.jpg&alt=leon&fecha=01/10/2018&pais=Bosque&usuario=Harry Potter">
                        <img src="img/leon.jpg" alt="[foto_not_found]">
                    </a>
                </figure>
                <span class="icon-heart-empty"></span>
                <span class="icon-comment-empty"></span>
                <label>Harry Potter</label>
                <time datetime="2018-10-01">01/10/2018</time>
            </div>

            <div class="p_box">
                <label class="title">pantera</label>
                <span> - </span>
                <label class="ubicacion">Bosque</label>
                <br>
                <figure>
                    <a href="detalle_foto.php?titulo=pantera&img=img/pantera.jpg&alt=pantera&fecha=01/10/2018&pais=Bosque&usuario=Harry Potter">
                        <img src="img/pantera.jpg" alt="[foto_not_found]">
                    </a>
                </figure>
                <span class="icon-heart-empty"></span>
                <span class="icon-comment-empty"></span>
                <label>Harry Potter</label>
                <time datetime="2018-10-01">01/10/2018</time>
            </div>
        </div>
</main>
<?php
    require_once("include/fin.inc");
?>
