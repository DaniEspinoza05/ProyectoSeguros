<?php
session_start();
include('db_connection.php');
include('navbarAdmin.php'); // Navbar para el diseño superior

// Verificar si el usuario está logueado y es administrador
if (!isset($_SESSION['username']) || $_SESSION['rol'] != 1) {
    header('Location: login.php');
    exit();
}

// Obtener todos los seguros desde la base de datos
$query = "SELECT * FROM seguros";
$result = $conn->query($query);

if (!$result) {
    die("Error al obtener seguros: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Seguros Disponibles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <style>
        .table-container {
            max-width: 90%; /* Más ancho, ajusta según prefieras */
            margin: 0 auto; /* Centrar el contenedor */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            background-color: #fff;
        }
        .table-container h2 {
            margin-bottom: 20px;
            color: #007bff;
            text-align: center;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .btn-volver {
            margin-top: 20px;
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h2>Lista de Seguros Disponibles</h2>

        <!-- Tabla de seguros dentro de un contenedor responsivo -->
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Cobertura</th>
                        <th>Prima Mensual</th>
                        <th>Disponible Desde</th>
                        <th>Disponible Hasta</th>
                        <th>Tipo Seguro (ID)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['nombre']) ?></td>
                            <td><?= htmlspecialchars($row['tipo']) ?></td>
                            <td><?= htmlspecialchars($row['descripcion']) ?></td>
                            <td><?= number_format($row['cobertura'], 2) ?></td>
                            <td><?= number_format($row['prima_mensual'], 2) ?></td>
                            <td><?= htmlspecialchars($row['fecha_disponible_desde']) ?></td>
                            <td><?= htmlspecialchars($row['fecha_disponible_hasta']) ?></td>
                            <td><?= htmlspecialchars($row['id_tipo_seguro']) ?></td>
                            <td>
                            <a href="administrativo.php?id=<?= $row['id'] ?>" class="btn btn-primary">Añadir</a>
                            <a href="EditarSeguro.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="EliminarSeguro.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este seguro?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include('footer.php'); ?>
</body>
</html>
