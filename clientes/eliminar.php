<?php
//incluyo el archivo con toda la informacion para conectarme a la base
require_once("conexion.php");

//Verificamos que venga un id de cliente
if(isset($id) && $id > 0)
{
	//Eliminamos el cliente.
	$cadena="DELETE FROM CLIENTES WHERE ID=" . $id . ";";
	$db->Execute($cadena);	
}

//cierro la conexion
$db->Close();

header("location:listar.php");
?>
