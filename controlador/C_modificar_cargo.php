<?php
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtnombre"])) {
        $nombre = $_POST["txtnombre"];
        $id = $_POST["txtid"];

        $sql = $conexion->query("SELECT COUNT(*) AS 'total' FROM cargo WHERE nombre = '$nombre' AND id_cargo != $id");
        if ($sql->fetch_object()->total > 0) {
            ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "ERROR",
                        type: "error",
                        text: "El cargo ya existe",
                        styling: "bootstrap3"
                    })
                })
            </script>
            <?php
        } else {
            $sql = $conexion->query("UPDATE cargo SET nombre = '$nombre' WHERE id_cargo = $id");
            if ($sql == true) {
                ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "CORRECTO",
                            type: "success",
                            text: "El cargo se ha modificado exitosamente",
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
                            text: "Error al modificar el cargo",
                            styling: "bootstrap3"
                        })
                    })
                </script>
            <?php }
        }
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
