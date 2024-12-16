<?php
session_start();
include('db_connection.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar en Efectivo - SaveMe</title>
    <link href="css/index.css" rel="stylesheet">
    <script type = "text/javascript" src="js/JavaScript.js"></script>
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <h1>Pagar en Efectivo</h1>
        <p style="font-weight: bold;">Por favor, ingrese el monto exacto con el que pagará en el punto de pago o sucursal:</p>
        <form action="confirmacion_compra.php" method="post">
            <div>
                <label for="monto_efectivo">Monto:</label>
                <input type="number" id="monto_efectivo" name="monto_efectivo" step="0.01" required>
            </div>
            <br>
            <button type="button" class="btn btn-success" onclick="vaciarTablaYConfirmar()">Pagar</button>
            <button class="btn btn-secondary" onclick="window.location.href='pago.php'">Volver</button>
        </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
