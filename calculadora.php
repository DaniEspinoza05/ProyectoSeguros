<?php
session_start();
include('navbar.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Pólizas - SaveMe</title>

    <!-- Incluir Bootstrap y tu archivo CSS común -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
    <main class="container mt-5">
        <!-- Título y descripción -->
        <div class="text-center">
            <h1 class="display-4 mb-3">Calculadora de Pólizas</h1>
            <p class="lead">¡Obtén un estimado de tu póliza según las opciones que elijas!</p>
        </div>

        <!-- Formulario de la calculadora -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="calculadoraForm" method="POST" action="calculadora.php" class="bg-light p-4 rounded shadow-sm">
                    <div class="mb-3">
                        <label for="tipoSeguro" class="form-label">Tipo de Seguro</label>
                        <select class="form-select" id="tipoSeguro" name="tipoSeguro" required>
                            <option value="">Selecciona un tipo de seguro</option>
                            <option value="salud">Seguro de Salud</option>
                            <option value="vida">Seguro de Vida</option>
                            <option value="auto">Seguro de Automóvil</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cobertura" class="form-label">Cobertura</label>
                        <select class="form-select" id="cobertura" name="cobertura" required>
                            <option value="">Selecciona el nivel de cobertura</option>
                            <option value="basico">Básico</option>
                            <option value="medio">Medio</option>
                            <option value="alto">Alto</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duración (en años)</label>
                        <input type="number" class="form-control" id="duracion" name="duracion" required min="1" max="10">
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Calcular</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Resultados de la calculadora -->
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <?php
                // Recoger los datos del formulario
                $tipoSeguro = $_POST['tipoSeguro'];
                $cobertura = $_POST['cobertura'];
                $duracion = $_POST['duracion'];

                // Establecer tarifas base para cada tipo de seguro
                $tarifas = [
                    'salud' => 150,
                    'vida' => 200,
                    'auto' => 120
                ];

                // Modificadores de cobertura
                $coberturaMultiplicadores = [
                    'basico' => 1.0,
                    'medio' => 1.2,
                    'alto' => 1.5
                ];

                // Calcular el precio base según el tipo de seguro
                $precioBase = $tarifas[$tipoSeguro];

                // Aplicar el multiplicador de cobertura
                $precioCobertura = $precioBase * $coberturaMultiplicadores[$cobertura];

                // Calcular el precio final (dependiendo de la duración)
                $precioFinal = $precioCobertura * $duracion;
            ?>

            <div class="alert alert-success mt-4">
                <h4 class="alert-heading">Resultado Estimado</h4>
                <p><strong>Tipo de Seguro:</strong> <?= ucfirst($tipoSeguro) ?></p>
                <p><strong>Cobertura:</strong> <?= ucfirst($cobertura) ?></p>
                <p><strong>Duración:</strong> <?= $duracion ?> años</p>
                <p><strong>Precio Estimado de la Póliza:</strong> $<?= number_format($precioFinal, 2) ?></p>
            </div>
        <?php endif; ?>
    </main>

    <!-- Incluir jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php include('footer.php'); ?>
</body>
</html>
