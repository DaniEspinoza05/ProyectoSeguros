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
    <title>Adquisición de Seguros - SaveMe</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet"> <!-- Archivo CSS personalizado -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Adquisición de Seguros</h1>
        <p class="text-center lead">Selecciona el seguro que deseas adquirir y personaliza tu póliza para adaptarla a tus necesidades.</p>
        
        <!-- Formulario principal -->
        <form action="procesar_adquisicion.php" method="POST" class="shadow p-4 rounded" style="background-color: #f8f9fa;">
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

            <!-- Personalización de la Póliza -->
            <section class="mb-4">
                <h2 class="h4 mb-3">2. Personalización de la Póliza</h2>
                <div class="form-group mb-3">
                    <label style="font-weight: bold;" style="f">Coberturas adicionales:</label>
                    <div class="form-check">
                        <input type="checkbox" name="cobertura[]" value="Accidentes Personales" class="form-check-input" id="cobertura1">
                        <label class="form-check-label" for="cobertura1">Accidentes Personales</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="cobertura[]" value="Robo" class="form-check-input" id="cobertura2">
                        <label class="form-check-label" for="cobertura2">Robo</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="cobertura[]" value="Daños Materiales" class="form-check-input" id="cobertura3">
                        <label class="form-check-label" for="cobertura3">Daños Materiales</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="cobertura[]" value="Asistencia en el Extranjero" class="form-check-input" id="cobertura4">
                        <label class="form-check-label" for="cobertura4">Asistencia en el Extranjero</label>
                    </div>
                </div>
            </section>

            <!-- Método de Pago -->
            <section class="mb-4">
                <h2 class="h4 mb-3">3. Duración</h2>
                <div class="form-group mb-3">
                    <label for="periodo" class="form-label">La cantidad de meses por la cual desea aplicar el seguro seleccionado.</label>
                    <input type="number" id="periodo" name="periodo" class="form-control" min="1" max="24" required>
                </div>
            </section>

            <!-- Botón de envío -->
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg">Adquirir Seguro</button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
