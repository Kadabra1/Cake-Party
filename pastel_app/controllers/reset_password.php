<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validar que las contraseñas coincidan
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Las contraseñas no coinciden";
        header("Location: ../views/reset_password.php?token=" . urlencode($token));
        exit();
    }

    try {
        // Verificar si el token es válido y no ha expirado
        $stmt = $conn->prepare("SELECT ID_password_reset, RELA_usuario FROM password_resets WHERE token = ? AND expira > NOW()");
        $stmt->execute([$token]);
        $reset = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$reset) {
            $_SESSION['error'] = "El enlace de recuperación ha expirado o no es válido.";
            header("Location: ../views/recuperar_password.php");
            exit();
        }

        // Actualizar la contraseña
        $stmt = $conn->prepare("UPDATE usuario SET usuario_contraseña = ? WHERE ID_usuario = ?");
        $stmt->execute([password_hash($password, PASSWORD_DEFAULT), $reset['RELA_usuario']]);

        // Eliminar el token usado
        $stmt = $conn->prepare("DELETE FROM password_resets WHERE ID_password_reset = ?");
        $stmt->execute([$reset['ID_password_reset']]);

        $_SESSION['success'] = "Contraseña actualizada exitosamente. Por favor, inicia sesión con tu nueva contraseña.";
        header("Location: ../views/login.php");
        exit();

    } catch(PDOException $e) {
        $_SESSION['error'] = "Error al restablecer la contraseña. Por favor, intenta nuevamente.";
        header("Location: ../views/reset_password.php?token=" . urlencode($token));
        exit();
    }
} else {
    header("Location: ../views/recuperar_password.php");
    exit();
}
?> 