<?php
include_once("conexion.php");

//1. Crear conexi�n a la Base de Datos

$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");

//2. Tomar los campos provenientes del Formulario


$vid = $_POST['cid'];
$vnombre = $_POST['cnombre'];
$vapellido = $_POST['capellido'];
$vusuario = $_POST['cusuario'];
$vclave = $_POST['cclave'];
$vestado = $_POST['cestado'];
$vperfil = $_POST['cperfil'];
             
		   
 if($vid !=null && $vnombre !=null && $vapellido !=null && $vusuario !=null && $vclave !=null && $vestado !=null&& $vperfil !=null){  
 
//3. Insertar campos en la Base de Datos 

$inserta = "INSERT INTO $bd.usuarios (id, nombre, apellido, usuario, clave, id_estado, id_perfil) VALUES ('$vid','$vnombre','$vapellido','$vusuario','$vclave','$vestado','$vperfil');";
           $resultado = mysqli_query($con, $inserta);
echo json_encode ($resultado);

header("location:tablausuarios.php");

}


mysqli_close($con);
?>

