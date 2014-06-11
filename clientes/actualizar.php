<?php
//incluyo el archivo con toda la informacion para conectarme a la base
require_once("conexion.php");

//Verificamos que venga un id de cliente
if(isset($id) && $id > 0)
{
	//Buscamos los datos del cliente a modificar
	$cadena="SELECT * FROM CLIENTES WHERE ID=" . $id . ";";
	$rs=$db->Execute($cadena);	
	
	//verificamos que haya encontrado algo.
	if($rs->RecordCount() == 1)
	{
		$cadena="UPDATE CLIENTES SET NOMBRE='" . $nombre . "',APELLIDO='" . $apellido . "',DIRECCION='" . $direccion . "',TELEFONO='" . $telefono . "',EMAIL='" . $email . "' WHERE ID=$id;";
		$db->Execute($cadena);
	}

}

//cierro la conexion
$db->Close();

header("location:listar.php");
?>

