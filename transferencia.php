<?php
session_start();
include('db_connection.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar con Transferencia - SaveMe</title>
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <h1>Pagar mediante Transferencia</h1>
        <form action="confirmacion_compra.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="comprobante" style="font-weight: bold;">Subir Comprobante de Transferencia (PDF o Imagen):</label>
                <input type="file" id="comprobante" name="comprobante" accept=".pdf, .jpg, .jpeg, .png" required>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Pagar</button>
            <button class="btn btn-secondary" onclick="window.location.href='pago.php'">Volver</button>

        </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
