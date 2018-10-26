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
    $users = array($usu1,$usu2,$usu3,$usu4);
    $pass1 = "a";
    $pass2 = "aa";
    $pass3 = "aaa";
    $pass4 = "aaaa";
    $passw = array($pass1, $pass2, $pass3, $pass4);
    $err_ini = "bien";

    for ($i=0; $i < 4; $i++) {
      if($users[$i] == $user && $passw[$i] == $pass) {
          header('Location: mi_perfil.php?user='.$user.'&pass='.$pass);
          exit;
      } else {
          header("Location: index.php?err_ini");
          /*mostrar mensaje de error*/
          exit;
      }
    }



    /* Redirecciona a una página diferente que se encuentra en el directorio actual *
    $host = $_SERVER[’HTTP_HOST’];
    $uri  = rtrim(dirname($_SERVER[’PHP_SELF’]), ’/\\’);
    $extra = ’index.php’;
    header("Location: $host$uri/$extra");*/
 ?>
