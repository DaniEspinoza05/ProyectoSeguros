document.addEventListener("DOMContentLoaded", () => {
    console.log("¡Página cargada correctamente!");
    
    // Referencias al modal "Sobre Nosotros" y al botón
    const sobreNosotrosModal = document.getElementById("sobreNosotrosModal");
    const sobreNosotrosButton = document.getElementById("sobreNosotros");
    const closeSobreNosotros = sobreNosotrosModal.querySelector(".close");

    // Mostrar el modal al hacer clic en el botón "Sobre Nosotros"
    if (sobreNosotrosButton) {
        sobreNosotrosButton.addEventListener("click", (e) => {
            e.preventDefault();
            sobreNosotrosModal.style.display = "block";
        });
    }

    // Cerrar el modal "Sobre Nosotros" al hacer clic en la "X"
    if (closeSobreNosotros) {
        closeSobreNosotros.addEventListener("click", () => {
            sobreNosotrosModal.style.display = "none";
        });
    }

    // Cerrar el modal "Sobre Nosotros" al hacer clic fuera del contenido del modal
    window.addEventListener("click", (e) => {
        if (e.target === sobreNosotrosModal) {
            sobreNosotrosModal.style.display = "none";
        }
    });

    // Funcionalidad para el modal de Login
    const loginModal = document.getElementById("loginModal");
    const loginButton = document.getElementById("loginButton");
    const closeLogin = loginModal?.querySelector(".close");

    // Mostrar el modal de Login al hacer clic en el botón "Login"
    if (loginButton) {
        loginButton.addEventListener("click", (e) => {
            e.preventDefault();
            loginModal.style.display = "block";
        });
    }

    // Cerrar el modal de Login al hacer clic en la "X"
    if (closeLogin) {
        closeLogin.addEventListener("click", () => {
            loginModal.style.display = "none";
        });
    }

    // Cerrar el modal de Login al hacer clic fuera del contenido del modal
    window.addEventListener("click", (e) => {
        if (e.target === loginModal) {
            loginModal.style.display = "none";
        }
    });
});
