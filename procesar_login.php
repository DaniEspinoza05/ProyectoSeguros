<?php
session_start(); // Iniciar sesión para mantener al usuario conectado
include('db_connection.php'); // Archivo de conexión a la base de datos

// Habilitar errores para diagnóstico (solo en desarrollo, no en producción)
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario y sanitizarlos
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Consulta a la base de datos para verificar el usuario
    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Si las credenciales son correctas, iniciar sesión
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirigir al dashboard o página principal
        exit();
    } else {
        // Si son incorrectas, mostrar un mensaje de error
        $error = "Usuario o contraseña incorrectos.";
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
    <div class="container mt-5">
        <h1 class="text-center">Iniciar Sesión</h1>
        <form method="POST" action="procesar_login.php">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="form-group mt-3">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
            </div>
            <!-- Mostrar mensaje de error si ocurre -->
            <?php if (isset($error)): ?>
                <p class="text-danger mt-3 text-center"><?= $error ?></p>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary btn-block mt-4">Ingresar</button>
        </form>
    </div>
</body>
</html>
