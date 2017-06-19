<?php
	session_start();
	if(isset($_SESSION['usuario']) && isset($_SESSION['id'])){
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contactos</title>        
		<link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/chat.css">
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="js/funciones.js"></script>
    	<script src="js/estadoUsuario.js"></script>
        <script src="js/estadoContacto.js"></script>
    </head>
	<body>
            	<?php
            		require_once("header/layout.php");
				?>
            
				<!--<div class="contenedorTablaResultados centrarDiv">-->
					<div class="container" align="center">
						<h1>Lista de contactos</h1>
                	
                    	
			<?php
				require_once('funciones/funciones.php');
				require_once('funciones/conexion.php');
            	$numContactos1=0;
				$numContactos2=0;
				$sql1="select contacto,contactos.usuario as contactosUsuario, usuarios.id as usuarioId, usuarios.usuario as usuario, usuarios.nombre as usuarioNombre,online from contactos inner join usuarios on usuarios.id=contactos.contacto where contactos.usuario=$_SESSION[id]";
				$error1="<div><div class='alert alert-danger'>Error al seleccionar los contactos</div></div>";		
				$contactos1=consulta($con,$sql1,$error1);

				$numContactos1=mysqli_num_rows($contactos1);

				if($numContactos1!=0){

					while($contacto1=mysqli_fetch_assoc($contactos1)){

						 if($contacto1['online']==1){

						 	$fondo= 'En linea';

						 } else{
						 	$fondo= 'Desconectado';
						 }
						echo"
						<table class='table table-striped'>
						<thead id='titulos'>
							<th>Id</th>
							<th>Usuario</th>
							<th>Nombre de Usuario</th>
							<th>Estado</th>
							<th>Acción</th>
						</thead>
						<td>$contacto1[usuarioId]</td> 
						<td><a href='chat.php?id=$contacto1[usuarioId]'>$contacto1[usuario]</td> <td>$contacto1[usuarioNombre]</td> <td>$fondo</td><td><a id='elim1' href='eliminar.php?id=$contacto1[usuarioId]'>Eliminar</a></td><tr></table>";
					}
				}
				
				$sql2="select contacto,contactos.usuario as contactosUsuario, usuarios.id as usuarioId, usuarios.usuario as usuario,usuarios.nombre as usuarioNombre,online from contactos inner join usuarios on usuarios.id=contactos.usuario where contacto=$_SESSION[id]";
				$error2="<div class='alert alert-danger'>Error al seleccionar los contactos</div>";
				$contactos2=consulta($con,$sql2,$error2);
				$numContactos2=mysqli_num_rows($contactos2);
				if($numContactos2!=0){
					while($contacto2=mysqli_fetch_assoc($contactos2)){
						 if($contacto2['online']==1){

						 	$fondo= 'En linea';

						 } else{
						 	$fondo= 'Desconectado';
						 }
						echo"
						<table class='table table-striped'>
						<thead id='titulos'>
							<th>Id</th>
							<th>Usuario</th>
							<th>Nombre de Usuario</th>
							<th>Estado</th>
							<th>Acción</th>
						</thead>
						<td>$contacto2[usuarioId]</td> 
						<td><a href='chat.php?id=$contacto2[usuarioId]'>$contacto2[usuario]</td> <td>$contacto2[usuarioNombre]</td> <td>$fondo</td><td><a id='elim1' href='eliminar.php?id=$contacto2[usuarioId]'>Eliminar</a></td></tr><tr></table>";
					}
				}
				$_SESSION['numContactos2']=$numContactos2;
				$_SESSION['preguntar']=true;
				if($numContactos1==0 && $numContactos2==0){
					echo"<div class='alert alert-info'>Aun no tienes contactos</div>";	
				}
			?>
				</div>
        	<!--</div>-->
    </body>
	<!--<script>
    $('#elim1').click(function(e){
      e.preventDefault();
      p = confirm("Estas Seguro?");
      if(p){
        window.location ="eliminar.php?id=$contacto1[usuarioId]";
		
      } else if(p){
		  window.location ="eliminar.php?id=$contacto2[usuarioId]";
	  }
    });
  </script>-->
</html>
<?php
	}else{
		echo"<h1>Zona disponible solo para usuarios registrados</h1><a href='login.php'>Login</a>";
	}
?>
