<?
//incluyo el archivo principal de abodb
require_once("adodb/adodb.inc.php");

//Datos para la conexion a la base de datos
$ser = "localhost"; //por lo general es localhost
$usr = "practicos"; // usuario de la base de datos
$pas = "ubp2006"; // password de la base de datos
$dbsel ="practicos"; // nombre de la base de datos

//creo una instanacia de adodb para tipo de base de dato mysql 
$db = NewADOConnection("mysql"); //aca es donde se especifica el tipo de la base de datos.

//conecto a la base de datos.
$db->PConnect($ser, $usr, $pas, $dbsel); // los atributos con (servidor,usuario,password,base)

if(!$db)
{
	echo "Se produjo un error intentando conectar con la base de datos";
	exit();	
}

?>
