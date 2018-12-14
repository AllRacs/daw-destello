<?php
function limpia_espacios($cadena){
	$cadena = str_replace(' ', '', $cadena);
	return $cadena;
}

function comprobarficherosubida(){
    $value = null;
    $name = $_FILES['photo']['name'];
    $type = $_FILES['photo']['type'];
    $size = $_FILES['photo']['size'];
    $date = strtotime(date("Y-m-d H:i:s"));

    if (!((strpos($type, "gif") || strpos($type, "jpeg")) || strpos($type, "png")) && ($size < 5000000)) {
        echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif ,.jpg o .png<br><li>se permiten archivos de 5Mb  máximo.</td></tr></table>";
        $value = false;
    }else{
        $tmp = $_FILES["photo"]["tmp_name"];
        $directory= 'img/users/'.$_SESSION['id'].$date.$name.'';
        $directory= limpia_espacios($directory);
        if (move_uploaded_file($tmp, $directory)){
            echo "El archivo ha sido cargado correctamente.";
            $value = 'users/'.$_SESSION['id'].$date.$name.'';
            $value = limpia_espacios($value);
        }else{
            echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
            $value = false;
        }


    }
    return $value;
}

function comprobarficheroperfil(){
    $value = null;
    $name = $_FILES['register']['name'];
    $type = $_FILES['register']['type'];
    $size = $_FILES['register']['size'];
    $date = strtotime(date("Y-m-d H:i:s"));

    if (!((strpos($type, "gif") || strpos($type, "jpeg")) || strpos($type, "png")) && ($size < 5000000)) {
        echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif ,.jpg o .png<br><li>se permiten archivos de 5Mb  máximo.</td></tr></table>";
        $value = false;
    }else{
        $tmp = $_FILES["register"]["tmp_name"];
        $directory= 'img/profile/'.$_POST['input_email'].$date.$name.'';
        $directory = limpia_espacios($directory);
        if (move_uploaded_file($tmp, $directory)){
            echo "<p style='padding-left:1em'>El archivo ha sido cargado correctamente.</p>";
            $value = 'profile/'.$_POST['input_email'].$date.$name.'';
            $value = limpia_espacios($value);
        }else{
            echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
            $value = false;
        }


    }
    return $value;
}


?>
