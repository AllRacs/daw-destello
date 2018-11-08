<?php 
session_start();

$current_visit = date("c");
setcookie("last",$current_visit, (time()+60*60*24*30));
$partes=explode("-", $last_visit);
$anyo=$partes[0];
$mes=$partes[1];
$partes2=explode("T", $partes[2]);
$dia=$partes2[0];
$partes3=explode("+", $partes2[1]);
$hora=$partes3[0];
				$title="Bienvenid@";
				include("cabecera.php");
				include("inicio_registrado.php");?>
				<style type="text/css">
				.col{display: inline-block;
					margin-right: 30%;
				}
				</style>
				  <div class="contenido">
				    <h2>Bienvenido</h2>
				    <fieldset id="identificarse">
				    <div id="opcionesusuario">
				    <p>Hola <?php echo $_COOKIE['nick'];?>, 
				    	su última visita fue el <?php echo " ".$dia."-".$mes."-".$anyo." "; ?> 
				    	a las <?php echo $hora; ?>.</p>
				    <div>
				    <form action="menu_usuario.php" class="col">
		    			<input type="submit" value="Acceder" />
					</form>
				    <form action="logout.php" class="col">
		    			<input type="submit" value="Salir" />
					</form>
					</div>
				    </div>
				    </fieldset>
				  </div>
				  	



<?php include("pie.php"); ?>