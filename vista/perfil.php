<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
  header('location:login/login.php');
}

$id = $_SESSION["id"];

?>



  <style>
    ul li:nth-child(2) .activo {
      background: rgb(11, 150, 214) !important;

    }
  </style>


  <script>
    function advertencia() {
      var not = confirm("Esta seguro de borrar el registro");
      return not
    }
  </script>
  <!-- primero se carga el topbar -->
  <?php require('./layout/topbar.php'); ?>
  <!-- luego se carga el sidebar -->
  <?php require('./layout/sidebar.php'); ?>
  <link rel="stylesheet" href="../estilos/styles.css">
  <?php
  require("../modelo/conexion.php");
  require("../controlador/C_modificar_perfil.php");
  $sql = $conexion->query(" select * from usuario where id_usuario = $id ");
  ?>

  <!-- inicio del contenido principal -->
  <div class="page-content">

    <h4 class="text-center text-secondary">Perfil</h4>

    <div class="row">
      <form action="" method="POST">

        <?php

        while ($datos = $sql->fetch_object()) { ?>

          <div hidden class="inputStyle fl-flex-label mb-4 px-2 col-12 col-md-6">
            <input type="text" class="input input__text" name="txtid" value=<?= $datos->id_usuario ?>>
          </div>
          <div class="inputStyle fl-flex-label mb-4 px-2 col-12 col-md-6">
            <input type="text" placeholder="Nombre" class="input input__text" name="txtnombre" value=<?= $datos->nombre ?>>
          </div>
          <div class="inputStyle fl-flex-label mb-4 px-2 col-12 col-md-6">
            <input type="text" placeholder="Telefono" class="input input__text" name="txtapellido" value=<?= $datos->apellido ?>>
          </div>
          <div class="inputStyle fl-flex-label mb-4 px-2 col-12 col-md-6">
            <input type="text" placeholder="Usuario" class="input input__text" name="txtusuario" value=<?= $datos->usuario ?>>
          </div>
          <div class="text-right p-2">
            <!-- <a href="usuario.php" class="btn btn-secondary btn-rounded">Atras</a> -->
            <button type="submit" value="ok" name="btnmodificar" class="btn btn-primary btn-rounded">Modificar</button>
          </div>

        <?php }
        ?>

    </div>
    </form>

  </div>

  </div>
  </div>
  <!-- fin del contenido principal -->


  <!-- por ultimo se carga el footer -->
  <?php require('./layout/footer.php'); ?>