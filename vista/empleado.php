<?php
  session_start();
  if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
      header('location:login/login.php');
  }

?>

<style>

  ul li:nth-child(3) .activo{
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

<!-- inicio del contenido principal -->
<div class="page-content">

  <h4 class="text-center text-secondary">Lista de empleados</h4>

  <?php 
    require("../modelo/conexion.php");
    require("../controlador/C_modificar_empleado.php");
    require("../controlador/C_eliminar_empleado.php");

    $sql=$conexion->query("SELECT empleado.id_empleado, empleado.nombre, empleado.apellido, empleado.dni, empleado.cargo, cargo.nombre as 'nom_cargo' from empleado inner join cargo where empleado.cargo = cargo.id_cargo");

  ?>
    
  <div class="text-right mb-2">

<link rel="stylesheet" href="../estilos/styles.css">
  <a href="registro_empleado.php" class="btn btn-primary btn-rounded" ><i class="fas fa-plus"></i> &nbsp; Registrar</a>

  <a href="fpdf/reporteEmpleado.php" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i>Generar reportes</a>
</div>

  <table class="table table-bordered table-hover col-12" id = "example">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Cargo</th>

    </tr>
  </thead>
  <tbody>
    <?php 
        while($datos = $sql->fetch_object()){ ?>
        <tr>

          <td scope="row"><?= $datos->id_empleado ?></td>
            <td scope="row"><?= $datos->nombre ?></td>
            <td scope="row"><?= $datos->apellido ?></td>
            <td scope="row"><?= $datos->nom_cargo ?></td>

            <td scope="row">
                <a href="" data-toggle="modal" class="btn btn-warning btn-sm" data-target="#exampleModal<?= $datos->id_empleado ?>"> <i class="fas fa-pencil-alt"></i> </a>
                <a href="empleado.php?id=<?=$datos->id_empleado?>" onclick="advertencia(event)" class = "btn btn-danger"> <i class="fas fa-trash"></i> </a>
            </td>
        </tr>    
    
      

<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $datos->id_empleado ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h5 class="modal-title w-100" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
      <div hidden class="inputStyle fl-flex-label mb-4 px-2 col-12 col-md-6">
        <input type="text" placeholder="Id" class="input input__text" name="txtid" value="<?= $datos->id_empleado ?>">
      </div>
      <div class="inputStyle fl-flex-label mb-4 px-2 col-12 col-md-6">
        <input type="text" placeholder="Nombre" class="input input__text" name="txtnombre" value="<?= $datos->nombre ?>">
      </div>
      <div class="inputStyle fl-flex-label mb-4 px-2 col-12 col-md-6">
        <input type="text" placeholder="Apellido" class="input input__text" name="txtapellido" value="<?= $datos->apellido ?>">
      </div>
    
      <!-- <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
        <input type="password" placeholder="Contraseña" class="input input__text" name="txtpassword" value="<?= $datos->password ?> ">
      </div> -->
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
        <select class="input input__select" id="" name = "txtcargo" >
          <option value="">Seleccionar</option>
          <?php 
          $sql2 = $conexion->query("select * from cargo");
          while($datos2 = $sql2->fetch_object()) { ?>
          <option <?= $datos->cargo==$datos2->id_cargo ? 'selected' : '' ?> value="<?= $datos2->id_cargo ?>"><?= $datos2->nombre ?></option>
          <?php } ?>
        </select>
    </div>
      <div class="text-right p-2">
      <a href="empleado.php" class="btn btn-secondary btn-rounded">Atras</a>
      <button type="submit" value="ok" name = "btnmodificar" class="btn btn-primary btn-rounded">Modificar</button>
    </div>
    </form>
      </div>
      
    </div>
  </div>
</div>


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