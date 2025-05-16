<?php
// public/register.php
include('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
    $rol = $_POST['rol'];

    // Preparar y ejecutar consulta
    $sql = "INSERT INTO usuarios (nombre, correo, contraseña, rol) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $correo, $contraseña, $rol]);

    echo "Usuario registrado con éxito.";
}
?>

<form action="register.php" method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="correo" placeholder="Correo electrónico" required>
    <input type="password" name="contraseña" placeholder="Contraseña" required>
    <select name="rol">
        <option value="estudiante">Estudiante</option>
        <option value="profesor">Profesor</option>
    </select>
    <button type="submit">Registrar</button>
</form>
