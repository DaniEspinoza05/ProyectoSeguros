<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Compra - SaveMe</title>
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5 text-center">
        <h1>¡Compra Realizada con Éxito!</h1>
        <p>Gracias por confiar en <strong>SaveMe</strong>. Nuestros agentes revisarán el pago realizado.</p>
        <p>Una vez habilitado el servicio, recibirá un correo electrónico con los detalles de la compra y la póliza adquirida.</p>
        <br>
        <button class="btn btn-primary" onclick="window.location.href='index.php'">Volver al Menú Principal</button>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
