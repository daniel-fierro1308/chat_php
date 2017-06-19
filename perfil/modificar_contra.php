<?php 
require('../funciones/conexion.php');
require('../funciones/funciones.php');
    session_start();
    $antigua = mysqli_real_escape_string($con, $_POST["antigua"]);
    $nueva = mysqli_real_escape_string($con, $_POST["nueva"]);
    $repetir = mysqli_real_escape_string($con, $_POST["repetir"]);
    $user = $_SESSION["usuario"];
    if ($nueva != $repetir) {
        echo "<div class='alert alert-dismissible alert-danger'><strong>Error </strong>Las cotraseñas ingresadas no coinciden</div>";
     } else {
         $nueva=encriptar($nueva);
        $sql = "UPDATE usuarios set password = '$nueva' WHERE usuario = '$user'";
        consulta($con, $sql,'');
        echo "<div class ='alert alert-dismissible alert-success'><strong>Correcto </strong>Su contraseña se ha actualizado correctamente</div>";
    }


?>