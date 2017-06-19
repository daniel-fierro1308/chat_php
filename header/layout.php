<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <title>.:Security Chat:.</title>
    <style>
        nav {
            margin-bottom: 3%;
        }
    </style>
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-inverse bg-primary">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php 
    if (isset($_SESSION['usuario']) && isset($_SESSION['id'])) {
      echo '<a class="navbar-brand" href="usuario.php">SECURITY</a>';
    } else {
        echo '<a class="navbar-brand" href="index.php">SECURITY</a>';
    }
  ?>
  
<?php
if (isset($_SESSION['usuario']) && isset($_SESSION['id'])) {
    echo '<ul class="navbar-nav mr-auto">
<li class="nav-item active"><a href="contactos.php" class="nav-link"><strong>CONTACTOS</strong></a></li>
<li class="nav-item active"><a href="#" class="nav-link"><strong>PERFIL</strong></a></li>
<li class="nav-item active"><a href="cerrarSesion.php" class="nav-link"><strong>CERRAR SESION</strong></a></li></ul>
    <form action="agregar_contactos.php" method="post" name="buscar" id="buscar" class="form-inline my-2 my-lg-2">
	<input type="search" name="busqueda" id="busqueda" placeholder="Ingrese el nombre del usuario" class="form-control mr-sm-2">
    <input type="submit" name="buscar" id="buscar" value="Buscar" class="btn btn-secondary my-2 my-sm-0" role="button">
</form>';
} else {
    echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="login.php"><strong>LOGIN</strong><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="registrar.php"><strong>REGISTRAR</strong></a>
      </li>
    </ul>
  </div>';
}
?>
  
</nav>
<?php
  if (isset($_SESSION['usuario']) && isset($_SESSION['id'])){

     echo '<h4><span class="badge badge-primary" style="float: right; margin-bottom:5%;">'.$_SESSION["usuario"];'</span></h4>';
  }
 ?>

</div>
</body>
</html>