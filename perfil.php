<?php
	session_start();
	include('funciones/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Perfil</title>
</head>
<body>
        <?php
            include("header/layout.php"); 
            include('funciones/funciones.php'); 
            if(isset($_SESSION["usuario"]) && isset($_SESSION['id'])){
                 $usuario = $_SESSION['usuario'];
                $sql2= "SELECT * FROM usuarios WHERE usuario = '$usuario'";
                $error2 = "<div class='alert alert-danger'>Error al seleccionar los datos</div>";
                $registro = consulta($con,$sql2,$error2);
                $datos = mysqli_fetch_array($registro); 
                
            } else {
               header("location: login.php");
            }    
        ?>
    <div class="container">

    <div class="container" style="margin-top: 7%;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3" align="center">Mi Información</h1>
                <p class="lead" align="center">Aquí encontraras tu Información personal, podras editarla si asi lo deseas o simplemente observarla</p>
            </div>
        </div>
        <form action="" method= "post">
            <div class="row" align="center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre(s):</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos['nombre']; ?>"  disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuario:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos['usuario']; ?>"  disabled>
                    </div>
                </div>
            </div>
            <div class="row" align="center">
                 <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos['correo']; ?>"  disabled>
                    </div>
                </div>
            </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="cambio">
                        Cambiar Contraseña
                    </label>
                </div>
                <div id="result_contra" align="center"></div>
                <div class="row">
    <div class="col-md-4">
        <input type="password" id="antigua" name="antigua" class="cambiar form-control" placeholder="Contraseña actual" value="<?php echo $datos['password']; ?>" disabled>
    </div>
    <div class="col-md-4">
        <input type="password" id="nueva" name="nueva" class="cambiar form-control vacio" placeholder="Nueva Contraseña">
    </div> 
    <div class="col-md-4">
        <input type="password" id="repetir" name="repetir" class="cambiar form-control vacio" placeholder="Repetir Contraseña">
    </div>
   </div> <br>
    <button type="button" class="btn btn-success cambiar" id="validar_contras" role="button" name="validar_contras">Cambiar Contraseña</button>   
        </form>
    </div>

    <script src="js/perfil/perfil.js"></script>
</body>
</html>