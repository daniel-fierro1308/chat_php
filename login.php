<?php
	session_start();
?>
<!doctype html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>Login</title>
			<link rel="stylesheet" type="text/css" href="css/main.css">
        	<link rel="stylesheet" type="text/css" href="css/chat.css">
			<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    	</head>
	<body>
    	
        	<header>
            	<?php
					require_once("header/layout.php");
                ?>
            </header>
        	<?php
				require_once('funciones/funciones.php');
            	if(isset($_POST['login'])){
					require_once('funciones/conexion.php');
					  if(empty($_POST['usuario'])){
					  	echo'<div class="container"><div class="alert alert-danger" role="alert">Su usuario esta vacio</div></div>';
					  }elseif(empty($_POST['password'])){
					  	echo'<div class="container"><div class= "alert alert-danger" role="alert">Su contraseña esta vacia</div></div>';					
					  }
					else{
						$usuario=limpiar($con,$_POST['usuario']);
						$password=limpiar($con,$_POST['password']);
						$password=encriptar($password);
						$sql="select * from usuarios where usuario='$usuario' and password='$password'";
						$error='<div class="container"><div class="alert alert-danger" role="alert">Error al seleccionar el usuario</div></div>';
						$buscar=consulta($con,$sql,$error);
						$numUsuarios=mysqli_num_rows($buscar);
						if($numUsuarios == 0){
							echo"<div class='container'><div class='alert alert-danger'>Su usuario <strong>$usuario</strong> no existe o ha sido eliminado</div></div><br>";	
						}else if($numUsuarios>1){
								echo"<div class='container'><div class='alert alert-danger'>Error existen mas usuarios iguales</div></div>";
						}else{
							$usuario=mysqli_fetch_assoc($buscar);
							$_SESSION['usuario']=$usuario['usuario'];
							$_SESSION['id']=$usuario['id'];
							$sql="update usuarios set online='1' where id='$usuario[id]'";
							$error="<div class='container'><div class='alert alert-danger'>Error al modificar el estado del usuario</div></div>";
							$buscar=consulta($con,$sql,$error);
							header('location:usuario.php');
						}
					}
				}else if(isset($_GET['mensaje'])){
					$mensaje='registro exitoso';
					$mensaje=encriptar($mensaje);
					if($_GET['mensaje']==$mensaje){
						echo"<div class='container'><div class='alert alert-success'>Su usuario ha sido registrado satisfactoriamente</div></div>";
					}else{
						header("location:login.php?registro=mensaje=$mensaje");
					}
				}
			?>

				<!--<label class="labelUsuario">Usuario:</label><input type="text" name="usuario"  id="usuario" placeholder="Ingrese su usuario"><br>
            	<label>Password:</label><input type="password" name="password"  id="password" placeholder="Ingrese su password">
            	<input type="submit" name="login"  id="login" value="Login" class="boton borde-5 cursorPointer botonLogin letraNegrita letraBlanca">
        	</form>
    	</div>-->

		<div class="container">
			<div class="jumbotron jumbotron-fluid" align="center">
  		<div class="container">
    		<h1 class="display-3">INICIAR SESION</h1>
    		<p class="lead">Pagina para controlar el inicio de sesión de los usuarios registrados.</p>
  		</div>
		</div>
			<div id="result"></div>
  <form action="<?php $_SERVER['PHP_SELF']?>" method="post" id="formLogin" class="formulario">
    <div class="form-group">
			<div class="col-md-12">
      <label for="inputEmail3">Usuario</label>
      <div>
			</div>
        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
      </div>
    </div>
    <div class="form-group">
			<div class="col-md-12">
      <label for="inputPassword3">Password</label>
      <div>
			</div>
        <input type="password" name="password"  id="password" class="form-control" placeholder="Ingrese su password">
      </div>
    </div>
    <div class="form-group">
      <div>
				<div class="col-md-12">
        <button type="submit" class="btn btn-primary" name="login" id="login" value="Login" role="button" onclick="validar_login();">Login</button>
      </div>
			</div>
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/login/login.js"></script>
</body>
</html>