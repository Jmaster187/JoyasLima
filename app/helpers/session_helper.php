<?php
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Función para verificar si un usuario está logueado
function estaLogueado() {
    return isset($_SESSION['nombre_usuario']);
}

// Redireccionar si el usuario no está logueado
function redireccionarSiNoEstaLogueado($pagina) {
    if (!estaLogueado()) {
        redireccionar($pagina);
    }
}
?>
