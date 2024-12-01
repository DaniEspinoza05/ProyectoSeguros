<?php
session_start();
include('navbar.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - SaveMe</title>

    <!-- Incluir el archivo CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap para estilos comunes -->
    <link href="css/index.css" rel="stylesheet"> <!-- Ajusta la ruta si es necesario para que apunte a tu archivo CSS general -->
</head>
<body>
    <main class="container mt-5">
        <h1>Sobre Nosotros</h1>
        <section>
            <p>
                SaveMe es una compañía dedicada a ofrecer los seguros más confiables y accesibles para todas las familias.
                Nuestro objetivo es protegerte en cada paso del camino con servicios personalizados y atención de calidad.
            </p>
            <p>
                Contamos con un equipo de profesionales con amplia experiencia en el sector asegurador, comprometidos con tu seguridad y bienestar.
            </p>
            <img src="./images/sobre-nosotros.jpg" alt="Equipo SaveMe" class="img-fluid">
        </section>
    </main>

    <?php include('footer.php'); ?>
</body>
</html>
