<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ejemplo de Clientes</title>
<link href="estilos.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function eliminar(id)
{
	var eliminar = confirm("Esta por ELIMINAR un cliente.\n¿ Esta seguro que desea continuar ?");
	if ( eliminar )
	{
		location.href="eliminar.php?id="+id;
	}		
}
</script>
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
    <td align="center" class="obli">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="main_table">
        <tr>
          <td colspan="7" class="titulo_menu">Listado de Clientes </td>
        </tr>
        <tr>
          <td class="titulo_menu">Nombre</td>
          <td class="titulo_menu">Apellido</td>
          <td class="titulo_menu">Direccion</td>
          <td class="titulo_menu">Telefono</td>		  		  
          <td class="titulo_menu">Email</td>
          <td class="titulo_menu">Eliminar</td>
          <td class="titulo_menu">Modificar</td>		  
        </tr>
<?php
//incluyo el archivo con toda la informacion para conectarme a la base
require_once("conexion.php");

//Busco todos los clientes
$cadena="SELECT * FROM CLIENTES ORDER BY NOMBRE ASC,APELLIDO ASC;";
$rs=$db->Execute($cadena);

//Verifioc cuando registros de devolvio la consulta. si es > 0 es porque hay al menos 1.
if($rs->RecordCount() > 0)
{
	//Recorremos todo el recordset y vamos mostrando los clientes.
	while(!$rs->EOF)
	{
		$texto="        <tr>
          <td class='celda_listado'>" .  $rs->Fields('NOMBRE') . "</td>
          <td class='celda_listado'>" .  $rs->Fields('APELLIDO') . "</td>
          <td class='celda_listado'>" .  $rs->Fields('DIRECCION') . "</td>
          <td class='celda_listado'>" .  $rs->Fields('TELEFONO') . "</td>
          <td class='celda_listado'>" .  $rs->Fields('EMAIL') . "</td>		  		  
          <td class='celda_listado'><a href='javascript:eliminar(" .  $rs->Fields('ID') . ");'> Eliminar </a></td>
          <td class='celda_listado'><a href='modificar.php?id=" .  $rs->Fields('ID') . "'> Modificar </a></td>		  
        </tr>";
		echo $texto;
		$rs->MoveNext();
	}
}
else
{
	echo "<tr><td class='celda_listado' colspan='7'>No hay cliente cargados en la base de datos</td></tr>";
}

//cierro el recordset
$rs->Close();

//cierro la conexion
$db->Close();

?>		
      </table>

    </td>
  </tr>
</table>
</body>
</html>


