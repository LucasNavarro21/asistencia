<?php
  session_start();
  if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
      header('location:login/login.php');
  }

?>

<style>

  ul li:nth-child(1) .activo{
    background: rgb(11, 150, 214) !important;

  }

</style>

<link rel="stylesheet" href="../estilos/styles.css">

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

<!-- inicio del contenido principal -->
<div class="page-content">

  <h4 class="text-center text-secondary">Lista de asistencias</h4>

  <?php 
    require("../modelo/conexion.php");
    require("../controlador/C_eliminar_asistencia.php");

    $sql=$conexion->query("SELECT
    asistencia.id_asistencia,
    asistencia.id_empleado,
    asistencia.entrada,
    asistencia.salida,
    empleado.id_empleado,
    empleado.nombre as nom_empleado,
    empleado.apellido,
    empleado.dni,
    empleado.cargo nom_cargo,
    cargo.id_cargo,
    cargo.nombre
    FROM
    asistencia
    INNER JOIN empleado ON asistencia.id_empleado = empleado.id_empleado 
    INNER JOIN cargo ON empleado.cargo = cargo.id_cargo");

  ?>

<div class="text-right mb-2 marginBotones">
  <a href="fpdf/reporteAsistencia.php" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i>Generar reportes</a>
</div>

<div class="text-right mb-2">
  <a href="reporte_asistencia.php" class="btn btn-primary"><i class="fas fa-plus"></i> Mas reportes</a>
</div>

  <table class="table table-bordered table-hover col-12" id = "example">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Empleado</th>
      <th scope="col">Dni</th>
      <th scope="col">Cargo</th>
      <th scope="col">Entrada</th>
      <th scope="col">Salida</th>

    </tr>
  </thead>
  <tbody>
    <?php 
        while($datos = $sql->fetch_object()){ ?>
        <tr>
            <td scope="row"><?= $datos->id_asistencia ?></td>
            <td scope="row"><?= $datos->nom_empleado ?></td>
            <td scope="row"><?= $datos->dni ?></td>
            <td scope="row"><?= $datos->nom_cargo ?></td>
            <td scope="row"><?= $datos->entrada ?></td>
            <td scope="row"><?= $datos->salida ?></td>

            <td scope="row">
                <a href="inicio.php?id=<?=$datos->id_asistencia?>" onclick="advertencia(event)" class = "btn btn-danger"> <i class="fas fa-trash"></i> </a>
            </td>
        </tr>    
        
        <?php
        }
        ?>
   
    
  </tbody>
</table>

</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>