<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio De Sesión</title>
    <link rel="stylesheet" href="../EstilosCSS/EstiloLoginAdmin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="Contenedor-Imagen">
        <img class="LogoArriba" src="../Imagenes/LogosTec.jpg">
    </div>
    <div class="Barra1"></div>
    <img class="ImgSV" src="../Imagenes/LogoServicio.jpg" alt="">
    <div class="Container3">
        <form action="../Validación/ValidarLogin.php" method="post" autocomplete="off">
            <h1 class="Title">Bienvenido</h1>
            <h3 class="Title2">Inicie Sesión</h3>
        <label>
            <i class='bx bxs-user'></i>
            <input placeholder="Ingrese Su Usuario" type="text" id="Usuario" name="Usuario">
        </label>
        <label>
            <i class='bx bxs-lock-alt'></i>
            <input placeholder="Ingrese Su Contraseña" type="password" id="Contraseña" name="Contraseña">
        </label>
        <div class="Ingresar">
        <button id="Button" type="submit">Ingresar</button>
        </div>
        </form>
    </div>
    <div class="Barra2"></div>
</body>
</html>