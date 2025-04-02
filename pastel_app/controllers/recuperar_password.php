<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Por favor, ingrese un correo electrónico válido";
        header("Location: ../views/recuperar_password.php");
        exit();
    }

    try {
        // Verificar si el email existe
        $stmt = $conn->prepare("SELECT ID_usuario, usuario_nombre FROM usuario WHERE usuario_correo_electronico = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Simular envío de correo
            $_SESSION['success'] = "Se ha enviado un enlace de recuperación a tu correo electrónico.";
        } else {
            // Por seguridad, mostramos el mismo mensaje aunque el email no exista
            $_SESSION['success'] = "Si el correo electrónico está registrado, recibirás un enlace de recuperación.";
        }

        header("Location: ../views/recuperar_password.php");
        exit();

    } catch(PDOException $e) {
        $_SESSION['error'] = "Error al procesar la solicitud. Por favor, intenta nuevamente.";
        header("Location: ../views/recuperar_password.php");
        exit();
    }
} else {
    header("Location: ../views/recuperar_password.php");
    exit();
}
?> 