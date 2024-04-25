<?php
include("../Conexión/Conexion.php");

if(isset($_POST['Editar'])){
    $ID_Admin = $_POST['ID_Admin'];
    $Nombre_Completo = $_POST["Nombre_Completo"];
    $Usuario = $_POST["Usuario"];
    $NumControl = $_POST["NumControl"];
    $CorreoElectronico = $_POST["CorreoElectronico"];
    $Telefono = $_POST["Telefono"];
    $TelefonoEmergencia = $_POST["TelefonoEmergencia"];
    $FechaNacimiento = $_POST["FechaNacimiento"];
    $Cargo = $_POST["Cargo"];
    
    // Manejo de la foto de perfil
    if(isset($_FILES['FotoPerfil']) && $_FILES['FotoPerfil']['error'] == 0){
        $file_name = $_FILES['FotoPerfil']['name'];
        $file_tmp = $_FILES['FotoPerfil']['tmp_name'];
        $upload_folder = "../uploads/";
        if (!is_dir($upload_folder)) {
            mkdir($upload_folder, 0777, true); // Crear la carpeta con permisos 0777
        }
        $new_file_name = $upload_folder . $file_name;
        if(move_uploaded_file($file_tmp, $new_file_name)){
            $FotoPerfil = $new_file_name;
        }else{
            echo "Error al subir el archivo.";
            exit;
        }
    }

    // Actualizar la información del usuario en la base de datos
    $sql = "UPDATE usuarios set Nombre_Completo = '" . $Nombre_Completo . "', Usuario = '" . $Usuario . "', Numero_De_Control = '" . $NumControl . "',
    Correo_Electronico = '" . $CorreoElectronico . "', Telefono = '" . $Telefono . "', Telefono_Emergencia = '" . $TelefonoEmergencia . "', 
    Fecha_Nacimiento = '" . $FechaNacimiento . "', Cargo = '" . $Cargo . "'";
    if(isset($FotoPerfil)){
        $sql .= ", Foto = '" . $FotoPerfil . "'";
    }
    $sql .= " WHERE ID_Admin = '" . $ID_Admin . "'";
    $Resultado = mysqli_query($Conexion, $sql);

    if($Resultado){
        echo "<script languaje = 'JavaScript'>
        alert('Los Datos Se Actualizaron');
        location.assign('../InterfacesAdmin/BuscarUsuario.php');
        </script>";
    }else{
        echo "<script languaje = 'JavaScript'>
        alert('Los Datos No Se Actualizaron');
        location.assign('../InterfacesAdmin/BuscarUsuario.php');
        </script>";
    }
    mysqli_close($Conexion);
}else{
    $ID_Admin = $_GET['ID_Admin'];
    $sql = "SELECT * FROM usuarios WHERE ID_Admin='". $ID_Admin . "'";
    $Resultado = mysqli_query($Conexion, $sql);
    $fila = mysqli_fetch_assoc($Resultado);
    $Nombre_Completo = $fila["Nombre_Completo"];
    $Usuario = $fila["Usuario"];
    $NumControl = $fila["Numero_De_Control"];
    $CorreoElectronico = $fila["Correo_Electronico"];
    $Telefono = $fila["Telefono"];
    $TelefonoEmergencia = $fila["Telefono_Emergencia"];
    $FechaNacimiento = $fila["Fecha_Nacimiento"];
    $Cargo = $fila["Cargo"];
    $FotoPerfil = $fila["Foto"];

    mysqli_close($Conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../EstilosCSS/EstiloEditarUsuario.css">
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
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <h2>Editar Usuario</h2>
        <div class="FotoPerfil">
            <img src="<?php echo $FotoPerfil; ?>" alt="Foto de perfil" style="max-width: 150px;"><br>
            <input type="file" name="FotoPerfil" id="FotoPerfil">
        </div>
        <div class="Roles">
            <label for="">Roles</label>
            <input type="text" list="Cargo" name="Cargo" value="<?php echo $Cargo; ?>">
                <datalist id="Cargo">
                    <option value="1"></option>
                    <option value="2"></option>
                </datalist>
            </input list>
        </div>
        <div class="NomAlumno">
            <label for="">Nombre Completo</label>
            <input type="text" name="Nombre_Completo" id="NombreAlumno" value="<?php echo $Nombre_Completo; ?>">
        </div>
        <div class="Usuario">
            <label for="">Usuario</label>
            <input type="text" name="Usuario" id="Usuario" value="<?php echo $Usuario; ?>">
        </div>
        <div class="FN">
            <label for="">Fecha De Nacimiento</label>
            <input type="date" name="FechaNacimiento" id="Fecha De Nacimiento" value="<?php echo $FechaNacimiento; ?>">
        </div>
        <div class="NumControl">
            <label for="">Número De Control</label>
            <input type="text" name="NumControl" id="NumControl" value="<?php echo $NumControl; ?>">
        </div>
        <div class="CorreoElectronico">
            <label for="">Correo Electronico</label>
            <input type="email" name="CorreoElectronico" id="CorreoElectronico" value="<?php echo $CorreoElectronico; ?>">
        </div>
        <div class="Telefono">
            <label for="">Teléfono</label>
            <input type="tel" name="Telefono" id="Telefono" value="<?php echo $Telefono; ?>">
        </div>
        <div class="TelEmergencia">
            <label for="">Teléfono De Emergencia</label>
            <input type="tel" name="TelefonoEmergencia" id="TelEmergencia" value="<?php echo $TelefonoEmergencia; ?>">
        </div>
        <input type="hidden" name="ID_Admin" value= "<?php echo $ID_Admin; ?>">
        <div class="Editar">
            <button type="submit" id="BotonCrear" name="Editar" value="Editar">Editar</button>
        </div>
        <div class="Cancelar">
            <a href="../InterfacesAdmin/InterfazAdmin.php">Cancelar</a>
        </div>
    </form>
</body>
</html>
<?php
}
?>
