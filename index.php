<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamburguesas Javy's</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #333;
        }

        .navbar {
            background-color: #004d00;
        }
        .navbar a {
            color: white !important; /* Aseguramos que el texto sea blanco */
            text-decoration: none;
            padding: 14px 20px;
            display: block;
        }
        .navbar a:hover {
            background-color: #ff6600;
        }

        .header {
            text-align: center;
            margin-top: 50px;
        }
        .header h1 {
            font-size: 3rem;
            color: #004d00;
        }
        .header p {
            font-size: 1.2rem;
            color: #ff6600;
        }

        .carousel-item img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .footer {
            text-align: center;
            background-color: #333;
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }

        .btn-primary {
            background-color: #ff6600;
            border-color: #ff6600;
        }
        .btn-primary:hover {
            background-color: #e65c00;
            border-color: #e65c00;
        }

        h2, h3 {
            color: #004d00;
        }

        .menu-card {
            margin-bottom: 30px;
        }

        .autor-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #004d00;
        }

        @media (max-width: 767px) {
            .carousel-item img {
                height: 300px;
            }
            .header h1 {
                font-size: 2.5rem;
            }
            .header p {
                font-size: 1rem;
            }
            .menu-card {
                margin-bottom: 15px;
            }
            .autor-img {
                width: 150px;
                height: 150px;
            }
        }

        /* Estilos del modal de bienvenida */
        #welcomeModal {
            display: none;
            background: rgba(0, 0, 0, 0.8);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
        }

        #welcomeModal .modal-content {
            padding: 30px;
        }
    </style>
</head>
<body>

    <!-- Modal de bienvenida -->
    <div id="welcomeModal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-center">
          <h2>¡Hola! Bienvenido a Hamburguesas Javy's 🍔</h2>
          <p class="mt-3">Presiona continuar para entrar al sitio</p>
          <button class="btn btn-primary mt-3" onclick="cerrarModal()">Continuar</button>
        </div>
      </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Hamburguesas Javy's</a>
        <!-- Botón de menú (hamburguesa) para móviles -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menú -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="menu.php">Menú</a></li>
                <li class="nav-item"><a class="nav-link" href="autor.php">Autor</a></li>
            </ul>
        </div>
    </nav>

    <!-- Header -->
    <div class="header">
        <h1>¡Bienvenidos a Hamburguesas Javy's!</h1>
        <p>Las mejores hamburguesas de la ciudad.</p>
    </div>

    <!-- Carrusel de imágenes -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1570194100767-b88f7502d3a4" class="d-block w-100" alt="Hamburguesa 1">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1506748686218-d2de1cb9c22b" class="d-block w-100" alt="Hamburguesa 2">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1599786744383-027defd1b204" class="d-block w-100" alt="Hamburguesa 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <!-- Sección Quiénes somos -->
    <section id="menu" class="container mt-5 text-center">
        <img src="http://jevvo.infinityfreeapp.com/img2/menu.png" alt="Menú Hamburguesas Javy's" class="img-fluid mb-3" style="max-width: 300px;">
        <h2 class="mb-4">¿Quiénes somos?</h2>
        <p>¡Buen día a todas las personas en Ciudad Juárez! Somos Hamburguesas Javy’s, un servicio donde te brindamos comida rápida, ya sea en nuestro local o en eventos sociales. Contamos con servicio a domicilio y precios especiales para eventos. Nuestro servicio consiste en la preparación de deliciosas hamburguesas, papas, papas con queso y acompañamientos como refresco o agua. Puedes seguirnos en nuestras redes sociales para más información.</p>
        <div class="row">
            <?php
            $sql = "SELECT * FROM productos";
            $resultado = $conexion->query($sql);

            if ($resultado->num_rows > 0) {
                while ($producto = $resultado->fetch_assoc()) {
                    echo '
                    <div class="col-md-4 col-12">
                        <div class="card menu-card">
                            <img src="' . $producto["imagen_url"] . '" class="card-img-top" alt="' . $producto["nombre"] . '">
                            <div class="card-body">
                                <h5 class="card-title">' . $producto["nombre"] . '</h5>
                                <p class="card-text">' . $producto["descripcion"] . '</p>
                                <p class="card-text font-weight-bold">$' . $producto["precio"] . '</p>
                                <a href="menu_completo.php?producto_id=' . $producto["id"] . '" class="btn btn-primary">Pedir</a>
                            </div>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Hamburguesas Javy's | Todos los derechos reservados</p>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        // Mostrar modal solo si no se ha visto antes
        window.onload = function() {
            if (localStorage.getItem('bienvenidaVisto') !== 'si') {
                document.getElementById('welcomeModal').style.display = 'block';
            }
        };

        function cerrarModal() {
            document.getElementById('welcomeModal').style.display = 'none';
            localStorage.setItem('bienvenidaVisto', 'si'); // Guardar en navegador
        }
    </script>

</body>
</html>













