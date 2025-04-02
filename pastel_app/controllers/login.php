<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    if (empty($usuario) || empty($password)) {
        $_SESSION['error'] = "Por favor, complete todos los campos";
        header("Location: ../views/login.php");
        exit();
    }

    try {
        $stmt = $conn->prepare("
            SELECT u.ID_usuario, u.usuario_nombre, u.usuario_contraseña, p.perfil_rol 
            FROM usuario u 
            JOIN perfiles p ON u.RELA_perfiles = p.ID_perfil 
            WHERE u.usuario_nombre = ?
        ");
        $stmt->execute([$usuario]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['usuario_contraseña'])) {
            $_SESSION['user_id'] = $user['ID_usuario'];
            $_SESSION['usuario'] = $user['usuario_nombre'];
            $_SESSION['rol'] = $user['perfil_rol'];
            $_SESSION['success'] = "¡Bienvenido " . $user['usuario_nombre'] . "!";
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['error'] = "Usuario o contraseña incorrectos";
            header("Location: ../views/login.php");
            exit();
        }
    } catch(PDOException $e) {
        $_SESSION['error'] = "Error al iniciar sesión. Por favor, intente nuevamente.";
        header("Location: ../views/login.php");
        exit();
    }
} else {
    header("Location: ../views/login.php");
    exit();
}
?> 