<?php
session_start();
include('../Conexión/Conexion.php');

if (isset($_SESSION['Usuario']) && isset($_SESSION['Contraseña'])) {
    $Usuario = $_SESSION['Usuario'];
    $Contraseña = $_SESSION['Contraseña'];

    $Consulta = "SELECT * FROM Usuarios WHERE Usuario='$Usuario' AND Numero_De_Control='$Contraseña'";
    $Resultado = mysqli_query($Conexion, $Consulta);

    if ($Resultado && mysqli_num_rows($Resultado) > 0) {
        $Filas = mysqli_fetch_assoc($Resultado);
        $Nombre_Completo = $Filas['Nombre_Completo'];
        $FotoPerfil = $Filas['Foto'];
    } else {
        // Manejar el caso en que no se encuentre el usuario en la base de datos
        exit("Error: Usuario no encontrado");
    }

    mysqli_free_result($Resultado);
} else {
    // Manejar el caso en que no se hayan proporcionado las credenciales
    exit("Error: Credenciales no definidas");
}

// Respaldar la base de datos cuando se haga clic en el botón "Back Up"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["backup"])) {
    include('../BackUP/Backup.php'); // Incluir el archivo de respaldo
}

// Restaurar la base de datos cuando se haga clic en el botón "Restore"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["restore"])) {
    include('../Restore/Restore.php'); // Incluir el archivo de restauración
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio De Sesión</title>
    <link rel="stylesheet" href="../EstilosCSS/EstiloInterfazAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="Contenedor-Imagen">
        <img class="LogoArriba" src="../Imagenes/LogosTec.jpg">
    </div>
    <div class="Barra1"></div>
    <form method="post">
        <div class="ContenedorLogoTec">
            <img src="../Imagenes/LogoTec.png" alt="">
        </div>
        <div class="ContenedorPerfil">
            <img src="<?php echo $FotoPerfil; ?>" alt="Foto de perfil" style="max-width: 150px;">
        </div>
        <div class="NombreAdmin">
            <h1><?php echo $Nombre_Completo;?></h1>
        </div>
        <div class="Icono1">
            <i class="fa-sharp fa-solid fa-graduation-cap"></i>
            <a href="../InterfacesAdmin/CrearAlumno.php">Crear Alumno</a>
        </div>
        <div class="Icono2">
            <i class="fa-solid fa-magnifying-glass"></i>
            <a href="../InterfacesAdmin/BuscarAlumno.php">Buscar Alumno</a>
        </div>
        <div class="Icono3">
            <i class="fa-solid fa-clipboard"></i>
            <button type="submit">Reportes Alumno</button>
        </div>
        <div class="Icono4">
            <i class="fa-solid fa-user-plus"></i>
            <a href="../InterfacesAdmin/CrearUsuario.php">Crear Usuario</a>
        </div>
        <div class="Icono5">
            <i class="fa-solid fa-clock"></i>
            <a href="../InterfacesAdmin/AgregarHoras.html">Agregar Horas</a>
        </div>
        <div class="Icono6">
            <i class="fa-solid fa-floppy-disk"></i>
            <button type="submit" name="backup">Back Up</button>
        </div>
        <div class="Icono7">
            <i class="fa-solid fa-floppy-disk"></i>
            <button type="submit" name="restore">Restore</button>
        </div>
        <div class="Icono8">
            <i class="fa-solid fa-magnifying-glass"></i>
            <a href="../InterfacesAdmin/BuscarUsuario.php">Buscar Usuario</a>
        </div>
    </form>
    <div class="Barra2"></div>
</body>
</html>
