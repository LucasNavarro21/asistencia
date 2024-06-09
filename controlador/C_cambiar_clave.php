<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtclavenueva"]) and !empty($_POST["txtclaveactual"]) and !empty($_POST["txtid"])) {
        $claveactual = md5($_POST["txtclaveactual"]);
        $clavenueva = md5($_POST["txtclavenueva"]);
        $id = $_POST["txtid"];
        $verificarClaveActual = $conexion->query("select password from usuario where id_usuario = $id");
        if ($verificarClaveActual->fetch_object()->password == $claveactual) {
            $sql = $conexion->query("update usuario set password = '$clavenueva' where id_usuario = $id");
            if ($sql == true) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "CORRECTO",
                            type: "success",
                            text: "La contraseña se ha modificado correctamente",
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
                            text: "Error al modificar contraseña",
                            styling: "bootstrap3"
                        })
                    })
                </script>
            <?php }
        } else { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "INCORRECTO",
                        type: "error",
                        text: "La contraseña es incorrecta",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php }
    } else if(isset($_POST["btnregistrar"])) { ?>
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
