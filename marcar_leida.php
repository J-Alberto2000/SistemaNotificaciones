<?php
include('conexion.php'); // Incluir la conexión PDO

// Verificar que el parámetro 'id' está presente en la URL
if (isset($_GET['id'])) {
    $notificacion_id = $_GET['id'];

    // Actualizar la notificación para marcarla como leída
    $sql = "UPDATE notificaciones SET leida = TRUE WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $notificacion_id]);

    echo "Notificación marcada como leída.";
    header("Location: panel_usuario.php"); // Redirigir de nuevo a las notificaciones
    exit();
} else {
    echo "No se ha especificado una notificación válida.";
}
?>
