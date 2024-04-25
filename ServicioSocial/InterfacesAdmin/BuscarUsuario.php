<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Un Alumno</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../EstilosCSS/EstiloBuscarUsuario.css">
</head>
<body>
<?php
include("../Conexión/Conexion.php");
$where="";

if(isset($_GET['Buscar'])){
    $NumControl = $_GET['NumControl'];

    if(!empty($NumControl)){
        $where = "WHERE ID_Admin LIKE '%" . $NumControl . "%' OR Nombre_Completo LIKE '%" . $NumControl . "%' OR Usuario LIKE '%" . $NumControl . "%' OR Correo_Electronico LIKE '%" . $NumControl."%'
        OR Telefono LIKE '%" . $NumControl . "%' OR Telefono_Emergencia LIKE '%" . $NumControl . "%' OR Numero_De_Control LIKE '%" . $NumControl . "%' OR Cargo LIKE '%" . $NumControl . "%' OR Fecha_Nacimiento LIKE '%" . $NumControl . "%'";
               
    }
}
?>
    <form action="" class="Contenido-CrearAlumno" method="get" autocomplete="off">
        <h2>Buscar Usuario</h2>
        <div class="Contenedor-Imagen">
            <img class="LogoArriba" src="../Imagenes/LogosTec.jpg">
        </div>
    <div class="Barra1"></div>
    <div class="Barra2"></div>
        <div class="NumControl">
            <label for="">Busqueda</label>
            <input type="text" name="NumControl" id="NumControl">
        </div>
        <div class="Buscar">
            <button type="submit" id="BotonBuscar" name="Buscar">Buscar</button>
        </div>
        <div class="Regresar">
            <a href="../InterfacesAdmin/InterfazAdmin.php">Regresar</a>
        </div>
        <table>
            <thead>
                <th>ID_Admin</th>
                <th>Nombre_Completo</th>
                <th>Usuario</th>
                <th>Numero_De_Control</th>
                <th>Correo_Electronico</th>
                <th>Teléfono</th>
                <th>Teléfono_Emergencia</th>
                <th>Fecha_Nacimiento</th>
                <th>Cargo</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                <?php
                include("../Conexión/Conexion.php");
                $sql = "SELECT ID_Admin, Nombre_Completo, Usuario, Numero_De_Control, Correo_Electronico, Telefono, Telefono_Emergencia, Fecha_Nacimiento, Cargo FROM usuarios $where";

                 $dato = mysqli_query($Conexion, $sql);

                if($dato->num_rows > 0){
                    while($fila = mysqli_fetch_array($dato)){
                ?>

                <tr>
                    <td> <?php echo $fila['ID_Admin'] ?> </td>
                    <td> <?php echo $fila['Nombre_Completo'] ?> </td>
                    <td> <?php echo $fila['Usuario'] ?> </td>
                    <td> <?php echo $fila['Numero_De_Control'] ?> </td>
                    <td> <?php echo $fila['Correo_Electronico'] ?> </td>
                    <td> <?php echo $fila['Telefono'] ?> </td>
                    <td> <?php echo $fila['Telefono_Emergencia'] ?> </td>
                    <td> <?php echo $fila['Fecha_Nacimiento'] ?> </td>
                    <td> <?php echo $fila['Cargo'] ?> </td>
                    <td> 
                        <?php echo "<a href='../InterfacesAdmin/EditarUsuario.php? ID_Admin=". $fila['ID_Admin']. "'>Editar</a>"; ?>
                    </td>
                </tr>
                <?php
                }
                }else{
                    ?>
                    <tr class="text-center">
                        <td colspan="10"> No Existen Registros </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </form>
</body>
</html>