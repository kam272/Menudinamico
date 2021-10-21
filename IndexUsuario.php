
<?php
include_once('conexion.php');

$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");

session_start();
if (isset($_SESSION['clave'])) {
	$clave_ses = $_SESSION['clave'];
	
	echo "";
}else{
	header("Location: index.php");
	exit();
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">

body{
	background: #A0E6DB;
}

#apDiv1 {
	position:absolute;
	left:350px;
	top:5px;
	width:800px;
	height:31px;
	z-index:1;
	text-align:center;
	background: #85C1E9;
}
#apDiv2 {
	position:absolute;
	left:534px;
	top:58px;
	width:1px;
	height:0px;
	z-index:2;
	text-align:center;
}
#apDiv3 {
	position:absolute;
	left:350px;
	top:200px;
	width:800px;
	height:119px;
	z-index:2;
	text-align:center;
	background: #85C1E9;

}
#apDiv4 {
	position:absolute;
	left:540px;
	top:107px;
	width:426px;
	height:31px;
	z-index:2;
	text-align:center;
	background: #85C1E9;
}
#apDiv5 {
	position:absolute;
	left:500px;
	top:25px;
	width:500px;
	height:42px;
	z-index:3;
	text-align:center;
	
}

#apDiv6 {
	position:absolute;
	left:300px;
	top:350px;
	width:900px;
	height:42px;
	z-index:3;
	text-align:center;
	
}

</style>
</head>

<body>

<?php
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
$consulta = "SELECT * from $bd.usuarios where clave = '$clave_ses' ";
$resultado = mysqli_query($con, $consulta);
while($fila = mysqli_fetch_assoc($resultado))
 {
$nom=$fila['nombre'];
$ape=$fila['apellido'];
$docu=$fila['id'];
}
$nom_usu = $nom." ".$ape;
//$documento = $docu;
?>



<div id= "apDiv1">
<table width="800" height="31" border="1">
    <tr>
      <td width="200">Item 1</td>
      <td width="200">Item 1</td>
	  <td width="200">Item 1</td>
      <td width="200">Item 1</td>
    </tr>
  </table>
</div>

<div id="apDiv4">
  <table width="426" height="31" border="1">
    <tr>
	<td width="16">Bienvenido:</td>
      <td width="300"><?php echo $nom_usu; ?></td>
      <td width="100"><a href="cerrar.php">Cerrar sesión</a></td>
    </tr>
  </table>
</div>
<div id="apDiv5"><h1>Administrador</h1></div>


<div id= "apDiv3">
<table width="800" height="100" border="1" >
    <tr>
      <td width="200" height="50"><a href="tablausuarios.php" target="marco">Usuarios</a></td>
      <td width="200" height="50">Acción 2</td>
	  <td width="200" height="50">Acción 3</td>
      <td width="200" height="50">Acción 4</td>
    </tr>
	<tr>
      <td width="200" height="50">Acción 5</td> 
      <td width="200" height="50">Acción 6</td>
	  <td width="200" height="50">Acción 7</td>
      <td width="200" height="50">Acción 8</td>
    </tr>
  </table>

</div>
<div id="apDiv6">
<iframe width="900px" height="721.6px" name="marco" src="" frameborder="0"  allowfullscreen></iframe>
</div>

</body>
</html>
