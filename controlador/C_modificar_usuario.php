<?php
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtnombre"]) && !empty($_POST["txtapellido"]) && !empty($_POST["txtusuario"])) {
        $nombre = $_POST["txtnombre"];
        $apellido = $_POST["txtapellido"];
        $usuario = $_POST["txtusuario"];
        $id = $_POST["txtid"];

        $sql = $conexion->query("SELECT COUNT(*) AS 'total' FROM usuario WHERE usuario = '$usuario' AND id_usuario != $id");
        if ($sql->fetch_object()->total > 0) {
            ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "ERROR",
                        type: "error",
                        text: "El usuario ya existe",
                        styling: "bootstrap3"
                    })
                })
            </script>
            <?php
        } else {
            $modificar = $conexion->query("UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', usuario = '$usuario' WHERE id_usuario = $id");
            if ($modificar == true) {
                ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "CORRECTO",
                            type: "success",
                            text: "El usuario se ha modificado exitosamente",
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
                            text: "Error al modificar usuario",
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
