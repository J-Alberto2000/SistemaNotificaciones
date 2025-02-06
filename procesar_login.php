<?php
include('conexion.php'); // Incluir la conexión PDO

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $email = trim($_POST['email']);
    $contrasena = trim($_POST['contrasena']);

    // Consultar si el usuario existe
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Verificar la contraseña
        if (password_verify($contrasena, $usuario['contrasena'])) {
            // Autenticación exitosa, iniciar sesión
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
            // echo "¡Bienvenido B====, " . htmlspecialchars($usuario['nombre_usuario']) . "!";
            // Redirigir a la página principal o panel de usuario
            header("Location: panel_usuario.php");
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>
