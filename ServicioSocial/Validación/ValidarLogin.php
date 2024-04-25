<?php
// Verifica si el índice 'Usuario' está definido en $_POST
if (isset($_POST['Usuario'])) {
    $Usuario = $_POST['Usuario'];
} else {
    // Maneja el caso en que 'Usuario' no está definido
    // Por ejemplo, redireccionar a una página de error o mostrar un mensaje de error
    exit("Error: Usuario no definido");
}

// Verifica si el índice 'Contraseña' está definido en $_POST
if (isset($_POST['Contraseña'])) {
    $Contraseña = $_POST['Contraseña'];
} else {
    // Maneja el caso en que 'Contraseña' no está definido
    // Por ejemplo, redireccionar a una página de error o mostrar un mensaje de error
    exit("Error: Contraseña no definida");
}

session_start();
$_SESSION['Usuario'] = $Usuario;
$_SESSION['Contraseña'] = $Contraseña;

include('../Conexión/Conexion.php');

$Consulta = "SELECT * FROM Usuarios WHERE Usuario='$Usuario' AND Numero_De_Control='$Contraseña'";
$Resultado = mysqli_query($Conexion, $Consulta);

$Filas=mysqli_fetch_array($Resultado);

if($Filas['Cargo']==1){
    header("location:../InterfacesAdmin/InterfazAdmin.php");
}else
if($Filas['Cargo']==2){
    header("location:../InterfacesAdmin/CrearAlumno.php");
}
else{
    ?>
    <?php
    include("../InterfacesAdmin/LoginAdmin.php");
    ?>
    <h1>Error En La Autenticación</h1>
    <?php
}

mysqli_free_result($Resultado);
mysqli_close($Conexion);

