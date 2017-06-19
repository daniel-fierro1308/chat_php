<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
	<title>chat</title>
</head>
<body>
	
</body>
</html>
<?php
	session_start();
	require_once('../funciones/funciones.php');
	require_once('../funciones/conexion.php');
	if(isset($_POST['enviar'])){
		$mensaje=limpiar($con,$_POST['mensaje']);
		$idUsuario=$_SESSION['id'];
		$idContacto=limpiar($con,$_POST['idContacto']);
		$fecha=date("Y/m/d");
		$hora=date("H:i:s");
		if($mensaje!=''){
			$sql="insert into mensajesChat (mensaje, usuario, contacto, fecha, hora) values ('$mensaje','$idUsuario','$idContacto','$fecha','$hora')";
			$error="<div class='alert alert-danger'>Error al registrar el mensaje</div>";
			$registrar=consulta($con,$sql,$error);
			if($registrar != true){
				echo"<div class='alert alert-danger'>Error al registrar el mensaje</div>";
				//echo"<div class='container' style='margin-bottom:10%'><div class='alert alert-success'>Mensaje enviado</div></div>";
			}
		}else{
			echo"<div class='alert alert-info'>Sin mensaje</div>";
		}
	}//isset($_POST[envar])
?>