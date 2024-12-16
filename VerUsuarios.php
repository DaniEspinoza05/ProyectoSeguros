<?php
session_start();
include('db_connection.php'); // Archivo de conexión a la base de datos
include('navbarAdmin.php'); // Navbar para el diseño superior

// Verificar si el usuario tiene rol de administrador
if (!isset($_SESSION['username']) || $_SESSION['rol'] != 1) {
    echo "<h1>Acceso denegado</h1>";
    echo "<p>No tienes permiso para acceder a esta página.</p>";
    echo "<a href='login.php'>Volver al inicio</a>";
    exit();
}

// Consulta para obtener todos los usuarios
$query = "SELECT id, username, rol FROM usuarios";
$result = $conn->query($query);

if (!$result) {
    die("Error al obtener los usuarios: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <style>
        .table-container {
            max-width: 80%;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            background-color: #fff;
        }
        .table-container h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
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
        <h2>Lista de Usuarios</h2>

        <!-- Tabla de usuarios -->
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['username']) ?></td>
                            <td>
                                <?= $row['rol'] == 1 ? 'Administrador' : 'Usuario' ?>
                            </td>
                            <td>
                                <a href="EditarUsuario.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="EliminarUsuario.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</a>
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
