<?php
require_once '../config/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $email = $_POST['email'] ?? '';

    try {
        // Verificar si el usuario existe
        $stmt = $conn->prepare("SELECT ID_usuario FROM usuario WHERE usuario_nombre = ?");
        $stmt->execute([$usuario]);
        $usuario_exists = $stmt->rowCount() > 0;

        // Verificar si el email existe
        $stmt = $conn->prepare("SELECT ID_usuario FROM usuario WHERE usuario_correo_electronico = ?");
        $stmt->execute([$email]);
        $email_exists = $stmt->rowCount() > 0;

        echo json_encode([
            'usuario_exists' => $usuario_exists,
            'email_exists' => $email_exists
        ]);
    } catch(PDOException $e) {
        echo json_encode([
            'error' => 'Error al verificar usuario y email'
        ]);
    }
} else {
    echo json_encode([
        'error' => 'Método no permitido'
    ]);
}
?> 