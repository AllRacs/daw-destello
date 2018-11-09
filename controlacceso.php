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

    $_SESSION["style"] = -1;
    if($user == $usu1) {
        $_SESSION["style"] = 1;
    }
    if(isset($_POST["remember"])){
        $remember = $_POST["remember"];
    }
    $last_con = "last_con";
    $flag_home = "flag_home";
    if (isset($remember) && $remember == "remember") {
        $c_email = $user;
        $c_pass = $pass;
        setcookie($c_email, $c_pass, time() + (86400 * 90), "/"); // 86400 = 1 day
        $_SESSION["last_con"] = date("Y/m/d h:i");
        setcookie($last_con, $_SESSION["last_con"], time() + (86400 * 90), "/"); // 86400 = 1 day
        /*$_SESSION["flag_home"] = true;
        setcookie($flag_home, $_SESSION["flag_home"], time() + (86400 * 90), "/");*/ // 86400 = 1 day
    }


    $flag = true;
    for ($i=0; $i < 4; $i++) {
      if($users[$i] == $user && $passw[$i] == $pass) {
          $flag = false;
          /*$host = $_SERVER['HTTP_HOST'];
          $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');*/
          $extra = 'mi_perfil.php';
          /*header("Location: $host$uri/$extra?user=$user&pass=$pass");*/
          header("Location: $extra?user=$user&pass=$pass");
          exit;
      }
    }
    if($flag) {
        include("cerrar_sesion.php");
        header("Location: index.php?err_ini");
    }


    /* Redirecciona a una página diferente que se encuentra en el directorio actual *
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
    header("Location: $host$uri/$extra");*/
 ?>
