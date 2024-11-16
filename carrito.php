<?php session_start(); include('config.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - SaveMe</title>

    <!-- Incluir el archivo CSS -->
    <link href="css/index.css" rel="stylesheet"> <!-- Asegúrate de que la ruta sea correcta -->
</head>
<body>
    <?php include('navbar.php'); ?>

    <div class="container mt-5">
        <h1>Carrito de Compras</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Seguro</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['carrito'] as $seguroId => $seguro): ?>
                    <tr>
                        <td><?= $seguro['nombre'] ?></td>
                        <td><?= $seguro['cantidad'] ?></td>
                        <td>$<?= number_format($seguro['monto'], 2) ?></td>
                        <td>$<?= number_format($seguro['monto'] * $seguro['cantidad'], 2) ?></td>
                        <td><a href="carrito.php?remove=<?= $seguroId ?>" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Total: $<?= number_format($total, 2) ?></h3>

        <a href="pago.php" class="btn btn-success">Proceder al Pago</a>
        <a href="nuestros.php" class="btn btn-secondary">Seguir Comprando</a>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
