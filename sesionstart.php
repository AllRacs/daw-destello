<?php session_start();

$mysqli = @new mysqli(
    'localhost',   // El servidor
    'root',    // El usuario
    '',          // La contraseña
    'pibd'); // La base de datos

    $flag_fin = false;
    if(isset($_COOKIE["c_email"]) && isset($_COOKIE["c_pass"])){
        //si devuelve error se acaba el script
        if($mysqli->connect_errno) {
            echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
            echo '</p>';
            exit;
        }

        // Ejecuta una sentencia SQL
        $sentencia = 'SELECT * FROM Usuarios';
        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }
        // Recorre el resultado y lo muestra en forma de tabla HTML
        while($fila = $resultado->fetch_assoc()) {
            if($fila['Email'] == $_COOKIE["c_email"]){
                $flag_fin = true;
                if(!isset($_SESSION["user"]))
                $_SESSION["user"] = $_COOKIE["c_email"];
                if(!isset($_SESSION["pass"]))
                $_SESSION["pass"] = $_COOKIE["c_pass"];
                if(!isset($_SESSION["flag_home"]))
                $_SESSION["flag_home"] = 0;
                if(!isset($_SESSION["last_con"]))
                $_SESSION["last_con"] = $_COOKIE["last_con"];
                break;
            }
        }
    }

    if(!$flag_fin && isset($_COOKIE["c_email"]) && isset($_COOKIE["c_pass"]) && isset($_COOKIE["last_con"]) && isset($_COOKIE["style"])){
        setcookie("c_email", $_COOKIE["c_email"], time() - (86400 * 90), "/"); // 86400 = 1 day
        setcookie("c_pass", $_COOKIE["c_pass"], time() - (86400 * 90), "/"); // 86400 = 1 day
        setcookie("last_con", $_COOKIE["last_con"], time() - (86400 * 90), "/"); // 86400 = 1 day
        //setcookie("flag_home", $_SESSION["flag_home"], time() - (86400 * 90), "/"); // 86400 = 1 day

        session_unset();
        session_destroy();
    }

    ?>
