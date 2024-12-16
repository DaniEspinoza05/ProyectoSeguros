<?php
session_start();
include('db_connection.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar con Tarjeta - SaveMe</title>
    <link href="css/index.css" rel="stylesheet">
    <script type = "text/javascript" src="js/JavaScript.js"></script>
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <h1>Pagar con Tarjeta de Crédito</h1>
        <label style="font-weight: bold;">Favor ingresar la informacion de su tarjeta de credito/debito:</label>
        <form action="confirmacion_compra.php" method="post">
            <div>
                <label for="numero_tarjeta">Número de Tarjeta:</label>
                <input type="text" id="numero_tarjeta" name="numero_tarjeta" required>
            </div>
            <div>
                <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
                <input type="month" id="fecha_vencimiento" name="fecha_vencimiento" required>
            </div>
            <div>
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" maxlength="3" required>
            </div>
            <br>
            <button type="button" class="btn btn-success" onclick="vaciarTablaYConfirmar()">Pagar</button>
            <button class="btn btn-secondary" onclick="window.location.href='pago.php'">Volver</button>

        </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
