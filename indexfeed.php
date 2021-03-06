<?php
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

$idioma = $dom->createElement("idioma");
$pagina->appendChild($idioma);

$text = $dom->createTextNode("es");
$idioma->appendChild($text);

include('sesionstart.php'); // conexión a la BBDD
$sentencia = 'SELECT  a.Titulo album, f.alternativo, u.NomUsuario, f.Titulo, f.FRegistro, p.NomPais, f.Fichero, f.IdFoto FROM usuarios u JOIN albumes a JOIN fotos f JOIN paises p
WHERE u.IdUsuario = a.Usuario AND a.IdAlbum = f.Album AND f.Pais = p.IdPais ORDER BY f.FRegistro DESC';
if(!($resultado = $mysqli->query($sentencia))) {
    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
    echo '</p>';
    exit;
}
while ($fila = $resultado->fetch_object()) {

//Contenido

$foto = $dom->createElement("foto");
$pagina->appendChild($foto);
$foto->setAttribute('idfoto', $fila->IdFoto);

$titulo = $dom->createElement("titulo");
$foto->appendChild($titulo);


$text = $dom->createTextNode($fila->Titulo);
$titulo->appendChild($text);

$pais = $dom->createElement("pais");
$foto->appendChild($pais);

$text = $dom->createTextNode($fila->NomPais);
$pais->appendChild($text);

$album = $dom->createElement("album");
$foto->appendChild($album);

$text = $dom->createTextNode($fila->album);
$album->appendChild($text);

$alter = $dom->createElement("alternativo");
$foto->appendChild($alter);

$text = $dom->createTextNode($fila->alternativo);
$alter->appendChild($text);

$link = $dom->createElement("link");
$foto->appendChild($link);

$url = "http://localhost/daw-destello/detalle_foto.php?id=$fila->IdFoto";

$text = $dom->createTextNode($url);
$link->appendChild($text);

$autor = $dom->createElement("autor");
$foto->appendChild($autor);

$text = $dom->createTextNode($fila->NomUsuario);
$autor->appendChild($text);

$fecha = $dom->createElement("fecha");
$foto->appendChild($fecha);

$text = $dom->createTextNode($fila->FRegistro);
$fecha->appendChild($text);

}

// save and display tree
//$dom->save("feedindex.xml");
$dom->save("indexrss.xml");
header("Location: http://localhost/daw-destello/indexrss.xml");

?>
