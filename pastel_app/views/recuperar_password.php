<?php
include_once '../includes/header.php';
?>

<link href="../public/css/login.css" rel="stylesheet">

<div class="login-container">
    <div class="login-card">
        <h2 class="login-title">Recuperar Contraseña</h2>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php 
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>

        <form action="../controllers/recuperar_password.php" method="POST" class="login-form">
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico *</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Enviar Link de Recuperación</button>
            </div>
        </form>
        <div class="login-footer">
            <p>¿Recordaste tu contraseña? <a href="login.php">Inicia sesión aquí</a></p>
        </div>
    </div>
</div>

<?php
include_once '../includes/footer.php';
?> 