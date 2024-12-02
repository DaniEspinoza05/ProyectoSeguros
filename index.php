<?php
session_start();
include('navbar.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a SaveMe</title>

    <!-- Fuentes y Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet"> 

    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        .hero {
            background: url('./images/hero.jpg') center/cover no-repeat;
            height: 400px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .cta-button {
            background-color: #f67c01;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            transition: background-color 0.3s ease-in-out;
        }
        .cta-button:hover {
            background-color: #d66b01;
        }
        .card:hover {
            transform: scale(1.05);
            transition: all 0.3s ease-in-out;
        }
        .testimonios {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
        }
        .testimonio {
            font-style: italic;
            color: #555;
            margin-bottom: 15px;
        }
        .texto {
            color: blue;
        }
        
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1 class="display-4">Explora Todo lo que SaveMe Ofrece</h1>
            <p class="texto">Herramientas diseñadas para tu comodidad y protección.</p>
            <a href="register.php" class="cta-button">Regístrate Ahora</a>
        </div>
    </div>

    <!-- Contenido Principal -->
    <main class="container my-5">
        <!-- Funcionalidades -->
        <section class="mb-5">
            <h2 class="text-center mb-4">Nuestras Herramientas Destacadas</h2>
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="./images/calculadora.jpg" class="card-img-top" alt="Calculadora de Pólizas">
                        <div class="card-body text-center">
                            <h5 class="card-title">Calculadora de Pólizas</h5>
                            <p class="card-text">Conoce rápidamente cuánto podría costar tu seguro con nuestra calculadora interactiva.</p>
                            <a href="calculadora.php" class="btn btn-primary">Ir a la Calculadora</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="./images/personalizar.jpg" class="card-img-top" alt="Explora Seguros Personalizados">
                        <div class="card-body text-center">
                            <h5 class="card-title">Seguros Personalizados</h5>
                            <p class="card-text">Descubre todas las opciones que tenemos para protegerte a ti y a los tuyos.</p>
                            <a href="personalizar_seguro.php" class="btn btn-primary">Ver Seguros</a>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="./images/plan2.jpg" class="card-img-top" alt="Algunos de nuestros planes">
                        <div class="card-body text-center">
                            <h5 class="card-title">Algunos de nuestros planes</h5>
                            <p class="card-text">Te enseñamos algunos seguros que te podrían interesar. Contamos con opciones competitivas</p>
                            <a href="seguros.php" class="btn btn-primary">Contáctanos</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonios -->
        <section class="testimonios my-5">
            <h2 class="text-center mb-4">Lo que dicen nuestros clientes</h2>
            <div class="testimonio text-center">
                <p>"Gracias a SaveMe, estoy tranquilo sabiendo que mi familia está protegida. Su atención al cliente es insuperable." - <strong>Juan Pérez</strong></p>
                <p>"Contratar mi seguro fue tan fácil y rápido, además de ser súper claro." - <strong>María González</strong></p>
                <p>"SaveMe me dio la confianza que necesitaba para asegurar mi auto. Los recomiendo al 100%." - <strong>Laura Fernández</strong></p>
            </div>
        </section>

        <!-- Información Adicional -->
        <section class="mt-5">
            <h2 class="text-center mb-4">¿Por qué Elegir SaveMe?</h2>
            <p class="text-center">Somos líderes en el mercado gracias a nuestra innovación y dedicación. Explora las razones que nos hacen únicos.</p>
            <ul class="list-group list-group-flush mx-auto" style="max-width: 600px;">
                <li class="list-group-item">✔ Tecnología avanzada para un servicio eficiente.</li>
                <li class="list-group-item">✔ Opciones flexibles adaptadas a tus necesidades.</li>
                <li class="list-group-item">✔ Más de 15 años de experiencia en el sector.</li>
            </ul>
        </section>
    </main>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
