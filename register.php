<?php 
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);
    
    // Validar que las contraseñas coincidan
    if ($password === $confirm_password) {
        // Hashear la contraseña antes de almacenarla
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertar el usuario en la base de datos
        $query = "INSERT INTO usuarios (username, password) VALUES ('$username', '$hashed_password')";

        if ($conn->query($query) === TRUE) {
            header("Location: login.php"); // Redirigir al login
            exit();
        } else {
            $error = "Error: " . $conn->error;
        }
    } else {
        $error = "Las contraseñas no coinciden.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - SaveMe</title>
    <!-- Vincular el archivo CSS -->
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h1>Registro</h1>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmar Contraseña</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Vuelve a ingresar tu contraseña" required>
            </div>
            
            <!-- Mostrar mensaje de error si ocurre -->
            <?php if (isset($error)): ?>
                <p class="error-message"><?= $error ?></p>
            <?php endif; ?>

            <button type="submit" class="btn-login">Registrar</button>
        </form>
        <p class="text-center mt-3">¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></p>
    </div>
</body>
</html>
