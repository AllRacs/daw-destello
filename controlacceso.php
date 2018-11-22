<?php
    include("sesionstart.php");
    $flag = true;
    if(isset($_POST["input_email"]) && isset($_POST["input_pass"])){   /*Post*/
        $user = $_POST["input_email"];
        $_SESSION["user"] = $user;

        $pass = $_POST["input_pass"];

        if(isset($_POST["remember"])){
            $remember = $_POST["remember"];
        }

        if (isset($remember) && $remember == "on") {
            setcookie("c_email", $user, time() + (86400 * 90), "/"); // 86400 = 1 day
            setcookie("c_pass", $pass, time() + (86400 * 90), "/"); // 86400 = 1 day
            $_SESSION["last_con"] = date("Y/m/d h:i");
            setcookie("last_con", $_SESSION["last_con"], time() + (86400 * 90), "/"); // 86400 = 1 day
            setcookie("style", $_SESSION["style"], time() + (86400 * 90), "/"); // 86400 = 1 day
        }

        $sentencia = 'SELECT * FROM usuarios u where u.Email like "'.$_POST["input_email"].'"';
        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }

        // Recorre el resultado y lo muestra en forma de tabla HTML
        $fila = $resultado->fetch_assoc();
        if($fila['Email'] == $_POST["input_email"] && $fila['Clave'] == $_POST["input_pass"]){
            $flag_fin = true;
            $_SESSION["user"] = $user;
            $_SESSION["pass"] = $pass;
            $_SESSION["flag_home"] = 0;
        }

        if($_SESSION["user"] == $user && $_SESSION["pass"] == $pass) {
            $flag = false;
            /*$host = $_SERVER['HTTP_HOST'];
            $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');*/
            $extra = 'mi_perfil.php';
            /*header("Location: $host$uri/$extra?user=$user&pass=$pass");*/
            header("Location: $extra?user=$user&pass=$pass");
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
