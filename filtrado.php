<?php
function filtrado(){

  $result = true; //Variable que dice si esta todo ok o no
  if($_POST['input_name'] < 3 && $_POST['input_name'] > 15){// nombre min 3 y max 15

    $result=false;
    echo 'Tu nombre debería tener entre 3 y 15 carácteres';

  }

  if($_POST['input_calendar']){
    $end = $_POST['input_calendar'];
    $fecha_actual = strtotime(date("Y-m-d H:i:s"));
    $fecha_nacimiento = strtotime($end);

        if($fecha_actual <= $fecha_nacimiento){
          $result = false;
          echo "fecha incorrecta";
        }
  }

  if(!isset($_POST['input_pass_modify'])){// Si viene de registro
    if(strlen($_POST['input_pass']) < 6 && strlen($_POST['input_pass']) > 15){ // entre 6 y 15 solo caracteres ingleses, numeros y subrayado. Min una letra mayuscula, una minuscula y un numero

      $result = false;
      echo 'Tu contraseña debería tener entre 6 y 15 carácteres';

    }

  if(strcmp($_POST['input_pass'], $_POST['input_pass_confirm'])!=0) { //Comprobar que las contraseñas coinciden

    $result = false;
    echo 'Las contraseñas no coinciden';

  }else if(!preg_match('`[a-z]`',$_POST['input_pass'])){ //Comprobar que contiene letra minuscula

    $result = false;
    echo 'Las contraseñas deben contener al menos una letra minuscula';

  }else if(!preg_match('`[A-Z]`',$_POST['input_pass'])){ //Comprobar que contiene letra mayuscula

    $result = false;
    echo 'Las contraseñas deben contener al menos una letra mayuscula';

  }else if(!preg_match('`[0-9]`',$_POST['input_pass'])){ //Comprobar que contiene numero

    $result = false;
    echo 'Las contraseñas deben contener al menos un numero';
  }

} else{ //Si viene de modificar datos

  if(strlen($_POST['input_pass_modify']) < 6 && strlen($_POST['input_pass_modify']) > 15){ // entre 6 y 15 solo caracteres ingleses, numeros y subrayado. Min una letra mayuscula, una minuscula y un numero

    $result = false;
    echo 'Tu contraseña debería tener entre 6 y 15 carácteres';

  }

  if(!preg_match('`[a-z]`',$_POST['input_pass_modify'])){ //Comprobar que contiene letra minuscula

    $result = false;
    echo 'Las contraseñas deben contener al menos una letra minuscula';

  }else if(!preg_match('`[A-Z]`',$_POST['input_pass_modify'])){ //Comprobar que contiene letra mayuscula

    $result = false;
    echo 'Las contraseñas deben contener al menos una letra mayuscula';

  }else if(!preg_match('`[0-9]`',$_POST['input_pass_modify'])){ //Comprobar que contiene numero

    $result = false;
    echo 'Las contraseñas deben contener al menos un numero';
  }
}
  return $result;
}


 ?>
