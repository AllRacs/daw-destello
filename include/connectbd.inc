<?php
 // Conecta con el servidor de MySQL
 $mysqli = @new mysqli(
         'localhost',   // El servidor
         'root',    // El usuario
         'toot',          // La contraseña
         'pibd'); // La base de datos

 if($mysqli->connect_errno) {
   echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
   echo '</p>';
   exit; 
 }
 ?>
