<?php
session_start();
include('db_connection.php'); // Incluye tu conexión a la base de datos

// Verificar acceso
if (!isset($_SESSION['username']) || $_SESSION['rol'] != 1) {
    header('Location: login.php');
    exit();
}

// Obtener el ID del seguro a editar
if (!isset($_GET['id'])) {
    header('Location: ver_seguros.php?msg=ID no especificado');
    exit();
}

$id = intval($_GET['id']); // Sanitizar el ID

// Consultar los datos del seguro
$query = "SELECT * FROM seguros WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header('Location: ver_seguros.php?msg=Seguro no encontrado');
    exit();
}

$seguro = $result->fetch_assoc();

// Procesar el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $tipo = $conn->real_escape_string($_POST['tipo']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $cobertura = $conn->real_escape_string($_POST['cobertura']);
    $prima_mensual = $conn->real_escape_string($_POST['prima_mensual']);
    $fecha_disponible_desde = $conn->real_escape_string($_POST['fecha_disponible_desde']);
    $fecha_disponible_hasta = $conn->real_escape_string($_POST['fecha_disponible_hasta']);
    $id_tipo_seguro = $conn->real_escape_string($_POST['id_tipo_seguro']);

    $query = "UPDATE seguros SET 
                nombre = ?, 
                tipo = ?, 
                descripcion = ?, 
                cobertura = ?, 
                prima_mensual = ?, 
                fecha_disponible_desde = ?, 
                fecha_disponible_hasta = ?, 
                id_tipo_seguro = ? 
              WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param(
        "sssdissii",
        $nombre,
        $tipo,
        $descripcion,
        $cobertura,
        $prima_mensual,
        $fecha_disponible_desde,
        $fecha_disponible_hasta,
        $id_tipo_seguro,
        $id
    );

    if ($stmt->execute()) {
        header("Location: VerSeguros.php?msg=Seguro actualizado exitosamente");
        exit();
    } else {
        echo "Error al actualizar el seguro: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Seguro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Seguro</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($seguro['nombre']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" value="<?= htmlspecialchars($seguro['tipo']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required><?= htmlspecialchars($seguro['descripcion']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="cobertura" class="form-label">Cobertura</label>
                <input type="number" class="form-control" id="cobertura" name="cobertura" value="<?= htmlspecialchars($seguro['cobertura']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="prima_mensual" class="form-label">Prima Mensual</label>
                <input type="number" class="form-control" id="prima_mensual" name="prima_mensual" value="<?= htmlspecialchars($seguro['prima_mensual']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha_disponible_desde" class="form-label">Fecha Disponible Desde</label>
                <input type="date" class="form-control" id="fecha_disponible_desde" name="fecha_disponible_desde" value="<?= htmlspecialchars($seguro['fecha_disponible_desde']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha_disponible_hasta" class="form-label">Fecha Disponible Hasta</label>
                <input type="date" class="form-control" id="fecha_disponible_hasta" name="fecha_disponible_hasta" value="<?= htmlspecialchars($seguro['fecha_disponible_hasta']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_tipo_seguro" class="form-label">Tipo Seguro (ID)</label>
                <input type="number" class="form-control" id="id_tipo_seguro" name="id_tipo_seguro" value="<?= htmlspecialchars($seguro['id_tipo_seguro']) ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar Seguro</button>
            <a href="VerSeguros.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</body>
</html>
