
<?php
include_once('conexion.php');

$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");

session_start();


?>



<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <title>Perfiles</title>
    <style type="text/css">
    #apDiv1 {
	position:absolute;
	left:268px;
	top:469px;
	width:99px;
	height:29px;
	z-index:1;
 
}

body{

  background: #EBE9E0;
}

    </style>
    </head>
<body>
        <?php
         
		$id1 = isset($_GET['id']) ? $_GET['id'] : '';
		 
		 $consulta="SELECT * FROM $bd.usuarios WHERE id = '$id1'";
		
         $resultado = mysqli_query($con,$consulta) or die(mysql_error());
		       
        ?>
        <div class="container"> 
            
            
         
                <?php
                while($fila = mysqli_fetch_array($resultado)){
					
                ?>
                
  <form id="form1" name="form1" method="post" action="modificar.php">
  <fieldset>
  <legend><h2><center>
    <p>Modificar usuarios</p>
    
  </center></h2></legend>
    <center>
      
      <table width="636" border="0">
      <input name="cid" type="text" id="cid" size="45"  hidden="true" value="<?php echo $fila['id'];?>"/>
      <tr>
        <td>ID: </td>
        <td><label for="cidperfil"></label>
        <input name="cid" type="text" id="cid" size="45" value="<?php echo $fila['id'];?>" disabled/></td>
      </tr>
      
    <tr>
        <td>NOMBRE: </td>
        <td><label for="cnombre"></label>
        <input name="cnombre" type="text" id="cnombre" size="45" value="<?php echo $fila['nombre'];?>" /></td>
      </tr>
      
      <tr>
        <td>APELLIDO: </td>
        <td><label for="cnombre"></label>
        <input name="capellido" type="text" id="capellido" size="45" value="<?php echo $fila['apellido'];?>" /></td>
      </tr>
      <tr>
        <td>USUARIO: </td>
        <td><label for="cusuario"></label>
        <input name="cusuario" type="text" id="cusuario" size="45" value="<?php echo $fila['usuario'];?>" /></td>
      </tr>
       <tr>
        <td>CLAVE: </td>
        <td><label for="clave"></label>
        <input name="clave" type="text" id="clave" size="45" value="<?php echo $fila['clave'];?>" /></td>
      </tr>
      <tr>
        <td><input type="submit" name="actualizar" id="button" value="Actualizar" /></td> 
       
      </tr>
    </table>
      <p>&nbsp;</p>
    </center>
    </fieldset>
</form>   
            <?php 
				}			 
			    ?>           
               
          </table>
      
        </div>
 <?php
//1. Crear el proceso de actualización de los ddatos
//2. Toma los datos provenientes del Formulario y posteriormente los asigna a los campos de tabla en la Base de Datos 
 
  $id1 = isset($_POST['cid']) ? $_POST['cid'] : '';
  $nnombre = isset($_POST['cnombre']) ? $_POST['cnombre'] : '';
  $napellido = isset($_POST['capellido']) ? $_POST['capellido'] : '';
  $nusuario = isset($_POST['cusuario']) ? $_POST['cusuario'] : '';
  $nclave = isset($_POST['clave']) ? $_POST['clave'] : '';
     	
	
if($id1 !=null && $nnombre !=null && $napellido !=null && $nusuario !=null && $nclave !=null){  
		 
$modificar="UPDATE $bd.usuarios SET nombre='$nnombre', apellido = '$napellido', usuario = '$nusuario', clave = '$nclave' WHERE id='$id1'";
$resultado= mysqli_query($con, $modificar);


header("location:modificarusuario.php");	
}

mysqli_close($con);

?>

  
    </body>
</html>
