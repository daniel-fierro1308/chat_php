<?php
	//CODIGO PARA MOSTRAR SI EL USUARIO ESTA ACTIVO O INACTIVO
	session_start();
	require_once('funciones/funciones.php');
	require_once('funciones/conexion.php');
	if(isset($_SESSION['id']) && isset($_SESSION['usuario'])){
		$sql="select online from usuarios where id='$_SESSION[id]'";
		$error="<div class='container'><div class='alert alert-danger'>Error al seleccionar el estado del usuario</div></div>";
		$buscar=consulta($con,$sql,$error);
		$numRegistros=mysqli_num_rows($buscar);
		if($numRegistros>0 && $numRegistros<2){
			$usuarioEstado=mysqli_fetch_assoc($buscar);
			echo $numRegistros;
		}else{
			echo"<div class='container' align='center'><div class='alert alert-danger'>Error al mostrar el estado</div></div>";
		}
	}else{
		echo"<div class='container' align='center'><div class='alert alert-danger'>No existe peticion</div></div>";	
	}
?>