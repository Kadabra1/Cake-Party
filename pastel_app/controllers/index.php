<?php
session_start();

// Si el usuario está logueado, mostrar la vista estática
if (isset($_SESSION['user_id'])) {
    include_once '../views/index.php';
} else {
    // Si no está logueado, redirigir al login
    header('Location: login.php');
    exit();
}
?> 