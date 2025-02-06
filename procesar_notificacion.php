<?php
include('conexion.php'); // Incluir la conexión PDO

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $usuario_id = $_POST['usuario_id'];
    $titulo = $_POST['titulo'];
    $mensaje = $_POST['mensaje'];

    // Insertar la notificación en la base de datos
    $sql = "INSERT INTO notificaciones (usuario_id, titulo, mensaje) VALUES (:usuario_id, :titulo, :mensaje)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':usuario_id' => $usuario_id,
        ':titulo' => $titulo,
        ':mensaje' => $mensaje
    ]);

    echo "¡Notificación enviada exitosamente!";
}
?>
