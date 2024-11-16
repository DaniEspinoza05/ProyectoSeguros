<?php include('navbar.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SaveMe</title>

    <!-- Incluir el archivo CSS -->
    <link href="css/index.css" rel="stylesheet"> <!-- Ajusta la ruta si es necesario -->
</head>
<body>
    <div class="container mt-5">
        <h2>Iniciar sesión</h2>
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>

        <!-- Apartado para registro -->
        <div class="mt-4 text-center">
            <p>¿No tienes cuenta? <a href="register.php">Regístrate aquí</a>.</p>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
