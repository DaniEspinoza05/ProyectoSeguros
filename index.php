<?php
session_start();
include('navbar.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a SaveMe</title>

    <!-- Incluir el archivo CSS -->
    <link href="css/index.css" rel="stylesheet"> <!-- Asegúrate de que la ruta sea correcta -->
</head>
<body>
    <!-- Principal -->
    <main class="container mt-5">
        <h1 class="text-center">Bienvenido a SaveMe</h1>
        <h3 class="text-center">Te protegemos a toda costa</h3>

        <section class="mt-5">
            <h2 class="text-center text-orange">Los seguros más confiables y amigables a su bolsillo</h2>
            <p class="text-center">Contamos con los precios más competitivos en el mercado con las pólizas más completas en todo el campo.</p>
            <img src="./images/index1.jpg" alt="Seguros confiables" class="img-fluid rounded">
        </section>

        <section class="mt-5">
            <h2 class="text-center text-orange">Nos ahorramos el papeleo fastidioso</h2>
            <h3 class="text-center">Puede realizar su registro en cuestión de minutos:</h3>
            <ol class="text-left mx-auto" style="max-width: 600px;">
                <li>Seleccione el tipo de seguro al que gustaría aplicar y cotizar.</li>
                <li>Realice y envíe un breve formulario con la información necesaria para su registro.</li>
                <li>En cuestión de un par de días, un agente nuestro se encargará de contactarlo e informarle todo sobre su póliza y cotización.</li>
            </ol>
            <img src="./images/index2.jpg" alt="Registro rápido" class="img-fluid rounded">
        </section>

        <section class="mt-5">
            <h2 class="text-center text-orange">¿Por qué elegir SaveMe?</h2>
            <p class="text-center">Ofrecemos atención personalizada y asesoría en cada paso del proceso.</p>
            <img src="./images/index3.jpeg" alt="Atención personalizada" class="img-fluid rounded">
        </section>
    </main>

    <?php include('footer.php'); ?>
</body>
</html>
