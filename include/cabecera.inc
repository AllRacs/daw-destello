<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Spark - Fotos, fotos y m&aacute;s fotos</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto|Charmonman" rel="stylesheet">
        <link rel="stylesheet" href="css/general.css">
        <?php
        /*if((isset($_COOKIE["style"]) && $_COOKIE["style"] == 1) || (isset($_SESSION["style"]) && $_SESSION["style"] == 1)){
            echo <<<GG
            <link rel="stylesheet" title="estilo accesible" href="css/accesibilidad.css">
GG;
        }*/
        if(isset($_SESSION["user"])){
            // SELECT Fichero FROM usuarios, estilos WHERE usuarios.Estilo = estilos.IdEstilo AND Email LIKE '$_SESSION["user"]'
            $sentencia = 'SELECT Fichero, Estilo  FROM usuarios, estilos WHERE usuarios.Estilo = estilos.IdEstilo AND Email LIKE"'.$_SESSION["user"].'"';
            // $sentencia = 'SELECT NomUsuario FROM usuarios WHERE Email = "'.$_SESSION["user"].'"';

            $res = $mysqli->query($sentencia);
            $style = $res->fetch_assoc();
            $_SESSION["estiloid"] = $style["Estilo"];
            echo '<link rel="stylesheet" title="estilo accesible" href="css/'.$style["Fichero"].'">';
        }
        ?>
        <link rel="stylesheet" href="css/print.css">
        <link rel="stylesheet" href="css/main_indexANDdetalle_foto.css">
        <link rel="stylesheet" href="css/fontello.css">
    </head>
    <?php //print ($style["Fichero"]); ?>
