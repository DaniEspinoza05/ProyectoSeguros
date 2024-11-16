<?php
session_start();
include('config.php');

// Verificar si el administrador está logueado
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

// Obtener seguros y usuarios, gestionar el estado, etc...
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - Gestión de Seguros y Usuarios</title>

    <!-- Incluir el archivo CSS -->
    <link href="css/index.css" rel="stylesheet"> <!-- Ajusta la ruta si es necesario -->
</head>
<body>
    <div class="container mt-5">
        <h2>Panel Administrativo</h2>

        <!-- Formulario para agregar un seguro -->
        <form method="POST">
            <h4>Agregar Seguro</h4>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>
            <div class="mb-3">
                <label for="monto" class="form-label">Monto</label>
                <input type="number" class="form-control" id="monto" name="monto" required>
            </div>
            <button type="submit" name="addSeguro" class="btn btn-success">Agregar Seguro</button>
        </form>

        <!-- Tabla de seguros y usuarios aquí -->

    </div>
</body>
</html>