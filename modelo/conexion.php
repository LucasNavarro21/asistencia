<?php
$servidor = "localhost";
$usuario = "root";
// $contra = "tu_contraseña";
$db = "asistencia";

// Crear una conexión
//$conn = new mysqli($servidor, $usuario, "", $db);


try{
    $conexion = new mysqli($servidor, $usuario, "", $db);
}catch (mysqli_sql_exception $e){
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();

    // Pagina de error:
    // header("Location: ./Vistas/V_error.php");
    // exit; 
}



?>
