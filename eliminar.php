
<?php
session_start();
    require_once('funciones/funciones.php');
	require_once('funciones/conexion.php');
     $id = $_SESSION['id'];
     $usuario = $_GET['id'];
    if(!empty($usuario)){
			$sql = "DELETE FROM contactos WHERE usuario = '$_GET[id]' or contacto = '$_GET[id]'";
			$query = mysqli_query($con,$sql);
			if($query){
				print "<script>alert(\"Eliminado exitosamente.\"); window.location='contactos.php';</script>";
				$sql2 = "DELETE FROM  mensajeschat WHERE usuario ='$_GET[id]' or contacto = '$_GET[id]'";
				$query2 = mysqli_query($con,$sql2);
			}else{
				print "<script>alert(\"No se pudo eliminar.\"); window.location='contactos.php';</script>";

			}
}
 ?>

 