<?php
session_start();
include('navbar.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Seguros - SaveMe</title>

    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluir estilos personalizados -->
    <link href="css/index.css" rel="stylesheet"> <!-- Asegúrate de ajustar la ruta si es necesario -->
</head>
<body>
    <main class="container mt-5">
        <!-- Título principal -->
        <div class="text-center mb-5">
            <h1 class="fw-bold text-primary">Nuestros Seguros</h1>
            <p class="lead">Explora nuestra gama de seguros diseñados para protegerte a ti y a tu familia en todo momento.</p>
        </div>

        <!-- Tarjetas de seguros -->
        <section class="row g-4">
            <!-- Seguro de Salud -->
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <img src="./images/seguro-salud.jpg" class="card-img-top" alt="Seguro de Salud">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-primary">Seguro de Salud</h5>
                        <p class="card-text text-muted">
                            Cobertura integral para emergencias médicas, consultas y hospitalización. 
                        </p>
                        <ul class="list-unstyled small text-secondary">
                            <li>✔ Emergencias médicas</li>
                            <li>✔ Consultas con especialistas</li>
                            <li>✔ Hospitalización y cirugías</li>
                        </ul>
                        <p class="fw-bold text-success">Desde $199/mes</p>
                    </div>
                </div>
            </div>

            <!-- Seguro de Vida -->
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <img src="./images/seguro-vida.jpg" class="card-img-top" alt="Seguro de Vida">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-primary">Seguro de Vida</h5>
                        <p class="card-text text-muted">
                            Protección económica para tus seres queridos en caso de fallecimiento o incapacidad.
                        </p>
                        <ul class="list-unstyled small text-secondary">
                            <li>✔ Beneficiarios protegidos</li>
                            <li>✔ Asistencia legal y psicológica</li>
                            <li>✔ Cobertura flexible</li>
                        </ul>
                        <p class="fw-bold text-success">Desde $250/mes</p>
                    </div>
                </div>
            </div>

            <!-- Seguro de Automóvil -->
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <img src="./images/seguro-auto.jpg" class="card-img-top" alt="Seguro de Automóvil">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-primary">Seguro de Automóvil</h5>
                        <p class="card-text text-muted">
                            Cobertura completa para accidentes, robo y daños materiales.
                        </p>
                        <ul class="list-unstyled small text-secondary">
                            <li>✔ Asistencia en carretera</li>
                            <li>✔ Cobertura integral</li>
                            <li>✔ Descuentos en talleres</li>
                        </ul>
                        <p class="fw-bold text-success">Desde $150/mes</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Información adicional -->
        <section class="mt-5">
            <div class="text-center">
                <h2 class="fw-bold text-primary">¿Por qué elegir SaveMe?</h2>
                <p class="text-muted">En SaveMe, nos comprometemos a ofrecerte tranquilidad con seguros diseñados a tu medida.</p>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-transparent text-muted">
                            <span class="fw-bold text-success">✔</span> Atención 24/7
                        </li>
                        <li class="list-group-item bg-transparent text-muted">
                            <span class="fw-bold text-success">✔</span> Cobertura integral
                        </li>
                        <li class="list-group-item bg-transparent text-muted">
                            <span class="fw-bold text-success">✔</span> Planes personalizados
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-transparent text-muted">
                            <span class="fw-bold text-success">✔</span> Red de hospitales
                        </li>
                        <li class="list-group-item bg-transparent text-muted">
                            <span class="fw-bold text-success">✔</span> Beneficios exclusivos
                        </li>
                        <li class="list-group-item bg-transparent text-muted">
                            <span class="fw-bold text-success">✔</span> Asesoría personalizada
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include('footer.php'); ?>
</body>
</html>
