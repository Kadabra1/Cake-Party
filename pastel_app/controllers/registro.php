<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar datos requeridos
    $required_fields = [
        'nombre', 
        'apellido', 
        'fecha_nacimiento',
        'direccion',
        'telefono',
        'usuario', 
        'email', 
        'password', 
        'confirm_password'
    ];
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $_SESSION['error'] = "Por favor, complete todos los campos requeridos";
            header("Location: ../views/registro.php");
            exit();
        }
    }

    // Validar que las contraseñas coincidan
    if ($_POST['password'] !== $_POST['confirm_password']) {
        $_SESSION['error'] = "Las contraseñas no coinciden. Por favor, verifique que ambas contraseñas sean iguales.";
        header("Location: ../views/registro.php");
        exit();
    }

    // Validar formato de email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Por favor, ingrese un correo electrónico válido";
        header("Location: ../views/registro.php");
        exit();
    }

    try {
        // Iniciar transacción
        $conn->beginTransaction();

        // Verificar si el usuario ya existe
        $stmt = $conn->prepare("SELECT ID_usuario FROM usuario WHERE usuario_nombre = ? OR usuario_correo_electronico = ?");
        $stmt->execute([$_POST['usuario'], $_POST['email']]);
        if ($stmt->rowCount() > 0) {
            $_SESSION['error'] = "El nombre de usuario o correo electrónico ya está registrado";
            header("Location: ../views/registro.php");
            exit();
        }

        // Insertar datos en la tabla persona
        $stmt = $conn->prepare("INSERT INTO persona (persona_nombre, persona_apellido, persona_fecha_nacimiento, persona_direccion, persona_telefono) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['nombre'],
            $_POST['apellido'],
            $_POST['fecha_nacimiento'],
            $_POST['direccion'],
            $_POST['telefono']
        ]);
        $id_persona = $conn->lastInsertId();

        // Insertar datos en la tabla usuario
        // Por defecto, asignamos el perfil de Cliente (ID_perfil = 1)
        $stmt = $conn->prepare("INSERT INTO usuario (RELA_persona, RELA_perfil, usuario_nombre, usuario_correo_electronico, usuario_contraseña, usuario_fecha_registro) VALUES (?, 1, ?, ?, ?, NOW())");
        $stmt->execute([
            $id_persona,
            $_POST['usuario'],
            $_POST['email'],
            password_hash($_POST['password'], PASSWORD_DEFAULT)
        ]);

        // Confirmar transacción
        $conn->commit();

        $_SESSION['success'] = "Registro exitoso. Por favor, inicia sesión.";
        header("Location: ../views/login.php");
        exit();

    } catch(PDOException $e) {
        // Revertir transacción en caso de error
        $conn->rollBack();
        $_SESSION['error'] = "Error al registrar usuario: " . $e->getMessage();
        header("Location: ../views/registro.php");
        exit();
    }
} else {
    header("Location: ../views/registro.php");
    exit();
}
?> 