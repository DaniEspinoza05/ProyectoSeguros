<header>
    <div class="header-content">
        <!-- Logo -->
        <img src="./images/logo.jpg" alt="Logo de la Empresa" class="logo">

        <!-- Menú de navegación -->
        <nav>
            <ul class="menu">
                <li class="menu-item"><a href="index.php">Inicio</a></li>
                <li class="menu-item"><a href="VerSeguros.php">Ver Seguros</a></li>
                <li class="menu-item"><a href="VerUsuarios.php">Ver Usuarios</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="menu-item"><a href="logout.php">Cerrar sesión</a></li>
                <?php else: ?>
                    <li class="menu-item"><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
