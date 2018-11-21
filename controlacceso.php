<?php
    include("sesionstart.php");

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

    if(isset($_COOKIE["c_email"]) && isset($_COOKIE["c_pass"])){
        $flag = true;
        for ($i=0; $i < 4; $i++) {
          if($users[$i] == $_COOKIE["c_email"] && $passw[$i] == $_COOKIE["c_pass"]) {
              $_SESSION["user"] = $_COOKIE["c_email"];
              $_SESSION["pass"] = $_COOKIE["c_pass"];
              $flag = false;
              /*$host = $_SERVER['HTTP_HOST'];
              $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');*/
              $extra = 'mi_perfil.php';
              /*header("Location: $host$uri/$extra?user=$user&pass=$pass");*/
              header('Location: $extra?user='.$_COOKIE["c_email"].'&pass='.$_COOKIE["$c_pass"]);
              break;
          }
        }
        if($flag) {
            include("cerrar_sesion.php");
            header("Location: index.php?err_ini");
        }
    }
    elseif(isset($_POST["input_email"]) && isset($_POST["input_pass"])){   /*Post*/
        $user = $_POST["input_email"];
        $_SESSION["user"] = $user;

        $pass = $_POST["input_pass"];

        $_SESSION["style"] = -1;
        if($user == $usu1) {
            $_SESSION["style"] = 1;
        }

        if(isset($_POST["remember"])){
            $remember = $_POST["remember"];
        }

        if (isset($remember) && $remember == "on") {
            $c_email = $user;
            $c_pass = $pass;
            setcookie("c_email", $c_email, time() + (86400 * 90), "/"); // 86400 = 1 day
            setcookie("c_pass", $c_pass, time() + (86400 * 90), "/"); // 86400 = 1 day
            $_SESSION["last_con"] = date("Y/m/d h:i");
            setcookie("last_con", $_SESSION["last_con"], time() + (86400 * 90), "/"); // 86400 = 1 day
            setcookie("style", $_SESSION["style"], time() + (86400 * 90), "/"); // 86400 = 1 day

        }
    }

    //$_SESSION["flag_home"] = 1;


    $flag = true;
    for ($i=0; $i < 4; $i++) {
      if($users[$i] == $user && $passw[$i] == $pass) {
          $flag = false;
          /*$host = $_SERVER['HTTP_HOST'];
          $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');*/
          $extra = 'mi_perfil.php';
          /*header("Location: $host$uri/$extra?user=$user&pass=$pass");*/
          header("Location: $extra?user=$user&pass=$pass");
          break;
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
