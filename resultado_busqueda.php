<?php
include("sesionstart.php");
?>
<?php
    include("include/cabecera.inc");
    if(isset($_SESSION["user"])){
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

                        $sentencia = 'SELECT titulo, Descripcion, Fecha, Pais, Fichero, Alternativo, Album, paises.NomPais
                        FROM Fotos, Paises
                        WHERE paises.NomPais LIKE ("'.$_GET["Country"].'") AND titulo LIKE ("'.$_GET["Title"].'")
                        OR titulo LIKE ("'.$_GET["Title"].'")
                        OR paises.NomPais LIKE ("'.$_GET["Country"].'")
                        ';
                        if(!($buscar = $mysqli->query($sentencia))) {
                          echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                          echo '</p>';
                          exit;
                        }else{
                          //Pruebas
                        }
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



        // Recorre el resultado y lo muestra en forma de tabla HTML
        while($fila = $buscar->fetch_assoc()) {

          echo '<div class="container_posting">
                <div class="p_box">
                    <label class="title">' . $fila['titulo'] . '</label>
                    <span> - </span>
                    <label class="ubicacion">Unknow</label>
                    <br>
                <figure >
                <a href="detalle_foto.php?titulo=' . $fila['titulo'] . '&img=img/' . $fila['Fichero'] . '&alt=' . $fila['Alternativo'] . '&fecha=' . $fila['Fecha'] . '&pais=' . $fila['NomPais'] . '&usuario=' . $_SESSION['user'] . '">
                <img src="img/' . $fila['Fichero'] . '" alt="' . $fila['Alternativo'] . '">
                </a>
                </figure>
                <span class="icon-heart-empty"></span>
                <span class="icon-comment-empty"></span>
                <label>Harry Potter</label>
                <time datetime="2018-10-01">01/10/2018</time>
            </div>
            </div>
               ';
        }
        ?>

</main>
<?php
    require_once("include/fin.inc");
?>
