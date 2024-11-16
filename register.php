
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar - SaveMe</title>

    <!-- Incluir el archivo CSS común para todo el sitio -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet"> <!-- Asegúrate de usar este archivo CSS común -->
</head>
<body>
    <?php include('navbar.php'); ?> <!-- Incluir barra de navegación común -->

    <div class="container mt-5">
        <h1 class="text-center">Registrar Usuario</h1>

        <!-- Mostrar mensaje de error si existe -->
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger"><?= $error_message ?></div>
        <?php endif; ?>

        <!-- Formulario de registro -->
        <form method="POST" class="mt-4">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
        </form>

        <!-- Enlace para ir a la página de login -->
        <div class="mt-3 text-center">
            <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
        </div>
    </div>

    <?php include('footer.php'); ?> <!-- Incluir pie de página común -->
</body>
</html>
