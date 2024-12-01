<?php
session_start();
include('navbar.php');
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
                        <option value="" disabled selected>Seleccione un tipo de seguro</option>
                        <option value="Salud">Seguro de Salud</option>
                        <option value="Vida">Seguro de Vida</option>
                        <option value="Automóviles">Seguro de Automóvil</option>
                        <option value="Propiedades">Seguro de Propiedades</option>
                        <option value="Viajes">Seguro de Viajes</option>
                    </select>
                </div>
            </section>

            <!-- Personalización de la Póliza -->
            <section class="mb-4">
                <h2 class="h4 mb-3">2. Personalización de la Póliza</h2>
                <div class="form-group mb-3">
                    <label class="form-label">Coberturas adicionales:</label>
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
                <div class="form-group mb-3">
                    <label for="periodo" class="form-label">Duración (meses):</label>
                    <input type="number" id="periodo" name="periodo" class="form-control" min="1" max="24" required>
                </div>
            </section>

            <!-- Método de Pago -->
            <section class="mb-4">
                <h2 class="h4 mb-3">3. Método de Pago</h2>
                <div class="form-group mb-3">
                    <label for="metodo_pago" class="form-label">Selecciona el método de pago:</label>
                    <select id="metodo_pago" name="metodo_pago" class="form-select" required>
                        <option value="" disabled selected>Seleccione un método de pago</option>
                        <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                        <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                        <option value="Efectivo">Efectivo</option>
                    </select>
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
