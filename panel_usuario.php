<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

echo "¡Bienvenido, " . htmlspecialchars($_SESSION['nombre_usuario']) . "!";
include ('mostrar_notificacion.php');
echo "<br><a href='logout.php'>Cerrar sesión</a>";
?>
