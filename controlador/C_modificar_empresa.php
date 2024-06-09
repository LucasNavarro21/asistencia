<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtid"])) {
        $id = $_POST["txtid"];
        $nombre = $_POST["txtnombre"];
        $telefono = $_POST["txttelefono"];
        $ruc = $_POST["txtruc"];
        $ubicacion = $_POST["txtubicacion"];
            $sql = $conexion->query("UPDATE empresa SET nombre = '$nombre', telefono = '$telefono', ubicacion = '$ubicacion', ruc = $ruc WHERE id_empresa = $id");
            if ($sql == true) {
                ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "CORRECTO",
                            type: "success",
                            text: "Los datos de la empresa se han modificado exitosamente",
                            styling: "bootstrap3"
                        })
                    })
                </script>
            <?php } else { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "INCORRECTO",
                            type: "error",
                            text: "Error al modificar los datos de la empresa",
                            styling: "bootstrap3"
                        })
                    })
                </script>
            <?php }
        
    }
}
?>
<script>
    $(function notificacion() {
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    });
</script>
