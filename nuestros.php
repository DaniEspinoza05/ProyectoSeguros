<?php include('navbar.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Seguros - SaveMe</title>

    <!-- Incluir el archivo CSS común -->
    <link href="css/index.css" rel="stylesheet"> <!-- Ajusta la ruta si es necesario -->
</head>
<body>
    <main class="container mt-5">
        <h1 class="text-center">Nuestros Seguros</h1>
        <p class="text-center">Explora nuestra variedad de seguros y elige el que más se ajuste a tus necesidades. Todos nuestros seguros están diseñados para ofrecerte la mejor protección al mejor precio.</p>
        
        <section class="row">
            <!-- Seguro 1: Seguro de Salud -->
            <div class="col-md-4">
                <div class="card">
                    <img src="./images/seguro-salud.jpg" class="card-img-top" alt="Seguro de Salud">
                    <div class="card-body">
                        <h5 class="card-title">Seguro de Salud</h5>
                        <p class="card-text">Cobertura médica completa con acceso a especialistas, emergencias y hospitalización.</p>
                        <p><strong>Precio:</strong> $199/mes</p>
                        <button class="btn btn-primary" onclick="agregarAlCarrito('Seguro de Salud', 199)">Añadir al Carrito</button>
                    </div>
                </div>
            </div>

            <!-- Seguro 2: Seguro de Vida -->
            <div class="col-md-4">
                <div class="card">
                    <img src="./images/seguro-vida.jpg" class="card-img-top" alt="Seguro de Vida">
                    <div class="card-body">
                        <h5 class="card-title">Seguro de Vida</h5>
                        <p class="card-text">Protección financiera para tu familia en caso de fallecimiento o accidente.</p>
                        <p><strong>Precio:</strong> $250/mes</p>
                        <button class="btn btn-primary" onclick="agregarAlCarrito('Seguro de Vida', 250)">Añadir al Carrito</button>
                    </div>
                </div>
            </div>

            <!-- Seguro 3: Seguro de Automóvil -->
            <div class="col-md-4">
                <div class="card">
                    <img src="./images/seguro-auto.jpg" class="card-img-top" alt="Seguro de Automóvil">
                    <div class="card-body">
                        <h5 class="card-title">Seguro de Automóvil</h5>
                        <p class="card-text">Cobertura completa contra accidentes, robo y daños materiales de tu vehículo.</p>
                        <p><strong>Precio:</strong> $150/mes</p>
                        <button class="btn btn-primary" onclick="agregarAlCarrito('Seguro de Automóvil', 150)">Añadir al Carrito</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Carrito de compras -->
        <h2>Carrito de Compras</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Seguro</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="carrito">
                <!-- Los productos se agregarán dinámicamente aquí -->
            </tbody>
        </table>

        <div id="total">
            <p><strong>Total:</strong> $<span id="totalPrice">0</span></p>
        </div>
    </main>

    <?php include('footer.php'); ?>

    <script>
        // Función para agregar productos al carrito
        let carrito = [];
        let total = 0;

        function agregarAlCarrito(nombre, precio) {
            // Añadir el seguro al carrito
            carrito.push({ nombre, precio });
            
            // Actualizar la visualización del carrito
            actualizarCarrito();
        }

        function actualizarCarrito() {
            let carritoHTML = '';
            total = 0;

            // Recorrer el carrito y mostrar los productos
            carrito.forEach((producto, index) => {
                carritoHTML += `
                    <tr>
                        <td>${producto.nombre}</td>
                        <td>$${producto.precio}</td>
                        <td><button class="btn btn-danger" onclick="eliminarDelCarrito(${index})">Eliminar</button></td>
                    </tr>
                `;
                total += producto.precio;
            });

            // Actualizar el contenido de la tabla y el total
            document.getElementById('carrito').innerHTML = carritoHTML;
            document.getElementById('totalPrice').innerText = total;
        }

        function eliminarDelCarrito(index) {
            // Eliminar el producto del carrito
            carrito.splice(index, 1);
            
            // Actualizar la visualización del carrito
            actualizarCarrito();
        }
    </script>
</body>
</html>
