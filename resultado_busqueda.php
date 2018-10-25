<?php
    include("include/cabecera.inc");
    include("include/header.inc");
    include("include/nav.inc");
?>
<style>
    <?php include 'CSS/main_indexANDdetalle_foto.css';?>
</style>
<main>
   <h1>Resultado de búsqueda:
       <?php
        if(!empty($_GET['busqueda_top'])){
            echo htmlspecialchars($_GET['busqueda_top']);
        } else if(!empty($_GET['busqueda_avanzada'])){
            foreach ( $_GET["busqueda_avanzada"] as $busqueda_avanzada ) {
               if(!empty($busqueda_avanzada)){
                 echo $busqueda_avanzada;
                 echo ", ";
               }
            }
            $datebus = array($_GET["busqueda_avanzada"]);
            $new_date = date('d-m-Y', strtotime($_GET['busqueda_avanzada'][3]));
        }
        ?>
   </h1>
   <div class="container_posting">
       <div class="p_box">
            <label class="title">Búho</label>
            <span> - </span>
            <label class="ubicacion">Bosque</label>
            <br>
            <figure>
                <a href="detalle_foto.php">
                    <img src="img/buho.jpg" alt="[foto_not_found]">
                </a>
            </figure>
            <span class="icon_love">[icon_love]</span>
            <span class="icon_bubble">[icon_bubble]</span>
            <label>Harry Potter</label>
            <time datetime="2018-10-01">01/10/2018</time>
        </div>

        <div class="p_box">
            <label class="title">Búho</label>
            <span> - </span>
            <label class="ubicacion">Bosque</label>
            <br>
            <figure>
                <a href="detalle_foto.php">
                    <img src="img/buho.jpg" alt="[foto_not_found]">
                </a>
            </figure>
            <span class="icon_love">[icon_love]</span>
            <span class="icon_bubble">[icon_bubble]</span>
            <label>Harry Potter</label>
            <time datetime="2018-10-01">01/10/2018</time>
        </div>

        <div class="p_box">
            <label class="title">Búho</label>
            <span> - </span>
            <label class="ubicacion">Bosque</label>
            <br>
            <figure>
                <a href="detalle_foto.php">
                    <img src="img/buho.jpg" alt="[foto_not_found]">
                </a>
            </figure>
            <span class="icon_love">[icon_love]</span>
            <span class="icon_bubble">[icon_bubble]</span>
            <label>Harry Potter</label>
            <time datetime="2018-10-01">01/10/2018</time>
        </div>

        <div class="p_box">
            <label class="title">Búho</label>
            <span> - </span>
            <label class="ubicacion">Bosque</label>
            <br>
            <figure>
                <a href="detalle_foto.php">
                    <img src="img/buho.jpg" alt="[foto_not_found]">
                </a>
            </figure>
            <span class="icon_love">[icon_love]</span>
            <span class="icon_bubble">[icon_bubble]</span>
            <label>Harry Potter</label>
            <time datetime="2018-10-01">01/10/2018</time>
        </div>

        <div class="p_box">
            <label class="title">Búho</label>
            <span> - </span>
            <label class="ubicacion">Bosque</label>
            <br>
            <figure>
                <a href="detalle_foto.php">
                    <img src="img/buho.jpg" alt="[foto_not_found]">
                </a>
            </figure>
            <span class="icon_love">[icon_love]</span>
            <span class="icon_bubble">[icon_bubble]</span>
            <label>Harry Potter</label>
            <time datetime="2018-10-01">01/10/2018</time>
        </div>
    </div>
</main>
<?php
    require_once("include/fin.inc");
?>
