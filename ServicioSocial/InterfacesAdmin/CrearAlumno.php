<?php
if(isset($_POST['Crear'])){
    $Nombre_Completo = $_POST['Nombre_Completo'];
    $FechaNacimiento = $_POST['FechaNacimiento'];
    $NumControl = $_POST['NumControl'];
    $Dependencias = isset($_POST['Dependencias']) ? $_POST['Dependencias'] : "";
    $CorreoElectronico = $_POST['CorreoElectronico'];
    $Telefono = $_POST['Telefono'];
    $TelEmergencia = $_POST['TelefonoEmergencia'];

    include("../Conexión/Conexion.php");

    $sql = "INSERT INTO alumnos (Nombre_Completo, Fecha_Nacimiento, Numero_Control, Dependencias, Correo_Electronico, Telefono, Telefono_Emergencia) 
    VALUES ('$Nombre_Completo', '$FechaNacimiento', '$NumControl', '$Dependencias', '$CorreoElectronico', '$Telefono', '$TelEmergencia')";

    $Resultado = mysqli_query($Conexion, $sql);

    if ($Resultado) {
        echo "Alumno creado exitosamente.";
    } else {
        echo "Error al crear alumno: " . mysqli_error($Conexion);
    }
}else{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Un Alumno</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../EstilosCSS/EstiloCrearAlumno.css">
    </head>
    <body>
    <div class="Contenedor-Imagen">
            <img class="LogoArriba" src="../Imagenes/LogosTec.jpg">
        </div>
        <div class="Contenedor-Imagen2">
            <img class="LogoTec" src="../Imagenes/LogoTec.png">
        </div>
        <div class="Barra1"></div>
        <div class="Barra2"></div>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <h2>Crear Alumno</h2>
        <div class="FotoPerfil">
            <input type="image" src="/Imagenes/ImagenPerfil.png" alt="">
        </div>
        <div class="NomAlumno">
            <label for="Nombre_Completo">Nombre Completo</label>
            <input type="text" name="Nombre_Completo" id="Nombre_Completo">
        </div>
        <div class="FN">
            <label for="FechaNacimiento">Fecha De Nacimiento</label>
            <input type="date" name="FechaNacimiento" id="FechaNacimiento">
        </div>
        <div class="NumControl">
            <label for="NumControl">Número De Control</label>
            <input type="text" name="NumControl" id="NumControl">
        </div>
        <div class="Dependencia">
            <label for="Dependencias">Dependencias</label>
            <input type="text" list="Dependencia" name="Dependencias" id="Dependencias">
                <datalist id="Dependencia">
                    <option value="Tecnologico"></option>
                    <option value="COBACH"></option>
                    <option value="CBETIS"></option>
                    <option value="CONALEP"></option>
                </datalist>
        </div>
        <div class="CorreoElectronico">
            <label for="CorreoElectronico">Correo Electronico</label>
            <input type="email" name="CorreoElectronico" id="CorreoElectronico">
        </div>
        <div class="Telefono">
            <label for="Telefono">Teléfono</label>
            <input type="tel" name="Telefono" id="Telefono">
        </div>
        <div class="TelEmergencia">
            <label for="TelefonoEmergencia">Teléfono De Emergencia</label>
            <input type="tel" name="TelefonoEmergencia" id="TelefonoEmergencia">
        </div>
        <div class="Crear">
            <button type="submit" id="BotonCrear" name="Crear">Crear</button>
        </div>
        <div class="Cancelar">
            <button type="submit" id="BotonCancelar" name="Cancelar">Cancelar</button>
        </div>
    </form>
    </body>
    </html>
    <?php
}
?>
