<?php
require_once 'config/db.php';
include_once 'includes/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="jumbotron text-center bg-light p-5 rounded">
            <h1 class="display-4">¡Bienvenido a Cake Party!</h1>
            <p class="lead">Descubre nuestra deliciosa selección de pasteles artesanales</p>
            <hr class="my-4">
            <p>Hacemos pasteles únicos para todas tus celebraciones especiales</p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <img src="public/images/pastel1.jpg" class="card-img-top" alt="Pastel de Chocolate">
            <div class="card-body">
                <h5 class="card-title">Pastel de Chocolate</h5>
                <p class="card-text">Delicioso pastel de chocolate con ganache y decoración especial.</p>
                <a href="views/catalogo.php" class="btn btn-primary">Ver más</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="public/images/pastel2.jpg" class="card-img-top" alt="Pastel de Frutas">
            <div class="card-body">
                <h5 class="card-title">Pastel de Frutas</h5>
                <p class="card-text">Fresco pastel decorado con frutas de temporada.</p>
                <a href="views/catalogo.php" class="btn btn-primary">Ver más</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="public/images/pastel3.jpg" class="card-img-top" alt="Pastel de Bodas">
            <div class="card-body">
                <h5 class="card-title">Pastel de Bodas</h5>
                <p class="card-text">Elegante pastel de bodas con decoración personalizada.</p>
                <a href="views/catalogo.php" class="btn btn-primary">Ver más</a>
            </div>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?> 