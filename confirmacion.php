<?php
session_start();
if (!isset($_GET['status']) || $_GET['status'] !== 'success' || !isset($_GET['monto'])) {
    header("Location: adquisicion_seguros.php");
    exit();
}
$monto = number_format((float)$_GET['monto'], 2);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Seguro - SaveMe</title>
    <link href="css/confirmacion.css" rel="stylesheet">
</head>
<body>
    <main class="confirmation-container">
        <div class="confirmation-box">
            <div class="icon-check">
                <i>&#10003;</i> <!-- Esto representa un checkmark, puedes reemplazarlo por un ícono SVG o una imagen -->
            </div>
            <h1>¡Seguro Adquirido con Éxito!</h1>
            <p>Gracias por confiar en <strong>SaveMe</strong>. Hemos registrado correctamente tu adquisición de seguro.</p>
            <p><strong>Monto Total:</strong> $<?= $monto ?></p>
            <p>Pronto recibirás un correo electrónico con los detalles de tu póliza personalizada.</p>
            <a href="adquisicion_seguros.php" class="btn-primary">Volver a la página anterior</a>
        </div>
    </main>
</body>
</html>
