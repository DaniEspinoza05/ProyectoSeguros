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

    <!-- Incluir el archivo CSS común -->
    <link href="css/index.css" rel="stylesheet"> <!-- Ajusta la ruta si es necesario -->
</head>
<body>
    <main class="container mt-5">
        <h1 class="text-center">Calculadora de Pólizas</h1>
        <p class="text-center">Utiliza nuestra calculadora para obtener un estimado del costo de tu póliza según las opciones que elijas.</p>

        <!-- Formulario de la calculadora -->
        <form id="calculadoraForm" method="POST" action="calculadora.php">
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

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Calcular</button>
            </div>
        </form>

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

            <div class="alert alert-success mt-4" role="alert">
                <h4 class="alert-heading">Resultado Estimado</h4>
                <p><strong>Tipo de Seguro:</strong> <?= ucfirst($tipoSeguro) ?></p>
                <p><strong>Cobertura:</strong> <?= ucfirst($cobertura) ?></p>
                <p><strong>Duración:</strong> <?= $duracion ?> años</p>
                <p><strong>Precio Estimado de la Póliza:</strong> $<?= number_format($precioFinal, 2) ?></p>
            </div>
        <?php endif; ?>
    </main>

    <?php include('footer.php'); ?>
</body>
</html>
