<?php
include("../Conexión/Conexion.php");

if(isset($_POST['Crear'])){
    $Cargo = $_POST['Cargo'];
    $Nombre_Completo = $_POST['Nombre_Completo'];
    $Usuario = $_POST['Usuario'];
    $FechaNacimiento = $_POST['FechaNacimiento'];
    $NumControl = $_POST['NumControl'];
    $CorreoElectronico = $_POST['CorreoElectronico'];
    $Telefono = $_POST['Telefono'];
    $TelEmergencia = $_POST['TelefonoEmergencia'];

    $FotoPerfil = $_FILES['Foto'];

    $tmp_name = $FotoPerfil['tmp_name'];
    $Directorio_Destino = "ImagenesPerfil";

    $img_file = $FotoPerfil['name'];
    $img_type = $FotoPerfil['type'];

    if(((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png"))){
        $Destino = $Directorio_Destino . '/' . $img_file;
        if(move_uploaded_file($tmp_name, $Destino)){
            $sql = "INSERT INTO usuarios (Nombre_Completo, Usuario, Numero_De_Control, Correo_Electronico, Telefono, Telefono_Emergencia, Fecha_Nacimiento, Cargo, Foto) 
            VALUES ('$Nombre_Completo', '$Usuario', '$NumControl', '$CorreoElectronico' ,'$Telefono', '$TelEmergencia', '$FechaNacimiento', '$Cargo', '$Destino')";

            $Resultado = mysqli_query($Conexion, $sql);

            if ($Resultado) {
                echo "Usuario creado exitosamente.";
            } else {
                echo "Error al crear Usuario: " . mysqli_error($Conexion);
            }
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "Formato de imagen no válido. Sube una imagen en formato gif, jpeg, jpg o png.";
    }
} else {
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
        <link rel="stylesheet" href="../EstilosCSS/EstiloCrearUsuario.css">
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
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h2>Crear Usuario</h2>
            <div class="FotoPerfil">
            </div>
            <div class="Roles">
                <label for="">Roles</label>
                <input type="text" list="Cargo" name="Cargo">
                    <datalist id="Cargo">
                        <option value="1"></option>
                        <option value="2"></option>
                    </datalist>
                </input list>
            </div>
            <div class="FotoPerfil">
                <label for="">Foto De Perfil</label>
                <input type="file" name="Foto">
            </div>
            <div class="NomAlumno">
                <label for="">Nombre Completo</label>
                <input type="text" name="Nombre_Completo" id="NombreAlumno">
            </div>
            <div class="Usuario">
                <label for="">Usuario</label>
                <input type="text" name="Usuario" id="Usuario">
            </div>
            <div class="FN">
                <label for="">Fecha De Nacimiento</label>
                <input type="date" name="FechaNacimiento" id="Fecha De Nacimiento">
            </div>
            <div class="NumControl">
                <label for="">Número De Control</label>
                <input type="text" name="NumControl" id="NumControl">
            </div>
            <div class="CorreoElectronico">
                <label for="">Correo Electronico</label>
                <input type="email" name="CorreoElectronico" id="CorreoElectronico">
            </div>
            <div class="Telefono">
                <label for="">Teléfono</label>
                <input type="tel" name="Telefono" id="Telefono">
            </div>
            <div class="TelEmergencia">
                <label for="">Teléfono De Emergencia</label>
                <input type="tel" name="TelefonoEmergencia" id="TelEmergencia">
            </div>
            <div class="Crear">
                <button type="submit" id="BotonCrear" name="Crear">Crear</button>
            </div>
            <div class="Cancelar">
                <a href="../InterfacesAdmin/InterfazAdmin.html">Cancelar</a>
            </div>
        </form>
    </body>
    </html>
<?php
}
?>
