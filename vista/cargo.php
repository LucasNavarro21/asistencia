<?php
  session_start();
  if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
      header('location:login/login.php');
  }

?>

<style>

  ul li:nth-child(4) .activo{
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

  <h4 class="text-center text-secondary">Lista de cargos</h4>

  <?php 
    require("../modelo/conexion.php");
    require("../controlador/C_eliminar_cargo.php");
    require("../controlador/C_modificar_cargo.php");

    $sql=$conexion->query("SELECT * from cargo");

  ?>
  
  <link rel="stylesheet" href="../estilos/styles.css">

  <div class="text-right mb-2">

  <a href="registro_cargo.php" class="btn btn-primary btn-rounded" ><i class="fas fa-plus"></i> &nbsp; Registrar</a>
  <a href="fpdf/reporteCargo.php" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i>Generar reportes</a>
</div>
  <table class="table table-bordered table-hover col-12" id = "example">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>

    </tr>
  </thead>
  <tbody>
    <?php 
        while($datos = $sql->fetch_object()){ ?>
        <tr>

          <td scope="row"><?= $datos->id_cargo ?></td>
            <td scope="row"><?= $datos->nombre ?></td>
          
            <td scope="row">
                <a href="" data-toggle="modal" class="btn btn-warning btn-sm" data-target="#exampleModal<?= $datos->id_cargo ?>"> <i class="fas fa-pencil-alt"></i> </a>
                <a href="cargo.php?id=<?=$datos->id_cargo?>" onclick="advertencia(event)" class = "btn btn-danger"> <i class="fas fa-trash"></i> </a>
            </td>
        </tr>    
    
      

<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $datos->id_cargo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <input type="text" placeholder="Id" class="input input__text" name="txtid" value="<?= $datos->id_cargo ?>">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
        <input type="text" placeholder="Nombre" class="input input__text" name="txtnombre" value="<?= $datos->nombre ?>">
      </div>

      <div class="text-right p-2">
      <a href="cargo.php" class="btn btn-secondary btn-rounded">Atras</a>
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