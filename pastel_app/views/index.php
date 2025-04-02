<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cake Party - Pasteles Personalizados</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --rosa-pastel: #ffb6c1;
            --blanco: #ffffff;
            --crema: #fff5ee;
            --dorado: #ffd700;
            --chocolate: #8b4513;
            --lila: #e6e6fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--crema);
            color: #333;
        }

        /* Header */
        .header {
            background-color: var(--blanco);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            font-family: 'Dancing Script', cursive;
            font-size: 2.5rem;
            color: var(--rosa-pastel);
            text-decoration: none;
            font-weight: bold;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
        }

        .nav-link {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--rosa-pastel);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)),
                        url('../../public/images/hero-bg.jpg') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 2rem;
            margin-top: 80px;
        }

        .hero-content {
            max-width: 800px;
        }

        .hero-title {
            font-family: 'Dancing Script', cursive;
            font-size: 4rem;
            color: var(--rosa-pastel);
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 2rem;
        }

        /* Sección de Características */
        .features {
            padding: 5rem 2rem;
            background-color: var(--blanco);
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background-color: var(--crema);
            padding: 2rem;
            border-radius: 1rem;
            text-align: center;
            transition: transform 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--rosa-pastel);
            margin-bottom: 1rem;
        }

        .feature-title {
            font-family: 'Dancing Script', cursive;
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 1rem;
        }

        /* Sección de Diseño de Pastel */
        .cake-designer {
            padding: 5rem 2rem;
            background-color: var(--lila);
        }

        .designer-container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .designer-title {
            font-family: 'Dancing Script', cursive;
            font-size: 3rem;
            color: var(--rosa-pastel);
            margin-bottom: 2rem;
        }

        .design-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .design-option {
            background-color: var(--blanco);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .option-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        }

        .option-title {
            font-family: 'Dancing Script', cursive;
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        /* Botones */
        .btn-primary {
            background: linear-gradient(45deg, var(--rosa-pastel), var(--lila));
            border: none;
            color: var(--blanco);
            padding: 1rem 2rem;
            border-radius: 2rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, var(--lila), var(--rosa-pastel));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        /* Footer */
        .footer {
            background-color: var(--blanco);
            padding: 3rem 2rem;
            text-align: center;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-title {
            font-family: 'Dancing Script', cursive;
            font-size: 2rem;
            color: var(--rosa-pastel);
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin: 1rem 0;
        }

        .social-link {
            color: var(--rosa-pastel);
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }

        .social-link:hover {
            color: var(--lila);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            
            .hero-title {
                font-size: 3rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav-container">
            <a href="#" class="logo">Cake Party</a>
            <div class="nav-menu">
                <a href="#" class="nav-link">Inicio</a>
                <a href="#" class="nav-link">Diseña tu Pastel</a>
                <a href="#" class="nav-link">Catálogo</a>
                <a href="#" class="nav-link">Nosotros</a>
                <a href="#" class="nav-link">Contacto</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Diseña tu Pastel Soñado</h1>
            <p class="hero-subtitle">Creamos pasteles únicos y deliciosos para hacer tus momentos especiales inolvidables</p>
            <a href="#" class="btn-primary">Comenzar Diseño</a>
        </div>
    </section>

    <!-- Características -->
    <section class="features">
        <div class="features-container">
            <div class="feature-card">
                <i class="fas fa-paint-brush feature-icon"></i>
                <h3 class="feature-title">Diseño Personalizado</h3>
                <p>Crea tu pastel único con nuestras opciones de diseño personalizado</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-heart feature-icon"></i>
                <h3 class="feature-title">Ingredientes Frescos</h3>
                <p>Utilizamos solo los mejores ingredientes frescos y de alta calidad</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-truck feature-icon"></i>
                <h3 class="feature-title">Entrega Segura</h3>
                <p>Entregamos tu pastel con cuidado y puntualidad</p>
            </div>
        </div>
    </section>

    <!-- Diseño de Pastel -->
    <section class="cake-designer">
        <div class="designer-container">
            <h2 class="designer-title">Personaliza tu Pastel</h2>
            <div class="design-options">
                <div class="design-option">
                    <img src="../../public/images/tematica.jpg" alt="Temática" class="option-image">
                    <h3 class="option-title">Elige la Temática</h3>
                    <p>Desde cumpleaños hasta bodas, tenemos la temática perfecta para tu ocasión</p>
                </div>
                <div class="design-option">
                    <img src="../../public/images/sabor.jpg" alt="Sabor" class="option-image">
                    <h3 class="option-title">Selecciona el Sabor</h3>
                    <p>Descubre nuestra variedad de sabores deliciosos</p>
                </div>
                <div class="design-option">
                    <img src="../../public/images/decoracion.jpg" alt="Decoración" class="option-image">
                    <h3 class="option-title">Personaliza la Decoración</h3>
                    <p>Agrega detalles únicos para hacer tu pastel especial</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <h2 class="footer-title">Cake Party</h2>
            <p>Haciendo tus momentos especiales más dulces</p>
            <div class="social-links">
                <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
            </div>
            <p>&copy; 2024 Cake Party. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html> 