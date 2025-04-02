<?php
include_once '../includes/header.php';
?>

<link href="../public/css/login.css" rel="stylesheet">

<div class="login-container">
    <div class="login-card">
        <h2 class="login-title">Iniciar Sesión</h2>
        <form action="../controllers/login.php" method="POST" class="login-form">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su usuario" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </div>
        </form>
        <div class="login-footer">
            <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
            <p><a href="recuperar_password.php">¿Olvidaste tu contraseña?</a></p>
        </div>
    </div>
</div>

<?php
include_once '../includes/footer.php';
?> 