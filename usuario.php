<?php
	session_start();
	if(isset($_SESSION['usuario']) && isset($_SESSION['id'])){
		require_once('funciones/funciones.php');
		require_once('funciones/conexion.php');
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inicio</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/chat.css">
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
		<script src="js/funciones.js"></script>
    	<script src="js/estadoUsuario.js"></script>
    </head>
	<body>
	<div class="container">
		
            	<?php
                	require_once("header/layout.php");
					require_once('funciones/funciones.php');
				?>

            <div class="espacioUsuario centrarDiv borde-5 borderBox">
        		<?php
					
					if(isset($_POST['confirmarSolicitud'])){
						$id=limpiar($con,$_POST['id']);
						$fecha=date("Y/m/d H:i:s");
						$sql="select * from contactos where usuario=$_SESSION[id] and contacto=$id	";
						$error="<div class='alert alert-danger'>Error al verificar el contacto</div>";
						$contactos=consulta($con,$sql,$error);
						$numContactos=mysqli_num_rows($contactos);
						if($numContactos==0){
							$sql="insert into contactos (usuario,contacto,fecha) values ($_SESSION[id],$id,'$fecha')";
							$error="<div class='alert alert-danger'>Error al registrar el contacto</div>";
							$registrar=consulta($con,$sql,$error);
							if(!$registrar){
								echo"<div class='alert alert-danger'>Error al registrar el usuario</div>";
							}else{
								$sql="delete from solicitudes where usuario=$id and solicitud=$_SESSION[id]";
								$error="<div class='alert alert-danger'>Error al verificar el contacto</div>";
								$contactos=consulta($con,$sql,$error);
								echo"<div class='alert alert-success'>Contacto agregado correctamente</div>";
							}
						}else{
							echo"<div class='alert alert-danger'>Contacto ya registrado</div>";
						}
					}//confimar solicitud
					
					else if(isset($_POST['ignorarSolicitud'])){
								$id=limpiar($con,$_POST['id']);
								$sql="delete from solicitudes where usuario=$id and solicitud=$_SESSION[id]";
								$error="<div class='alert alert-danger'>Error al verificar el contacto</div>";
								$contactos=consulta($con,$sql,$error);
								echo"<div class='alert alert-info'>Solicitud eliminada con exito</div>";
					} // eliminar solicitud

					$sql="select * from contactos where usuario=$_SESSION[id] or contacto=$_SESSION[id]";
					$error="<div class='alert alert-danger'>Error al seleccionar las solicitudes</div>";
					$contactos=consulta($con,$sql,$error);
					$numContactos=mysqli_num_rows($contactos);
				?>
                <div class="noContactos alinear-horizontal borde-5 borderBox centrarTexto">
                	<a href='contactos.php'>Contactos Actualmente: <?php echo $numContactos;?></a>
            	</div>
				<div class="noSolicitudes alinear-horizontal borde-5 borderBox">
				<?php
					$sql="select usuarios.id as usuariosId, usuarios.usuario as usuario, solicitudes.id as solicitudesId, solicitudes.usuario as solicitudesUsuario from solicitudes inner join usuarios on solicitudes.usuario=usuarios.id where solicitud='$_SESSION[id]'";
					$error="<div class='alert alert-danger'>Error al seleccionar las solicitudes</div>";
					$solicitudes=consulta($con,$sql,$error);
					$numSolicitudes=mysqli_num_rows($solicitudes);
					if($numSolicitudes>0){
						$fondo='fondoVerde-1';
					}else{
						$fondo='';
					}
					echo '<div class="centrarTexto alinear-horizontal '.$fondo.'">Solicitudes: '.$numSolicitudes.'</div><br><br>';
					?>
					 </div><!--noSolicitudes-->
					
					<?php
					if($numSolicitudes>0){
						echo '<div class="divSolicitudes borde-5"><h4 class="centrarTexto display-4">Estos usuarios te enviaron solicitud:</h3><br>';
					}
					while($solicitud=mysqli_fetch_assoc($solicitudes)){
						echo  '<div class="divSolicitudes borde-5"><form action="'.$_SERVER['PHP_SELF'].'" method="post" name="formConfirmar" id="formConfirmar" class="formConfirmar borde-5 form-inline">
						<input type="hidden" name="id" value="'.$solicitud['solicitudesUsuario'].'">
						<div class="alinear-horizontal">
						 <div class="form-group">
						<label class="centrarTexto usuario">'.$solicitud['usuario'], '</label>
						<div>
						<input type="submit" name="confirmarSolicitud" id="confirmarSolicitud" value="Confirmar" class="btn btn-secondary form-control botonFormConfirmar" role="button">
						<input type="submit" name="ignorarSolicitud" id="ignorarSolicitud" value="Ignorar" class="btn btn-danger form-control botonFormConfirmar" role="button">
						</div>
						</div>
						</div>
						</form>
						</div>';
					}
				?>
				<div><br></div>
				 <!--divsolicitudes -->
               
            </div><!--espacioUsuario-->
        </div><!--contenedorPrincipal-->
		</div> <!--container-->
	</body>
	<?php
	}
	else{
		echo"<h1>Zona disponible solo para usuarios registrados</h1><a href='login.php'>Login</a>";
	}
?>
</html>
