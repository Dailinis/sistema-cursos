<?php
// index.php - Página de inicio o dashboard
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Cursos Online</title>
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
    <h1>Bienvenido a la Gestión de Cursos Online</h1>
    <p>Administra tus cursos y estudiantes de manera sencilla.</p>
  </div>
</body>
</html>
