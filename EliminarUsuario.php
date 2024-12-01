<?php
session_start();
include('db_connection.php'); // Archivo de conexión a la base de datos

// Verificar si el usuario tiene acceso
if (!isset($_SESSION['username']) || $_SESSION['rol'] != 1) {
    echo "<h1>Acceso denegado</h1>";
    echo "<p>No tienes permiso para acceder a esta página.</p>";
    echo "<a href='login.php'>Volver al inicio</a>";
    exit();
}

// Verificar si se recibió un ID de usuario
if (!isset($_GET['id'])) {
    header('Location: VerUsuarios.php'); // Redirigir si no se proporciona ID
    exit();
}

$id = intval($_GET['id']); // Sanitizar el ID para evitar inyección SQL

// Verificar que el usuario existe
$query = "SELECT id FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "<h1>Usuario no encontrado</h1>";
    echo "<p>El usuario que intentas eliminar no existe.</p>";
    echo "<a href='VerUsuarios.php'>Volver a la lista de usuarios</a>";
    exit();
}

// Procesar la eliminación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deleteQuery = "DELETE FROM usuarios WHERE id = ?";
    $deleteStmt = $conn->prepare($deleteQuery);
    $deleteStmt->bind_param("i", $id);

    if ($deleteStmt->execute()) {
        echo "<div class='alert alert-success text-center'>¡Usuario eliminado con éxito!</div>";
        header("refresh:2;url=VerUsuarios.php");
        exit();
    } else {
        echo "<div class='alert alert-danger text-center'>Error al eliminar el usuario: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }
        .form-container h2 {
            text-align: center;
            color: #dc3545;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Eliminar Usuario</h2>
        <p class="text-center text-danger">
            ¿Estás seguro de que deseas eliminar este usuario? Esta acción no se puede deshacer.
        </p>

        <!-- Confirmación para eliminar usuario -->
        <form method="POST" action="">
            <div class="text-center">
                <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                <a href="VerUsuarios.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>