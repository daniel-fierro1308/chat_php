<?php
	session_start();
	if(isset($_SESSION['id']) && isset($_SESSION['usuario'])){
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Chat</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/chat.css">
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
        <script src="js/funciones.js"></script>
        <script src="js/estadoConversacion.js"></script>
        <script src="js/chat.js"></script>
        <script src="js/estadoUsuario.js"></script>
    </head>
	<body>
    	
        	<header>
            	<?php
                	require_once("header/layout.php");
					require_once('funciones/funciones.php');
					require_once('funciones/conexion.php');
				?>
            </header>
            <!--<div class="linkContactos borde-5 centrarTexto borderBox"><a href="contactos.php" style="color:white;">Contactos</a></div>	-->
			
            <div class="contenedorMensajes alinear-horizontal borderBox centrarDiv">
            	<div id="mensajesAjax" class="centrarDiv mensajesAjax"></div>
				<div id="mensajesAjax2" class="centrarDiv alinear-horizontal mensajesAjax2"></div>
            </div>
            <div class="contenedorChat alinear-horizontal borderBox centrarDiv borde-5">
                <?php
					$id=limpiar($con,$_GET['id']);
                	$sql="select usuario from usuarios where id=$id";
					$error="<div class='alert alert-danger'>Error al mostrar el nombre del contacto</div>";
					$usuario=consulta($con,$sql,$error);
					$usuario=mysqli_fetch_assoc($usuario);
                	echo "<div class='centrarTexto'>Tienes una conversación con: <strong>".strtoupper($usuario['usuario']).'</strong></div>';
				?>
                <div class="conversacion centrarDiv" id="conversacion">
                    <span id="src"></span>
                </div>
            	<form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="formChat centrarDiv centrarTexto">
				<div class="form-group">
                    <input type="text" name="mensaje" id="mensaje" placeholder="Ingrese su mensaje aqui" class=" form-control">
					</div>
                	<input type="submit" name="enviar" id="enviar" class="btn btn-primary" role="button" value="Enviar">
                    <input type="hidden" name="idContacto"  id="idContacto" value="<?php $id=limpiar($con,$_GET['id']); echo $id;?>">
                </form>
			</div>
	</body>
</html>
<?php
	}else{
		echo"<h1>Zona disponible solo para usuarios registrados</h1><a href='login.php'>Login</a>";
	}
?>