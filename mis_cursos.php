<?php
// mis_cursos.php - Página que muestra la lista de cursos
$conexion = new mysqli("localhost", "usuario", "contraseña", "db_cursos");
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}

$resultado = $conexion->query("SELECT * FROM cursos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Cursos</title>
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
    <h1>Mis Cursos</h1>
    <ul>
      <?php while ($curso = $resultado->fetch_assoc()) { ?>
        <li>
          <span class="nombre-curso"><?= $curso['nombre'] ?></span>
          <p class="descripcion-curso"><?= $curso['descripcion'] ?></p>
          <div class="acciones">
            <a href="lecciones.php?id=<?= $curso['id'] ?>" class="button-secondary">
              <i class="fas fa-book-open"></i> Ver Lecciones
            </a>
          </div>
        </li>
      <?php } ?>
    </ul>
  </div>
</body>
</html>
