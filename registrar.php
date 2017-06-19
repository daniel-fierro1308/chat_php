<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registro de usuarios</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/chat.css">
    </head>
	<body>
		
        	<header>
            	<?php
					require_once("header/layout.php");
                ?>
            </header>
        	<?php
				require_once('funciones/funciones.php');
            	if(isset($_POST['registrar'])){
					require_once('funciones/conexion.php');
					if(empty($_POST['usuario']) || empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['password']) || empty($_POST['repe_password'])){
						echo"<div class='container'><div class='alert alert-danger'>Complete todos los campos</div></div>";
					}
					 else if($_POST['password'] != $_POST['repe_password']){
							echo"<div class='container'><div class='alert alert-danger'>Las contraseñas no coinciden</div></div>";
						}
					
					 else{
						$nombre = limpiar($con,$_POST['nombre']);
						$usuario=limpiar($con,$_POST['usuario']);
						$correo = limpiar($con,$_POST['correo']);
						$password=limpiar($con,$_POST['password']);						
						$password=encriptar($password);
						$sql="select usuario from usuarios where usuario='$usuario'";
						$error="<div class='container'><div class='alert alert-danger'>Error al comprobar el usuario</div></div>";

						$comprobar=consulta($con,$sql,$error);
						$numUsuarios=mysqli_num_rows($comprobar);
						if($numUsuarios > 0){
							echo"<div class='container'><div class='alert alert-danger'>El usuario que selecciono ya esta en uso</div></div>";
						}  
						else{
							$sql="INSERT INTO usuarios (nombre,usuario,correo,password,online) VALUES ('$nombre','$usuario','$correo','$password','0')";
							$error="<div class='container'><div class='alert alert-danger'>Error al registrar el usuario</div></div>";
							$registrar=consulta($con,$sql,$error);
							if($registrar==true){
								$mensaje="registro exitoso";
								$mensaje=encriptar($mensaje);
								header("location:login.php?mensaje=$mensaje");
							}else{
								echo"<div class='container'><div class='alert alert-danger'>Error al registrar el usuario</div></div>";
							}
						}
					}
				}
			?>
    		<!--<form action="<?php $_SERVER['PHP_SELF']?>" method="post" id="formRegistrar" class="formRegistrar centrarDiv borde-5 borderBox letraNegrita">
				<label class="labelUsuario">Usuario:</label><input type="text" name="usuario"  id="usuario" placeholder="Ingrese su usuario"><br>
            	<label>Password:</label><input type="password" name="password"  id="password" placeholder="Ingrese su password">
            	<input type="submit" name="registrar"  id="registrar" value="Registrar" class="boton botonRegistrar letraBlanca letraNegrita borde-5 cursorPointer">
        	</form>-->
    

		<div class="container">
		<div class="jumbotron jumbotron-fluid" align="center">
  		<div class="container">
    		<h1 class="display-3">REGISTRO</h1>
    		<p class="lead">Pagina para registrar a los usuarios que haran uso del chat.</p>
  		</div>
		</div>
			<div id="result"></div>
  <form action="<?php $_SERVER['PHP_SELF']?>" method="post" id="formRegistrar" class="formulario">
  <div class="form-group">
      <label for="inputEmail3">Nombre</label>
      <div>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3">Usuario</label>
      <div>
        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
      </div>
    </div>
	<div class="form-group">
      <label for="inputEmail3">Correo</label>
      <div>
        <input type="text" name="correo" id="correo" class="form-control" placeholder="Correo">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3">Contraseña</label>
      <div>
        <input type="password" name="password"  id="password" class="form-control" placeholder="Ingrese su password">
      </div>
    </div>
	<div class="form-group">
      <label for="inputPassword3">Repetir Contraseña</label>
      <div>
        <input type="password" name="repe_password"  id="repe_password" class="form-control" placeholder="Ingrese su password">
      </div>
    </div>
    <div class="form-group">
      <div>
        <input type="submit" class="btn btn-primary" name="registrar" id="registrar" value="Registrar" role="button">
      </div>
    </div>
  </form>
</div>
</body>
</html>