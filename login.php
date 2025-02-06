<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form action="procesar_login.php" method="POST">
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" required><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br><br>

        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
