<?php
// Conexión a la base de datos
$ConexionBackup = mysqli_connect("localhost", "root", "", "serviciosocial");

// Verificar la conexión
if (!$ConexionBackup) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

// Nombre del archivo de respaldo
$archivo_respaldo = 'respaldo.sql';

// Obtener todas las tablas de la base de datos
$sql = "SHOW TABLES";
$resultado = mysqli_query($ConexionBackup, $sql);

// Iniciar el archivo de respaldo
$archivo = fopen($archivo_respaldo, 'w');

// Iterar sobre las tablas
while ($tabla = mysqli_fetch_row($resultado)) {
    $nombre_tabla = $tabla[0];
    $sql_tabla = "SHOW CREATE TABLE $nombre_tabla";
    $resultado_tabla = mysqli_query($ConexionBackup, $sql_tabla);
    $fila = mysqli_fetch_row($resultado_tabla);
    $create_table = $fila[1] . ";";
    
    // Escribir la estructura de la tabla en el archivo
    fwrite($archivo, "\n\n" . $create_table . "\n\n");

    // Consulta SQL para obtener los datos de la tabla
    $sql_data = "SELECT * FROM $nombre_tabla";
    $resultado_data = mysqli_query($ConexionBackup, $sql_data);

    // Iterar sobre los datos de la tabla y escribir en el archivo
    while ($fila_data = mysqli_fetch_assoc($resultado_data)) {
        $sql_insert = "INSERT INTO $nombre_tabla VALUES (";
        foreach ($fila_data as $valor) {
            $sql_insert .= "'$valor', ";
        }
        $sql_insert = substr($sql_insert, 0, -2) . ");";
        fwrite($archivo, $sql_insert . "\n");
    }
}

// Cerrar el archivo de respaldo
fclose($archivo);

// Cerrar la conexión a la base de datos
mysqli_close($ConexionBackup);
?>

<script>
    // Mostrar una alerta al usuario
    alert("El respaldo se ha creado correctamente en el archivo <?php echo $archivo_respaldo; ?>");
</script>
