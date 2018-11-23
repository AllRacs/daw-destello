<?php
    include("sesionstart.php");

    /*if(isset($_COOKIE["c_email"]) && isset($_SESSION["flag_home"]) && $_SESSION["flag_home"] != 0){       //first acces when remembered
        $_SESSION["flag_home"] = 0;
    }*/
    if(isset($_COOKIE["last_con"])){                                    //check if there is a last conection
        $_SESSION["last_con"] = $_COOKIE["last_con"];
    }

    include("include/cabecera.inc");

    if(isset($_SESSION["user"])){                                      //choose header if loged in or not
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
    <?php

        if(isset($_GET["err_ini"])){
            echo '<p style="color:red">Error: inicio sesion incorrecto</p>';
        } elseif (isset($_SESSION["user"]) && isset($_SESSION["flag_home"]) && $_SESSION["flag_home"] == 0 && isset($_SESSION["last_con"])) {
            echo '<p style="color:black">Bienvenido de nuevo '.$_SESSION["user"].', tú última conexion es '.$_SESSION["last_con"].'</p>';
            $_SESSION["flag_home"]++;
        }

    ?>
    <h1>Fotos, fotos y mas fotos</h1>
    <div class="container_posting">
        <?php

        //consusta a bd
        $sentencia = 'SELECT u.NomUsuario, f.Titulo, f.FRegistro, p.NomPais, f.Fichero FROM usuarios u JOIN albumes a JOIN fotos f JOIN paises p
        WHERE u.IdUsuario = a.Usuario AND a.IdAlbum = f.Album AND f.Pais = p.IdPais ORDER BY f.FRegistro DESC';
        if(!($resultado = $mysqli->query($sentencia))) {
          echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
          echo '</p>';
          exit;
        }
        //select > option para cada css

        $cont = 0;
        while($fila = $resultado->fetch_object()) {
            echo <<<ddd
            <div class="p_box">
            <label class="title">$fila->Titulo</label>
            <span> - </span>
            <label class="ubicacion">$fila->NomPais</label>
            <br>
            <figure>
                <a href="detalle_foto.php?titulo=$fila->Titulo&img=$fila->Fichero&alt=notfound&fecha=$fila->FRegistro&pais=$fila->NomPais&usuario=$fila->NomUsuario">
                    <img src="$fila->Fichero" alt="[foto_not_found]">
                </a>
            </figure>
            <span class="icon-heart-empty"></span>
            <span class="icon-comment-empty"></span>
            <label>$fila->NomUsuario</label>
            <time datetime="2018-10-01">$fila->FRegistro</time>
            </div>
ddd;
            $cont++;
            if($cont == 5) {
                break;
            }
        }
        ?>

        <!-- <div class="p_box">
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
        </div> -->
    </div>
</main>
<?php
// Libera la memoria ocupada por el resultado
$resultado->close();
// Cierra la conexión
$mysqli->close();
    require_once("include/fin.inc");
?>
