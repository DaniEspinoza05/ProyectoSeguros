<?php
session_start();
include('navbar.php');
include('db_connection.php'); // Conexión a la base de datos

// Consulta para obtener los seguros disponibles
$query = "SELECT id, nombre, tipo FROM seguros WHERE fecha_disponible_desde <= CURDATE() AND fecha_disponible_hasta >= CURDATE()";
$result = $conn->query($query);
$seguros = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $seguros[] = $row; // Guardamos cada seguro en un array
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Pólizas - SaveMe</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Calculadora de Pólizas</h1>
        <p class="text-center lead">¡Obtén un estimado de tu póliza según las opciones que elijas!</p>
        
        <!-- Formulario de la calculadora -->
        <form action="" method="POST" class="shadow p-4 rounded" style="background-color: #f8f9fa;">
            <!-- Selección de Seguro -->
            <section class="mb-4">
                <h2 class="h4 mb-3">1. Selección del Tipo de Seguro</h2>
                <div class="form-group mb-3">
                    <label for="tipo_seguro" class="form-label">Elige el tipo de seguro:</label>
                    <select id="tipo_seguro" name="tipo_seguro" class="form-select" required>
                        <option value="" disabled selected>Seleccione un seguro</option>
                        <?php foreach ($seguros as $seguro): ?>
                            <option value="<?= htmlspecialchars($seguro['id']) ?>">
                                <?= htmlspecialchars($seguro['nombre'] . " - " . $seguro['tipo']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </section>

            <!-- Cobertura Adicional -->
            <section class="mb-4">
                <h2 class="h4 mb-3">2. Cobertura Adicional</h2>
                <div class="form-group mb-3">
                    <label for="cobertura" class="form-label">Cobertura Adicional (opcional):</label>
                    <input type="text" class="form-control" id="cobertura" name="cobertura">
                </div>
            </section>

            <!-- Duración -->
            <section class="mb-4">
                <h2 class="h4 mb-3">3. Duración de la Póliza</h2>
                <div class="form-group mb-3">
                    <label for="duracion" class="form-label">Duración (en años):</label>
                    <input type="number" class="form-control" id="duracion" name="duracion" min="1" max="10" required>
                </div>
            </section>

            <!-- Botón de envío -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Calcular</button>
            </div>
        </form>

        <?php
        // Calcular el precio cuando se envía el formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tipo_seguro'], $_POST['duracion'])) {
            $tipoSeguroId = $_POST['tipo_seguro'];
            $cobertura = $_POST['cobertura'];
            $duracion = $_POST['duracion'];

            // Obtener los datos del seguro seleccionado desde la base de datos
            $query = $conn->query("SELECT * FROM seguros WHERE id = $tipoSeguroId");
            $seguro = $query->fetch_assoc();

            if ($seguro) {
                // Calcular el precio total basado en la prima mensual y la duración
                $primaMensual = $seguro['prima_mensual'];
                $precioFinal = $primaMensual * 12 * $duracion; // Total por la duración en años (12 meses por año)

                // Si hay cobertura adicional, sumar un valor simbólico (por ejemplo, $50 extra por cobertura adicional)
                if (!empty($cobertura)) {
                    $precioFinal += 50; // Esto puede ajustarse
                }
        ?>
            <!-- Mostrar los resultados -->
            <div class="alert alert-success mt-4">
                <h4 class="alert-heading">Resultado Estimado</h4>
                <p><strong>Seguro Seleccionado:</strong> <?= htmlspecialchars($seguro['nombre']) ?></p>
                <p><strong>Descripción:</strong> <?= htmlspecialchars($seguro['descripcion']) ?></p>
                <p><strong>Cobertura Adicional:</strong> <?= htmlspecialchars($cobertura) ?: 'Ninguna' ?></p>
                <p><strong>Duración:</strong> <?= $duracion ?> años</p>
                <p><strong>Precio Estimado de la Póliza:</strong> $<?= number_format($precioFinal, 2) ?></p>
            </div>
        <?php
            } else {
                echo "<div class='alert alert-danger mt-4'>No se pudo encontrar el seguro seleccionado.</div>";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
