<?php
//incluyo el archivo con toda la informacion para conectarme a la base
require_once("conexion.php");

//Verificamos que venga un id de cliente
if(isset($id) && $id > 0)
{
	//Buscamos los datos del cliente
	$cadena="SELECT * FROM CLIENTES WHERE ID=" . $id . ";";
	$rs=$db->Execute($cadena);	
	
	//verificamos que haya encontrado algo.
	if($rs->RecordCount() == 1)
	{
		$nombre=$rs->Fields('NOMBRE');
		$apellido=$rs->Fields('APELLIDO');
		$direccion=$rs->Fields('DIRECCION');
		$telefono=$rs->Fields('TELEFONO');
		$email=$rs->Fields('EMAIL');
		
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ejemplo de Clientes</title>
<link href="estilos.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="main_table">
      <tr>
        <td class="titulo_menu"><strong>Clientes</strong></td>
      </tr>
      <tr onMouseOver="this.bgColor='#CCCCCC';" onMouseOut="this.bgColor='#FFFFFF';">
        <td class="item_menu"><a href="nuevo.html">Nuevo</a></td>
      </tr>
      <tr onMouseOver="this.bgColor='#CCCCCC';" onMouseOut="this.bgColor='#FFFFFF';">
        <td class="item_menu"><a href="listar.php">Listar</a></td>
      </tr>
      
      
    </table></td>
    <td align="center" class="obli"><form action="actualizar.php" method="post" enctype="multipart/form-data" name="nuevo_cliente" id="nuevo_cliente">
      <table width="400" border="0" align="center" cellpadding="0" cellspacing="0" class="main_table">
        <tr>
          <td colspan="2" class="titulo_menu">Modificar Cliente </td>
        </tr>
        <tr>
          <td class="celda_frm">Nombre</td>
          <td class="celda_txt"><input name="nombre" type="text" class="txt" id="nombre" value="<?php echo $nombre; ?>"></td>
        </tr>
        <tr>
          <td class="celda_frm">Apellido</td>
          <td class="celda_txt"><input name="apellido" type="text" class="txt" id="apellido" value="<?php echo $apellido; ?>"></td>
        </tr>
        <tr>
          <td class="celda_frm">Direcci&oacute;n</td>
          <td class="celda_txt"><input name="direccion" type="text" class="txt" id="direccion" value="<?php echo $direccion; ?>"></td>
        </tr>
        <tr>
          <td class="celda_frm">Tel&eacute;fono</td>
          <td class="celda_txt"><input name="telefono" type="text" class="txt" id="telefono" value="<?php echo $telefono; ?>"></td>
        </tr>
        <tr>
          <td class="celda_frm">E-mail</td>
          <td class="celda_txt"><input name="email" type="text" class="txt" id="email" value="<?php echo $email; ?>"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="id" type="hidden" id="id" value="<?php echo $id; ?>"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="Submit" type="submit" class="txt" value="Actualizar"></td>
        </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
</body>
</html>


<?php
		//cierro el recordset
		$rs->Close();
	}
	else
	{
		header("location:listar.php");		
	}
}
else
{
	header("location:listar.php");	
}

//cierro la conexion
$db->Close();

?>
