<?php
  session_start();
  if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
      header('location:login/login.php');
  }

?>
<link rel="stylesheet" href="../estilos/styles.css">
<style>

  ul li:nth-child(2) .activo{
    background: rgb(11, 150, 214) !important;

  }

</style>


<script>
  function advertencia(){
    var not = confirm("Esta seguro de borrar el registro");
    return not
  }
</script>
<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<?php 
require("../modelo/conexion.php");
require("../controlador/C_registrar_usuario.php"); ?>


<!-- inicio del contenido principal -->
<div class="page-content">

  <h4 class="text-center text-secondary">Registro de usuarios</h4>

  <div class="row">
    <form action="" method="POST">
      <div class="inputStyle fl-flex-label mb-4 px-2 col-12 col-md-6">
        <input type="text" placeholder="Nombre" class="input input__text" name="txtnombre">
      </div>
      <div class="inputStyle fl-flex-label mb-4 px-2 col-12 col-md-6">
        <input type="text" placeholder="Apellido" class="input input__text" name="txtapellido">
      </div>
      <div class="inputStyle fl-flex-label mb-4 px-2 col-12 col-md-6">
        <input type="text" placeholder="Usuario" class="input input__text" name="txtusuario">
      </div>
      <div class="inputStyle fl-flex-label mb-4 px-2 col-12 col-md-6">
        <input type="password" placeholder="Contraseña" class="input input__text" name="txtpassword">
      </div>
      <div class="text-right p-2">
      <a href="usuario.php" class="btn btn-secondary btn-rounded">Atras</a>
      <button type="submit" value="ok" name = "btnregistrar" class="btn btn-primary btn-rounded">Registrar</button>
    </div>
    </form>
   
  </div>

</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>