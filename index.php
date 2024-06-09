<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
            <link href="../public/pnotify/css/pnotify.css" rel="stylesheet" />
        <link href="../public/pnotify/css/pnotify.buttons.css" rel="stylesheet" />
        <link href="../public/pnotify/css/custom.min.css" rel="stylesheet" />

        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="estilos/styles.css">
    <title>Document</title>
</head>
<body>
    <?php 
date_default_timezone_set("America/Argentina/Buenos_Aires");
    ?>
    <div class="ContainerPadre">
        <div class="ContainerFormularioRegistro">
            <h1 class = "TituloRegistro">Registro de asistencia</h1>
            <h2 class ="TituloRegistro" id = "fecha"> <?= date("d/m/Y, h:i:s") ?>  </h2>
            <?php
            include "modelo/conexion.php";
            include "controlador/C_registrar_asistencia.php";

            ?>
            <form action="" class="FormularioAsistencia" method="POST">
                <input class = "inputDni" type="number" placeholder="Ingrese su dni" name = "txtdni" id="txtdni">
                <br>
                <div class="ContainerEnlaces">
                    <button class="entrada" type="submit" name="btnentrada" value="ok">ENTRADA</button>
                    <button class="salida" type="submit" name="btnsalida" value="ok">SALIDA</button>

                    <!-- <a class = "entrada" href="">Entrada</a>
                    <a class = "salida" href="">Salida</a> -->
                </div>
                
            </form>
        </div>
    </div>

    <script>
        let dni = document.getElementById("txtdni");
        dni.addEventListener("input", function(){
            if(this.value.length > 8){
                this.value = this.value.slice(0,8);
            }
        })
    </script>
    
    <script>
        setInterval(()=>{    
        let fecha = new Date();
        let fechaHora = fecha.toLocaleString();
        document.getElementById("fecha").textContent = fechaHora;   
        });
        
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>