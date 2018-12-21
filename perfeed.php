<?php
include('sesionstart.php'); // conexión a la BBDD
// create doctype
$dom = new DOMDocument("1.0");
// display document in browser as plain text
// for readability purposes
header("Content-Type: text/xml");

// pagina
$pagina = $dom->createElement("pagina");
$dom->appendChild($pagina);

$titulopagina = $dom->createElement("titulopagina");
$pagina->appendChild($titulopagina);

$text = $dom->createTextNode("Spark");
$titulopagina->appendChild($text);

$link = $dom->createElement("link");
$pagina->appendChild($link);

$text = $dom->createTextNode("http://localhost/daw-destello/index.php");
$link->appendChild($text);

$descripcionpagina = $dom->createElement("descripcionpagina");
$pagina->appendChild($descripcionpagina);

$text = $dom->createTextNode("Fotos, fotos y mas fotos");
$descripcionpagina->appendChild($text);

$titulo2 = $dom->createElement("titulo2");
$pagina->appendChild($titulopagina);

$text = $dom->createTextNode("Perfil de Usuario");
$titulopagina->appendChild($text);

$idioma = $dom->createElement("idioma");
$pagina->appendChild($idioma);

$text = $dom->createTextNode("es");
$idioma->appendChild($text);

//////////////////// Datos usuario ////////////////////////
//SELECT * FROM usuarios u where u.NomUsuario = 'usu1' ORDER BY NomUsuario ASC

$sentencia = 'SELECT * FROM usuarios u JOIN paises p where p.IdPais = u.Pais AND u.Email = "'.$_SESSION["user"].'" ORDER BY u.Email ASC';
if(!($resultado = $mysqli->query($sentencia))) {
    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
    echo '</p>';
    exit;
}
$fila = $resultado->fetch_object();
//DATOS PERSONALES
$datos = $dom->createElement("DatosUsuario");
$pagina->appendChild($datos);

$nombre = $dom->createElement("Nombre");
$datos->appendChild($nombre);

$text = $dom->createTextNode($fila->NomUsuario);
$nombre->appendChild($text);

$email = $dom->createElement("Email");
$datos->appendChild($email);

$text = $dom->createTextNode($_SESSION['user']);
$email->appendChild($text);

$fnac = $dom->createElement("FechaNacimiento");
$datos->appendChild($fnac);

$text = $dom->createTextNode($fila->FNacimiento);
$fnac->appendChild($text);

if ($fila->Sexo == 1) {
    $sexo = 'Masculino';
} elseif ($fila->Sexo == 2) {
    $sexo = 'Femenino';
} elseif ($fila->Sexo == 3) {
    $sexo = 'Otro';
}

$sexualidad = $dom->createElement("Sexo");
$datos->appendChild($sexualidad);

$text = $dom->createTextNode($sexo);
$fnac->appendChild($text);

$ciudad = $dom->createElement("Ciudad");
$datos->appendChild($ciudad);

$text = $dom->createTextNode($fila->Ciudad);//VALOR DE CIUDAD
$ciudad->appendChild($text);

$pais = $dom->createElement("Pais");
$datos->appendChild($pais);

$text = $dom->createTextNode($fila->NomPais);
$pais->appendChild($text);

$freg = $dom->createElement("FechaRegistro");
$datos->appendChild($freg);

$text = $dom->createTextNode($fila->FRegistro);
$freg->appendChild($text);

///////////////// FIN DATOS USUARIO /////////////////

// ALBUM NAME
//        |--------> foto
//
// todos los albumos de un idUsuario => SELECT * FROM albumes a JOIN usuarios u WHERE a.Usuario = u.IdUsuario AND a.Usuario = 1
// todas las fotos de un idAlbum => SELECT * FROM albumes a JOIN fotos f WHERE a.IdAlbum = f.Album AND a.IdAlbum = 1

$sentencia = 'SELECT * FROM albumes a JOIN usuarios u WHERE a.Usuario = u.IdUsuario AND u.Email = "'.$_SESSION["user"].'"';
if(!($resultado = $mysqli->query($sentencia))) {
    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
    echo '</p>';
    exit;
}
while ($fila = $resultado->fetch_object()) {

    //albumes
    $albumes = $dom->createElement("Albumes");
    $datos->appendChild($albumes);

    $album = $dom->createElement("Album");
    $albumes->appendChild($album);
    $album->setAttribute('idfoto', $fila->IdAlbum);

    $tituloalbum = $dom->createElement("titulo");
    $album->appendChild($tituloalbum);

    $text = $dom->createTextNode($fila->Titulo);
    $tituloalbum->appendChild($text);

    $descripcionalbum = $dom->createElement("Descripcion");
    $album->appendChild($descripcionalbum);

    $text = $dom->createTextNode($fila->Descripcion);
    $descripcionalbum->appendChild($text);

    $id_album = $fila->IdAlbum;

    $sentencia = 'SELECT * FROM albumes a JOIN fotos f JOIN paises p WHERE a.IdAlbum = f.Album AND f.Pais = p.IdPais AND a.IdAlbum = '.$id_album;
    if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }
    while ($fila = $resultado->fetch_object()) {

        //Fotos
        $foto = $dom->createElement("foto");
        $album->appendChild($foto);
        $foto->setAttribute('idfoto', $fila->IdFoto);

        $titulo = $dom->createElement("titulo");
        $foto->appendChild($titulo);

        $text = $dom->createTextNode($fila->Titulo);
        $titulo->appendChild($text);

        $pais = $dom->createElement("pais");
        $foto->appendChild($pais);

        $text = $dom->createTextNode($fila->NomPais);
        $pais->appendChild($text);

        $alter = $dom->createElement("alternativo");
        $foto->appendChild($alter);

        $text = $dom->createTextNode($fila->Alternativo);
        $alter->appendChild($text);

        $link = $dom->createElement("link");
        $foto->appendChild($link);

        $url = "http://localhost/daw-destello/detalle_foto.php?id=$fila->IdFoto";

        $text = $dom->createTextNode($url);
        $link->appendChild($text);

        $fecha = $dom->createElement("fecha");
        $foto->appendChild($fecha);

        $text = $dom->createTextNode($fila->FRegistro);
        $fecha->appendChild($text);

    }

    //SELECT * FROM solicitudes s JOIN albumes a WHERE s.Album = a.IdAlbum AND a.IdAlbum = 1
    $sentencia = 'SELECT * FROM solicitudes s JOIN albumes a WHERE s.Album = a.IdAlbum AND a.IdAlbum = '.$id_album;
    if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }
    while ($fila = $resultado->fetch_object()) {

        //solicitudes
        $solicitudes = $dom->createElement("Solicitudes");
        $album->appendChild($solicitudes);

        $solicitud = $dom->createElement("Solicitud");
        $solicitudes->appendChild($solicitud);
        $solicitud->setAttribute('idsolicitud', $fila->IdSolicitud);

        $titulosol = $dom->createElement("Titulo");
        $solicitud->appendChild($titulosol);

        $text = $dom->createTextNode($fila->Titulo);
        $titulosol->appendChild($text);

        $descripcionsol = $dom->createElement("Descripcion");
        $solicitud->appendChild($descripcionsol);

        $text = $dom->createTextNode($fila->Descripcion);
        $descripcionsol->appendChild($text);

        $direccion = $dom->createElement("Direccion");
        $solicitud->appendChild($direccion);

        $text = $dom->createTextNode($fila->Direccion);
        $direccion->appendChild($text);

        $color = $dom->createElement("Color");
        $solicitud->appendChild($color);

        $text = $dom->createTextNode($fila->Color);
        $color->appendChild($text);

        $copias = $dom->createElement("Copias");
        $solicitud->appendChild($copias);

        $text = $dom->createTextNode($fila->Copias);
        $copias->appendChild($text);

        $resolucion = $dom->createElement("Resolucion");
        $solicitud->appendChild($resolucion);

        $text = $dom->createTextNode($fila->Resolucion);
        $resolucion->appendChild($text);

        $fechaentrega = $dom->createElement("FechaEntrega");
        $solicitud->appendChild($fechaentrega);

        $text = $dom->createTextNode($fila->Fecha);
        $fechaentrega->appendChild($text);

        $IColor = $dom->createElement("IColor");
        $solicitud->appendChild($IColor);

        $text = $dom->createTextNode($fila->IColor);
        $IColor->appendChild($text);

        $FRegistro = $dom->createElement("Registro");
        $solicitud->appendChild($FRegistro);

        $text = $dom->createTextNode($fila->FRegistro);
        $FRegistro->appendChild($text);

        $Coste = $dom->createElement("Coste");
        $solicitud->appendChild($Coste);

        $text = $dom->createTextNode($fila->Coste);
        $Coste->appendChild($text);

    }

}



// save and display tree
$dom->save("perfilrss.xml");

//echo $dom->save("perfilrss.xml");
header("Location: http://localhost/daw-destello/perfilrss.xml");

?>
