<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Estudiantes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Sistema de Gestión de Estudiantes</h1>
        <nav>
            <ul>
                <?php if ($role == 'administrador'): ?>
                    <li><a href="admin_users.php">Gestionar Usuarios</a></li>
                    <li><a href="admin_subjects.php">Gestionar Materias</a></li>
                <?php elseif ($role == 'profesor'): ?>
                    <li><a href="teacher_grades.php">Gestionar Notas</a></li>
                <?php elseif ($role == 'estudiante'): ?>
                    <li><a href="student_grades.php">Ver Notas</a></li>
                <?php endif; ?>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Bienvenido, <?php echo $_SESSION['nombre']; ?></h2>
        <!-- Contenido específico para cada rol -->
    </main>
    <footer>
        <p>&copy; 2023 Sistema de Gestión de Estudiantes</p>
    </footer>
</body>
</html>

