<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtnombre"])) {
        $nombre = $_POST["txtnombre"];
       
        $sql = $conexion->query("SELECT COUNT(*) AS 'total' FROM cargo WHERE nombre = '$nombre'");
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
            $sql = $conexion->query("INSERT INTO cargo (nombre) VALUES ('$nombre')");
            if ($sql == true) {
                ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "CORRECTO",
                            type: "success",
                            text: "El cargo se ha registrado exitosamente",
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
                            text: "Error al registrar el cargo",
                            styling: "bootstrap3"
                        })
                    })
                </script>
            <?php }
        }
    }else if(isset($_POST["btnregistrar"])) { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "INCORRECTO",
                    type: "error",
                    text: "Los campos están vacíos",
                    styling: "bootstrap3"
                })
            })
        </script>
    <?php } 

}
?>
<script>
    $(function notificacion() {
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    });
</script>