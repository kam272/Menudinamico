<?php
include_once('conexion.php');

$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position:absolute;
	left:588px;
	top:161px;
	width:213px;
	height:114px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:610px;
	top:57px;
	width: 220px;
	height:61px;
	z-index:2;
}
</style>
</head>

<body>
<div id="apDiv1">
   <form id="Ingresar"  method="post" action="validar.php">
    <table width="200" border="1">
      <tr>
        <td>Usuario</td>
        <td><label for="cuser"></label>
        <input name="cuser" type="text" id="cuser" size="20" /></td>
      </tr>
      <tr>
        <td>Contraseña</td>
        <td><label for="cpass"></label>
        <input name="cpass" type="password" id="cpass" size="20" /></td>
      </tr>
    </table>
    <p>
      <input type="submit" name="Ingresar" id="button" value="Validar" />
    </p>
  </form>
</div>
<div id="apDiv2"><strong><h1>Inicio de sesión</h1></strong></div>
</body>
</html>