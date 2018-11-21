<?php
include("sesionstart.php");
$mysqli = @new mysqli(
        'localhost',   // El servidor
        'root',    // El usuario
        '',          // La contraseña
        'pibd'); // La base de datos

if($mysqli->connect_errno) {
  echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
  echo '</p>';
  exit;
}

// Ejecuta una sentencia SQL
/*$sentencia = 'SELECT * FROM Usuarios';
if(!($resultado = $mysqli->query($sentencia))) {
  echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
  echo '</p>';
  exit;
}*/
$sentencia = 'SELECT Fichero FROM usuarios, estilos WHERE usuarios.Estilo = estilos.IdEstilo AND Email LIKE "'.$_SESSION["user"].'"';
if(!($resultado = $mysqli->query($sentencia))) {
  echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
  echo '</p>';
  exit;
}else{
  $style = $resultado->fetch_assoc();
  echo $sentencia;
  echo $style["Fichero"];
  echo' <link rel="stylesheet" tittle="estilo general" href="css/'.$style["Fichero"].'">';
}




/*
echo 'forma 1';
echo '<table><tr>';
echo '<th>IdUsuario</th><th>NomUsuario</th><th>Email</th>';
echo '</tr>';
// Recorre el resultado y lo muestra en forma de tabla HTML
while($fila = $resultado->fetch_assoc()) {
  echo '<tr>';

  echo '<td>' . $fila['Fichero'] . '</td>';

  echo '</tr>';
}
echo '</table>';

// Ejecuta una sentencia SQL
$sentencia = 'SELECT * FROM Usuarios';
if(!($resultado = $mysqli->query($sentencia))) {
  echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
  echo '</p>';
  exit;
}
echo 'forma 2';
echo '<table><tr>';
echo '<th>IdUsuario</th><th>NomUsuario</th><th>Email</th>';
echo '</tr>';
// Recorre el resultado y lo muestra en forma de tabla HTML
while($fila = $resultado->fetch_object()) {
  echo "<tr>";
  echo "<td>$fila->IdUsuario</td>";
  echo "<td>$fila->NomUsuario</td>";
  echo "<td>$fila->Email</td>";
  echo "</tr>";
}
echo '</table>';
*/
// Libera la memoria ocupada por el resultado
$resultado->close();
// Cierra la conexión
$mysqli->close();


 ?>
