<?php
include('conexion.php'); // Incluir la conexión PDO

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    echo "Por favor, inicia sesión para ver tus notificaciones.";
    exit();
}

// Obtener las notificaciones del usuario
$usuario_id = $_SESSION['usuario_id']; // ID del usuario logueado

$sql = "SELECT * FROM notificaciones WHERE usuario_id = :usuario_id AND leida = FALSE ORDER BY fecha DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([':usuario_id' => $usuario_id]);

$notificaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($notificaciones) > 0) {
    echo "<h2>Tus Notificaciones:</h2>";
    foreach ($notificaciones as $notificacion) {
        echo "<div>";
        echo "<h3>" . htmlspecialchars($notificacion['titulo']) . "</h3>";
        echo "<p>" . htmlspecialchars($notificacion['mensaje']) . "</p>";
        echo "<p><em>" . $notificacion['fecha'] . "</em></p>";
        echo "<a href='marcar_leida.php?id=" . $notificacion['id'] . "'>Marcar como leída</a>";
        echo "</div><hr>";
    }
} else {
    echo "No tienes notificaciones nuevas.";
}
?>
