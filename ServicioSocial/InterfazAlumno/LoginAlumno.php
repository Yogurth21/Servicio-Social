<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio De Sesión</title>
    <link rel="stylesheet" href="../EstilosCSS/EstiloLoginAlumno.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    include("../Conexión/Conexion.php");
    include "../InterfazAlumno/RegistroEntrada.php";
    ?>
    <div class="Contenedor-Imagen">
        <img class="LogoArriba" src="../Imagenes/LogosTec.jpg">
    </div>
    <div class="Barra1"></div>
    <img class="ImgSV" src="../Imagenes/LogoServicio.jpg" alt="">
    <div class="Container3">
        <form action="" method="post" autocomplete="off">
            <h1 class="Title">Bienvenido</h1>
            <h3 class="Title2">Inicie Sesión</h3>
        <label>
            <i class='bx bxs-lock-alt'></i>
            <input placeholder="Ingrese Su Numero De Control" type="password" id="Contraseña" name="Contraseña">
        </label>
        <div class="Entrada">
        <button id="Button1" type="submit" value="ok">Entrada</button>
        </div>
        <div class="Salida">
        <button id="Button2" type="submit" value="ok">Salida</button>
        </div>
        </form>
    </div>
    <div class="Barra2"></div>
</body>
</html>