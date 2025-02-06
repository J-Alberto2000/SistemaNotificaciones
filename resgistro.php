<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form action="procesar_registro.php" method="POST">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required><br><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" required><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br><br>

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
