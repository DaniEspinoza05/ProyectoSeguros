<?php
session_start();
include('navbarAdmin.php');
include('db_connection.php'); // Archivo de conexión a la base de datos

class Administrativo
{
    private $conn;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
        $this->verificarAcceso();
    }

    // Verificar acceso: usuario logueado y rol de administrador
    private function verificarAcceso()
    {
        if (!isset($_SESSION['username'])) {
            header('Location: login.php');
            exit();
        }

        if ($_SESSION['rol'] != 1) {
            echo "<h1>Acceso denegado</h1>";
            echo "<p>No tienes permiso para acceder a esta página.</p>";
            echo "<a href='index.php'>Volver al inicio</a>";
            exit();
        }
    }

    // Procesar el formulario enviado
    public function procesarFormulario()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addSeguro'])) {
            // Recopilar datos del formulario
            $nombre = $this->sanitizeInput($_POST['nombre']);
            $tipo = $this->sanitizeInput($_POST['tipo']);
            $descripcion = $this->sanitizeInput($_POST['descripcion']);
            $cobertura = floatval($_POST['cobertura']);
            $prima_mensual = floatval($_POST['prima_mensual']);
            $fecha_disponible_desde = $this->sanitizeInput($_POST['fecha_disponible_desde']);
            $fecha_disponible_hasta = $this->sanitizeInput($_POST['fecha_disponible_hasta']);
            $id_tipo_seguro = intval($_POST['id_tipo_seguro']);

            // Validaciones
            $errores = $this->validarDatos($fecha_disponible_desde, $fecha_disponible_hasta, $cobertura, $prima_mensual);
            if (!empty($errores)) {
                return $errores; // Mostrar errores de validación
            }

            // Insertar en la base de datos
            $stmt = $this->conn->prepare("INSERT INTO seguros 
                (nombre, tipo, descripcion, cobertura, prima_mensual, fecha_disponible_desde, fecha_disponible_hasta, id_tipo_seguro) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(
                "sssdissi",
                $nombre,
                $tipo,
                $descripcion,
                $cobertura,
                $prima_mensual,
                $fecha_disponible_desde,
                $fecha_disponible_hasta,
                $id_tipo_seguro
            );

            if ($stmt->execute()) {
                return "¡El seguro se agregó exitosamente!";
            } else {
                return "Error al agregar el seguro: " . $this->conn->error;
            }
        }
        return null; // Si no se envió el formulario
    }

    // Validar datos del formulario
    private function validarDatos($fechaDesde, $fechaHasta, $cobertura, $primaMensual)
    {
        $errores = "";
        if (strtotime($fechaDesde) > strtotime($fechaHasta)) {
            $errores .= "La fecha de inicio no puede ser posterior a la fecha de finalización.<br>";
        }
        if ($cobertura <= 0 || $primaMensual <= 0) {
            $errores .= "Cobertura y Prima Mensual deben ser números positivos.<br>";
        }
        return $errores;
    }

    // Sanitizar entradas para evitar ataques XSS
    private function sanitizeInput($input)
    {
        return htmlspecialchars(strip_tags(trim($input)));
    }
}

// Instanciar la clase Administrativo y procesar el formulario
$administrativo = new Administrativo($conn);
$mensaje = $administrativo->procesarFormulario();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - Gestión de Seguros</title>
    <link href="css/index.css" rel="stylesheet">
    <!-- Bootstrap CSS para mejor diseño -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Panel Administrativo</h2>

        <!-- Mostrar mensajes de éxito o error -->
        <?php if ($mensaje): ?>
            <div class="alert <?= strpos($mensaje, 'Error') === false ? 'alert-success' : 'alert-danger' ?>">
                <?= htmlspecialchars($mensaje) ?>
            </div>
        <?php endif; ?>

        <!-- Formulario para agregar un seguro -->
        <form method="POST" class="p-4 shadow rounded" style="max-width: 600px; margin: auto; background-color: #f8f9fa;">
            <h4 class="text-center mb-4">Agregar Seguro</h4>
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
                <label for="cobertura" class="form-label">Cobertura</label>
                <input type="number" class="form-control" id="cobertura" name="cobertura" min="0" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="prima_mensual" class="form-label">Prima Mensual</label>
                <input type="number" class="form-control" id="prima_mensual" name="prima_mensual" min="0" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="fecha_disponible_desde" class="form-label">Fecha Disponible Desde</label>
                <input type="date" class="form-control" id="fecha_disponible_desde" name="fecha_disponible_desde" required>
            </div>
            <div class="mb-3">
                <label for="fecha_disponible_hasta" class="form-label">Fecha Disponible Hasta</label>
                <input type="date" class="form-control" id="fecha_disponible_hasta" name="fecha_disponible_hasta" required>
            </div>
            <div class="mb-3">
                <label for="id_tipo_seguro" class="form-label">ID Tipo Seguro</label>
                <input type="number" class="form-control" id="id_tipo_seguro" name="id_tipo_seguro" min="1" required>
            </div>
            <button type="submit" name="addSeguro" class="btn btn-primary w-100">Procesar Seguro</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include('footer.php'); ?>
</body>
</html>
