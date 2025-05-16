<?php
// logout.php - Cerrar sesión del usuario
session_start();
session_destroy();
header('Location: index.php');
exit;
?>
