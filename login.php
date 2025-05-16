<?php
// public/login.php
include('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Verificar usuario
    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$correo]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
        session_start();
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_rol'] = $usuario['rol'];
        header("Location: dashboard.php");
    } else {
        echo "Correo o contraseña incorrectos.";
    }
}
?>

<form action="login.php" method="POST">
    <input type="email" name="correo" placeholder="Correo electrónico" required>
    <input type="password" name="contraseña" placeholder="Contraseña" required>
    <button type="submit">Iniciar sesión</button>
</form>
