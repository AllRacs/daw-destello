<?php
    include("sesionstart.php");
    /*Post*/
    $user = $_POST["input_email"];
    $_SESSION["email"] = $user;
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


    $user_login = "user";
    $user_email = $user;
    setcookie($user_login, $cookie_value, time() + (86400 * 90), "/"); // 86400 = 1 day

    if(!isset($_COOKIE[$user_login])) {
        echo "Cookie named '" . $user_login . "' is not set!";
    } else {
        echo "Cookie '" . $user_login . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$user_login];
    }

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
