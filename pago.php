<?php
session_start(); // Iniciar sesión
include('db_connection.php'); // Conexión a la base de datos

// Obtener el nombre de usuario activo
$username = $_SESSION['username'];

// Obtener productos en el carrito
$query = $conn->prepare("
    SELECT 
        p.id AS personalizacion_id, 
        s.nombre, 
        p.cobertura_adicional, 
        p.periodo, 
        s.prima_mensual AS monto 
    FROM personalizacion_polizas p
    JOIN seguros s ON p.id_seguro = s.id
    WHERE p.id_usuario = (SELECT id FROM usuarios WHERE username = ?)
");

// Verificar si la consulta se preparó correctamente
if (!$query) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

// Vincular parámetros y ejecutar la consulta
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();

// Almacenar los resultados en un array
$carrito = [];
$total = 0;
while ($row = $result->fetch_assoc()) {
    $carrito[] = $row;
    $total += $row['monto'] * $row['periodo'];
}

// Obtener métodos de pago
$pagoQuery = $conn->prepare("SELECT id, nombre_metodo, descripcion FROM metodos_pago");
$pagoQuery->execute();
$pagoResult = $pagoQuery->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Pago - SaveMe</title>

    <link href="css/index.css" rel="stylesheet">
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .btn {
            padding: 10px 15px;
            margin: 5px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .btn-success { background-color: #28a745; }
        .btn-secondary { background-color: #6c757d; }
        h3, h4 { margin-top: 20px; }
    </style>
</head>
<body>
    <?php include('navbar.php'); ?>

    <div class="container mt-5">
        <h1>Resumen de Pago</h1>

        <!-- Resumen del carrito -->
        <table class="table">
            <thead>
                <tr>
                    <th>Seguro</th>
                    <th>Cobertura Adicional</th>
                    <th>Periodo</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($carrito)): ?>
                    <?php foreach ($carrito as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['nombre']) ?></td>
                            <td><?= htmlspecialchars($item['cobertura_adicional']) ?></td>
                            <td><?= intval($item['periodo']) ?> meses</td>
                            <td>$<?= number_format($item['monto'], 2) ?></td>
                            <td>$<?= number_format($item['monto'] * $item['periodo'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No hay productos en el carrito.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Mostrar el total -->
        <h3>Total a pagar: $<?= number_format($total, 2) ?></h3>

        <!-- Selección de métodos de pago -->
        <h4>Selecciona tu método de pago:</h4>
        <form action="procesar_pago.php" method="POST">
            <table class="table">
                <thead>
                    <tr>
                        <th>Seleccionar</th>
                        <th>Método</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($metodo = $pagoResult->fetch_assoc()): ?>
                        <tr>
                            <td>
                                <input type="radio" name="metodo_pago" value="<?= $metodo['id'] ?>" required>
                            </td>
                            <td><?= htmlspecialchars($metodo['nombre_metodo']) ?></td>
                            <td><?= htmlspecialchars($metodo['descripcion']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Botones de acción -->
            <div>
                <button type="submit" class="btn btn-success">Pagar</button>
                <a href="carrito.php" class="btn btn-secondary">Volver al Carrito</a>
            </div>
        </form>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
