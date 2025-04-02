<?php
include_once '../includes/header.php';
require_once '../config/db.php';

// Verificar si hay un token válido
if (!isset($_GET['token'])) {
    header("Location: login.php");
    exit();
}

$token = $_GET['token'];

try {
    // Verificar si el token es válido y no ha expirado
    $stmt = $conn->prepare("SELECT ID_password_reset, RELA_usuario FROM password_resets WHERE token = ? AND expira > NOW()");
    $stmt->execute([$token]);
    $reset = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$reset) {
        $_SESSION['error'] = "El enlace de recuperación ha expirado o no es válido.";
        header("Location: recuperar_password.php");
        exit();
    }
} catch(PDOException $e) {
    $_SESSION['error'] = "Error al verificar el token.";
    header("Location: recuperar_password.php");
    exit();
}
?>

<link href="../public/css/login.css" rel="stylesheet">

<div class="login-container">
    <div class="login-card">
        <h2 class="login-title">Restablecer Contraseña</h2>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php 
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <form action="../controllers/reset_password.php" method="POST" class="login-form" id="resetForm">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            
            <div class="mb-3">
                <label for="password" class="form-label">Nueva Contraseña *</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="invalid-feedback" id="passwordFeedback"></div>
            </div>
            
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirmar Contraseña *</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                <div class="invalid-feedback" id="confirmPasswordFeedback"></div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Restablecer Contraseña</button>
            </div>
        </form>
        <div class="login-footer">
            <p>¿Recordaste tu contraseña? <a href="login.php">Inicia sesión aquí</a></p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('resetForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const confirmPasswordFeedback = document.getElementById('confirmPasswordFeedback');

    function validatePasswords() {
        if (password.value !== confirmPassword.value) {
            confirmPassword.classList.add('is-invalid');
            confirmPasswordFeedback.textContent = 'Las contraseñas no coinciden';
            return false;
        } else {
            confirmPassword.classList.remove('is-invalid');
            confirmPasswordFeedback.textContent = '';
            return true;
        }
    }

    confirmPassword.addEventListener('input', validatePasswords);
    password.addEventListener('input', validatePasswords);

    form.addEventListener('submit', function(e) {
        if (!validatePasswords()) {
            e.preventDefault();
        }
    });
});
</script>

<?php
include_once '../includes/footer.php';
?> 