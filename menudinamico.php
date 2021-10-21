<?php
include_once('conexion.php');

$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");

session_start();
if (isset($_SESSION['clave'])) {
	$clave_ses = $_SESSION['clave'];
	
	echo "";
}else{
	header("Location: navegacion.php");
	exit();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Menú</title>
<style type="text/css">
<!--

body{

background: #C5DCF5;
}

#Layer1 {
	position:absolute;
	left:15px;
	top:13px;
	width:1098px;
	height:687px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:28px;
	top:30px;
	width:300px;
	height:552px;
	z-index:2;
}
#Layer3 {
	position:absolute;
	left:343px;
	top:28px;
	width:770px;
	height:130px;
	z-index:3;
	text-align:center;
}
#Layer4 {
	position:absolute;
	left:341px;
	top:159px;
	width:759px;
	height:520px;
	z-index:4;
}
#Layer5 {
	position:absolute;
	left:385px;
	top:183px;
	width:152px;
	height:149px;
	z-index:5;
}
.table{
	background: #DDF5C5;
}
-->
</style>
</head>

<body>
<!-- Consulta que permite seleccionar Los Nombres y Apellidos del Cliente -->
		<?php
         
		 $clave = isset($_GET['cla']) ? $_GET['cla'] : '';
		 
		 $consulta="SELECT $bd.usuarios.nombre AS nombre,$bd.usuarios.apellido AS apellido, $bd.actividades.nom_actividad AS actividad, $bd.actividades.id_actividad AS idAct, $bd.actividades.enlace AS enlace FROM $bd.usuarios,$bd.actividades,$bd.perfiles,$bd.gestActividad WHERE $bd.gestActividad.id_perfil = $bd.perfiles.id_perfil AND $bd.gestActividad.id_actividad = $bd.actividades.id_actividad AND $bd.perfiles.id_perfil = $bd.usuarios.id_perfil AND $bd.usuarios.clave = '$clave_ses'";
         $resultado = mysqli_query($con,$consulta) or die(mysql_error());
				   
        ?>
		<!-- Consulta que permite seleccionar Los Datos de la venta -->


<div id="Layer1"></div>
<div id="Layer2">
     <table class="table table-bordered" border="1">
                <tr>
                    <th class="text-center">Menu</th>
                </tr>
                <?php
                while($fila = mysqli_fetch_array($resultado)){
                ?>
                <tr>
                    <td class="text-center"width="300" height="45"><?php echo '<a href="'.$fila['enlace'].'?id='.$fila['idAct'].'" target="centro">'.$fila['actividad'].'</a>';?></td>
					<?php $nom=$fila['nombre']; ?>
					<?php $ape=$fila['apellido']; ?>
              </tr>
                <?php 
				}
				$nom_usu = $nom;
				$ape_usu = $ape;
								
				 mysqli_close($con);  
			    ?>           
  </table>
</div>

<div id="Layer3">
  <table class=table width="760" height="102" border="1">
    <tr>
      <td><h1>Bienvenido</h1></td>
    </tr>
    <tr>
      <td><table width="758" border="1">
        <tr>
		  <td width="40">Usuario:</td>
          <td width="594"><?php echo $nom_usu; ?>&nbsp;<?php echo $ape_usu; ?></td>
          <td width="122"><a href="cerrar.php">Salir</a></td
        </tr>
      </table></td>
    </tr>
  </table>
</div>
<div id="Layer4" class=table >
  <iframe  height="520" width="760" name="centro"></iframe>
  
</div>
</body>
</html>
