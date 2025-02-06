<?php
include('conexion.php'); // Incluir la conexión PDO

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    // trim es para evitar los espacios
    $nombre_usuario = trim($_POST['nombre_usuario']);
    $email = trim($_POST['email']);
    $contrasena = trim($_POST['contrasena']);

    // Verificar si el nombre de usuario o el correo ya están registrados
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = :nombre_usuario OR email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nombre_usuario' => $nombre_usuario, ':email' => $email]);
    
    if ($stmt->rowCount() > 0) {
        echo "El nombre de usuario o correo ya está en uso. Por favor, elige otro.";
    } else {
        // Hashear la contraseña
        $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

        // Insertar el nuevo usuario en la base de datos
        $sql_insert = "INSERT INTO usuarios (nombre_usuario, email, contrasena) VALUES (:nombre_usuario, :email, :contrasena)";
        $stmt_insert = $pdo->prepare($sql_insert);
        $stmt_insert->execute([
            ':nombre_usuario' => $nombre_usuario,
            ':email' => $email,
            ':contrasena' => $contrasena_hash
        ]);

        echo "¡Registro exitoso! Ahora puedes <a href='login.php'>iniciar sesión</a>.";
    }
}
?>
