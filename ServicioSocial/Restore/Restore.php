<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "serviciosocial");

// Verificar la conexión
if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}

// Leer el archivo de respaldo SQL
$archivo_respaldo = 'respaldo.sql';
$respaldo_sql = file_get_contents($archivo_respaldo);

// Separar las consultas del respaldo
$consultas = explode(";", $respaldo_sql);

// Eliminar todas las tablas existentes
$conexion->query("SET FOREIGN_KEY_CHECKS = 0");
$conexion->query("DROP DATABASE IF EXISTS serviciosocial");
$conexion->query("CREATE DATABASE serviciosocial");
$conexion->query("USE serviciosocial");

// Ejecutar las consultas para crear las tablas y restaurar los datos
foreach ($consultas as $consulta) {
    $consulta = trim($consulta);
    if (!empty($consulta)) {
        $conexion->query($consulta);
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restauración completada</title>
    <script>
        window.onload = function() {
            alert("La base de datos se ha restaurado correctamente desde el archivo <?php echo $archivo_respaldo; ?>");
        };
    </script>
</head>
<body>
</body>
</html>
