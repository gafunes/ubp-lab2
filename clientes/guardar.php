<?php
//incluyo el archivo con toda la informacion para conectarme a la base
require_once("conexion.php");

//Busco el id de cliente mas grande para luego sumarle 1 y obtener el nuevo ID
$cadena="SELECT MAX(ID) as ID FROM CLIENTES;";
$rs=$db->Execute($cadena);
$nuevo_id=$rs->Fields('ID') + 1;

//guardo el registro en la base de datos.
$cadena="INSERT INTO CLIENTES VALUES(". $nuevo_id .",'". $nombre ."','". $apellido ."','". $direccion ."','". $telefono ."','". $email ."');";
$db->Execute($cadena);

//cierro la conexion
$db->Close();

//imprimimos codigo que muestra mensaje de ok y despues de aceptar el mensaje se  redirecciona a lista.php
$codigo="
<html>
	<head>
		<title>
			Operacion Exitosa
		</title>
		<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=listar.php\">
	</head>
	<body>
		<script>
			alert(\"EL cliente se guardo con exito\");
		</script>
	</body>
</html>
";
echo $codigo;
?>
