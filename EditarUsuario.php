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
    header('Location: VerUsuarios.php');
    exit();
}

$id = intval($_GET['id']); // Sanitizar el ID para evitar inyección SQL

// Obtener datos del usuario a editar
$query = "SELECT id, username, rol FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "<h1>Usuario no encontrado</h1>";
    echo "<p>El usuario que intentas editar no existe.</p>";
    echo "<a href='VerUsuarios.php'>Volver a la lista de usuarios</a>";
    exit();
}

// Procesar formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevoUsername = $conn->real_escape_string($_POST['username']);
    $nuevoRol = intval($_POST['rol']);

    // Actualizar usuario
    $updateQuery = "UPDATE usuarios SET username = ?, rol = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("sii", $nuevoUsername, $nuevoRol, $id);

    if ($updateStmt->execute()) {
        echo "<div class='alert alert-success text-center'>¡Usuario actualizado con éxito!</div>";
        header("refresh:2;url=VerUsuarios.php");
        exit();
    } else {
        echo "<div class='alert alert-danger text-center'>Error al actualizar el usuario: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
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
            color: #007bff;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Editar Usuario</h2>

        <!-- Formulario para editar usuario -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-control" id="rol" name="rol" required>
                    <option value="1" <?= $user['rol'] == 1 ? 'selected' : '' ?>>Administrador</option>
                    <option value="2" <?= $user['rol'] == 2 ? 'selected' : '' ?>>Usuario</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Actualizar Usuario</button>
        </form>
        <div class="mt-3 text-center">
            <a href="VerUsuarios.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
