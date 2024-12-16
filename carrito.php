<?php
session_start(); // Iniciar sesión
include('db_connection.php'); // Conexión a la base de datos

// Obtener el ID de sesión actual
$sessionId = session_id();

// Obtener el nombre de usuario activo
$username = $_SESSION['username'];

// Verificar si se ha enviado una solicitud de eliminación
if (isset($_GET['remove'])) {
    $personalizacion_id = intval($_GET['remove']);
    
    // Preparar la consulta de eliminación
    $deleteQuery = $conn->prepare("DELETE FROM personalizacion_polizas WHERE id = ? AND id_usuario = (SELECT id FROM usuarios WHERE username = ?)");
    
    // Verificar si la consulta se preparó correctamente
    if (!$deleteQuery) {
        die("Error en la preparación de la consulta de eliminación: " . $conn->error);
    }

    // Vincular parámetros y ejecutar la consulta de eliminación
    $deleteQuery->bind_param("is", $personalizacion_id, $username);
    $deleteQuery->execute();

    // Redirigir de vuelta al carrito después de la eliminación
    header("Location: carrito.php");
    exit;
}

// Preparar la consulta para obtener los datos del carrito
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
while ($row = $result->fetch_assoc()) {
    $carrito[] = $row;
}

// Calcular el total inicial
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - SaveMe</title>

    <!-- Incluir el archivo CSS -->
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
    <?php include('navbar.php'); ?>

    <div class="container mt-5">
        <h1>Carrito de Compras</h1>

        <!-- Tabla del carrito -->
        <table class="table">
            <thead>
                <tr>
                    <th>Seguro</th>
                    <th>Cobertura Adicional</th>
                    <th>Periodo</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Acción</th>
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
                            <td>
                                <a href="carrito.php?remove=<?= urlencode($item['personalizacion_id']) ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        <?php 
                        // Actualizar el total
                        $total += $item['monto'] * $item['periodo']; 
                        ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">El carrito está vacío.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Mostrar el total -->
        <h3>Total: $<?= number_format($total, 2) ?></h3>

        <!-- Botones de acción -->
        <a href="pago.php" class="btn btn-success">Proceder al Pago</a>
        <a href="personalizar_seguro.php" class="btn btn-secondary">Seguir Comprando</a>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
