<?php
session_start();
	if(isset($_SESSION['usuario']) && isset($_SESSION['id'])){
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Agregar Contactos</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/chat.css">
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
        <script src="js/funciones.js"></script>
		<script src="js/estadoUsuario.js"></script>
    </head>
	<body>
		
        	<header>
            	<?php
                	require_once("header/layout.php");
				?>
            </header>
            <div class="container">
				<table class="table table-striped">
				<thead>
            		<th>Usuarios</th>
					<th>Nombre </th>
				</thead>
			<?php
				require_once('funciones/conexion.php');
				require_once('funciones/funciones.php');
				if(isset($_POST['buscar'])){
					$busqueda=limpiar($con,$_POST['busqueda']);
					$sql="select * from usuarios where usuario like '%$busqueda%'";
					$error="<div class='alert alert-danger'>Error al buscar usuarios</div>";
					$usuarios=consulta($con,$sql,$error);
					$numUsuarios=mysqli_num_rows($usuarios);
					if($numUsuarios==0){
						echo"<div class='alert alert-info'>No se encontraron resultados con su busqueda <strong>$busqueda</strong></div>";
					}
					
					else{
						while($usuario=mysqli_fetch_assoc($usuarios)){
							$sql2="select * from contactos where (usuario='$_SESSION[id]' and contacto='$usuario[id]') or (usuario='$usuario[id]' and contacto='$_SESSION[id]')";
							$error2="<div class='alert alert-danger'>Error al comprobar los contactos</div>";
							$contacto=consulta($con,$sql2,$error2);
							$noResultados=mysqli_num_rows($contacto);
							if($noResultados>0){
								echo"<td class='cursorPointer'><a href='chat.php?id=$usuario[id]'>$usuario[usuario]</a></td>
								<td>$usuario[nombre]</td><tr>";
							} else{
								$agregar=encriptar("agregar contacto");
								 echo"<td class='cursorPointer'><a href='agregar_contactos.php?agregar=$agregar&id=$usuario[id]'>$usuario[usuario]</a></td><td>$usuario[nombre]</td></tr>";						
							}
						}
					}//numUsuarios==0
				}else if(isset($_GET['agregar'])){
					$mensaje=encriptar("agregar contacto");
					$id=limpiar($con,$_GET['id']);
					if($_GET['agregar']==$mensaje){ 

						$sql="select * from solicitudes where id=$_SESSION[id] and solicitud=$id";
						$error="<div class='alert alert-danger'>Error al comprobar el envio de solicitud</div>";
						$solicitudes=consulta($con,$sql,$error);	
						$numSolicitudes= mysqli_fetch_array($solicitudes);
						 if($id == $_SESSION['id']){
							header('location:perfil.php');
							//echo"<div class='alert alert-info'>No puedes agregarte a ti mismo..</div>";
						}else if($numSolicitudes['solicitud'] ==  $id || $numSolicitudes['solicitud'] ==  $_SESSION['id'] || $numSolicitudes['id'] ==  $id || $numSolicitudes['id'] ==  $_SESSION['id']){
								echo "<div class='container'><div class='alert- alert-info'>Su solicitud ya ha sido enviada</div></div>";
							}  else{
							$sql="insert into solicitudes (usuario,solicitud) values ($_SESSION[id],$id)";
							$error="<div class='alert alert-danger'>Error al buscar usuarios</div>";
							$solicitud=consulta($con,$sql,$error);			
							if($solicitud){
								 echo"<div class='container'><div class='alert alert-success' style='margin-top: 10%'>Su solicitud ha sido enviada</div></div>";
							}
							else{
								echo"<div class='alert alert-danger'>Error al enviar la soliciutud</div>";
							}//$solicitud
						}
					}//$_GET[agregar]
				}else{
					echo"<div class='alert alert-danger'>Sin ninguna peticion</div>";
				}//operaciones buscar y agregar contacto
		 ?>
         	</table><!---tabla-->
         </div><!--contenedorTablaReultados-->
 	<!--contenedorPrincipal-->
	</body>
</html>
<?php
	}else{
		echo"<h1>Zona disponible solo para usuarios registrados</h1><a href='login.php'>Login</a>";
	}//isset($_SESSION[usuario]) isset($_SESSION[id])
?>

