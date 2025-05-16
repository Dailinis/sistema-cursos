<?php
// inscribir_estudiante.php - Formulario para inscribir a un estudiante
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $curso_id = $_POST['curso_id'];

  $conexion = new mysqli("localhost", "usuario", "contraseña", "db_cursos");
  if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
  }

  $sql = "INSERT INTO estudiantes (nombre, email, curso_id) VALUES ('$nombre', '$email', '$curso_id')";
  if ($conexion->query($sql) === TRUE) {
    echo "<div class='toast show'>Estudiante inscrito exitosamente</div>";
  } else {
    echo "<div class='toast show'>Error: " . $conexion->error . "</div>";
  }

  $conexion->close();
}

$conexion = new mysqli("localhost", "usuario", "contraseña", "db_cursos");
$resultado = $conexion->query("SELECT * FROM cursos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscribir Estudiante</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header>
    <nav class="navbar">
      <ul>
        <li><a href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="mis_cursos.php"><i class="fas fa-cogs"></i> Mis Cursos</a></li>
        <li><a href="inscribir_estudiante.php"><i class="fas fa-user-plus"></i> Inscripción</a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
      </ul>
    </nav>
  </header>

  <div class="container">
    <h1>Inscribir Estudiante</h1>
    <form action="inscribir_estudiante.php" method="POST">
      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="email">Correo electrónico</label>
      <input type="email" id="email" name="email" required>

      <label for="curso_id">Curso</label>
      <select id="curso_id" name="curso_id" required>
        <?php while ($curso = $resultado->fetch_assoc()) { ?>
          <option value="<?= $curso['id'] ?>"><?= $curso['nombre'] ?></option>
        <?php } ?>
      </select>

      <button type="submit">Inscribir Estudiante</button>
    </form>
  </div>
</body>
</html>
