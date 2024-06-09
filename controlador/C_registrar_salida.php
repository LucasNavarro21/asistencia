<?php
if (!empty($_POST["btnsalida"])) {
    if (!empty($_POST["txtdni"])) {
        $dni = $_POST["txtdni"];
        $consulta = $conexion->query("select count(*) as 'total' from empleado where dni = '$dni'");
        $id = $conexion->query("select id_empleado from empleado where dni = '$dni'");
        if ($consulta->fetch_object()->total > 0) {

            $fecha = date("Y-m-d h:i:s");
            $id_empleado = $id->fetch_object()->id_empleado;
            $sql= $conexion->query("update asistencia set id_empleado = $id_empleado, salida = '$fecha' where id_empleado = $id_empleado");

            if($sql == true) {
                ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "CORRECTO",
                        type: "success",
                        text: "Hola, Bienvenido",
                        styling: "bootstrap3"
                    })
                })
            </script>
             <?php } else{ ?>
                            <script>
                            $(function notificacion() {
                                new PNotify({
                                    title: "INCORRECTO",
                                    type: "error",
                                    text: "Error al registrar SALIDA",
                                    styling: "bootstrap3"
                                })
                            })
                        </script>
                  <?php }     
             }
            }
            ?>
        <?php } else { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "INCORRECTO",
                        type: "error",
                        text: "La contraseña actual es incorrecta",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php } 
        ?>
<script>
    $(function notificacion() {
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    });
</script>
