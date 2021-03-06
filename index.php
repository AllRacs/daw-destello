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
        $sentencia = 'SELECT u.NomUsuario, f.Titulo, f.FRegistro, p.NomPais, f.Fichero, f.IdFoto FROM usuarios u JOIN albumes a JOIN fotos f JOIN paises p
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
            <a href="detalle_foto.php?id=$fila->IdFoto">
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
        </div>-->
    </div>
    <h2>Selección de los editores</h2><br>

        <?php
        $rows[0] = "";
        $rcount = 0;
        if(is_file("editorschoice.dat")){
            $rows = file("editorschoice.dat");
            $rcount = sizeof($rows);
        }
        $rand = rand(0, $rcount-1);
        $foto = explode("##", $rows[$rand]);
        //consusta a bd
        $sentencia2 = 'SELECT u.NomUsuario, f.Titulo, f.FRegistro, p.NomPais, f.Fichero, f.IdFoto FROM usuarios u JOIN albumes a JOIN fotos f JOIN paises p
        WHERE u.IdUsuario = a.Usuario AND a.IdAlbum = f.Album AND f.Pais = p.IdPais AND f.IdFoto like "'.$foto[0].'"';
        if(!($choice = $mysqli->query($sentencia2))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia2</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }
        //select > option para cada css
        print '<div class="container_posting">';
        while($fila = $choice->fetch_object()) {
            echo <<<ddd
            <div class="p_box">
            <label class="title">$fila->Titulo</label>
            <span> - </span>
            <label class="ubicacion">$fila->NomPais</label>
            <br>
            <figure>
            <a href="detalle_foto.php?id=$fila->IdFoto">
            <img src="$fila->Fichero" alt="[foto_not_found]">
            </a>
            </figure>
            <span class="icon-heart-empty"></span>
            <span class="icon-comment-empty"></span>
            <label>$fila->NomUsuario</label>
            <time datetime="2018-10-01">$fila->FRegistro</time>
ddd;
            print '<p>Editor: '.$foto[1].' - '.$foto[2].'</p></div>';
        }
        ?>
    </div>
</main>
<?php
$choice->close();
// Libera la memoria ocupada por el resultado
$resultado->close();
// Cierra la conexión
$mysqli->close();
require_once("include/fin.inc");
?>
