<?php
session_start();
include('db_connection.php'); // Archivo de conexión a la base de datos

// Si el usuario ya está autenticado, redirigir
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Usar consultas preparadas para evitar inyecciones SQL
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
            // Guardar información en la sesión
            $_SESSION['username'] = $username;
            $_SESSION['rol'] = $user['rol']; // Guardar el rol del usuario

            // Redirigir según el rol
            if ($_SESSION['rol'] == 1) {
                header("Location: index.php"); // Panel administrativo
            } else {
                header("Location: index.php"); // Página normal para usuarios
            }
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - SaveMe</title>
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
            </div>
            
            <!-- Mostrar mensaje de error si ocurre -->
            <?php if (isset($error)): ?>
                <p class="error-message"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <button type="submit" class="btn-login">Ingresar</button>
        </form>
        <p class="text-center mt-3">¿No tienes una cuenta? <a href="register.php">Registrarse</a></p>
    </div>
</body>
</html>
