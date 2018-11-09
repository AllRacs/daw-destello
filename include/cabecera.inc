<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Spark - Fotos, fotos y m&aacute;s fotos</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto|Charmonman" rel="stylesheet">
        <link rel="stylesheet" href="css/general.css">
        <?php
        if((isset($_COOKIE["style"]) && $_COOKIE["style"] == 1) || (isset($_SESSION["style"]) && $_SESSION["style"] == 1)){
            echo <<<GG
            <link rel="stylesheet" title="estilo accesible" href="css/accesibilidad.css">
GG;
        }
        ?>
        <link rel="stylesheet" href="css/print.css">
        <link rel="stylesheet" href="css/main_indexANDdetalle_foto.css">
        <link rel="stylesheet" href="css/fontello.css">
    </head>
