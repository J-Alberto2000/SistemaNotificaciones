<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Notificación</title>
</head>
<body>
    <h2>Enviar Notificación</h2>
    <form action="procesar_notificacion.php" method="POST">
        <label for="usuario_id">ID del Usuario:</label>
        <input type="text" name="usuario_id" required><br><br>

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br><br>

        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" required></textarea><br><br>

        <button type="submit">Enviar Notificación</button>
    </form>
</body>
</html>
