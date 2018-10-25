<?php
    /*
No es una página visible. Controla el acceso a la parte privada para los usuarios registrados.
Por ahora, se debe limitar el acceso a cuatro posibles usuarios cuyos datos (nombre de usuario, contraseña) están almacenados directamente en esta página
(en una próxima práctica se accederá a una base de datos para consultar los usuarios permitidos).
Si el usuario está registrado, mediante una redirección en la parte del servidor se debe mostrar la página con el menú de usuario registrado;
 si el usuario no está registrado, mediante una redirección en la parte del servidor se debe mostrar la página principal del sitio web con un mensaje de error que explique al usuario lo que ha pasado.
    */
    /*Post*/
    $user = $_POST["input_email"];
    $pass = $_POST["input_pass"];
    $usu1 = "usu1@aaa";
    $usu2 = "usu2@aaa";
    $usu3 = "usu3@aaa";
    $usu4 = "usu4@aaa";
    $pass1 = "a";
    $pass2 = "aa";
    $pass3 = "aaa";
    $pass4 = "aaaa";
    $err_ini = "bien";
    if(($user == $usu1 && $pass == $pass1)||($user == $usu2 && $pass == $pass2)||($user == $usu3 && $pass == $pass3)||($user == $usu4 && $pass == $pass4)){
        /*redirect a index normal, cambiar header mostrando el boton de perfil*/
        header("Location: mi_perfil.php");
        printf ($err_ini);
        exit;
    } else {
        header("Location: index.php");
        /*mostrar mensaje de error*/
        $err_ini = "mal";
        exit;
    }

    /* Redirecciona a una página diferente que se encuentra en el directorio actual *
    $host = $_SERVER[’HTTP_HOST’];
    $uri  = rtrim(dirname($_SERVER[’PHP_SELF’]), ’/\\’);
    $extra = ’index.php’;
    header("Location: $host$uri/$extra");*/
 ?>
