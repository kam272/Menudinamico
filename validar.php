<?php
include_once('conexion.php');

//1. Crear conexión a la Base de Datos
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");




if (isset($_POST['Ingresar'])) {
	
	//VARIABLES DEL USUARIO
$usuario = $_POST['cuser'];
$pass = $_POST['cpass'];

//VALIDAR CONTENIDO EN LAS VARIABLES O CAJAS DE TEXTO
if (empty($usuario) | empty($pass)) 
	{
	header("Location: index.php");
	exit();
	}
	
//VALIDANDO EXISTENCIA DEL USUARIO

$consulta = "SELECT * from usuarios where usuario = '$usuario' and clave = '$pass' ";
$resultado = mysqli_query($con, $consulta);
	
	while($fila = mysqli_fetch_assoc($resultado))
    {
	 $usu=$fila['usuario'];	
	 $clav=$fila['clave'];			
		
	}
	
	   
  //Valida Usuario y/Contraseña no coincidentes 
   if (($usu != $usuario) | ($clav != $pass))
	{
	header("Location: index.php");
	exit();
	}else{
		session_start();
		$_SESSION['clave'] = $pass;
		header("Location: menudinamico.php?cla='$pass'");
	}



}
 mysqli_close($con);

?>