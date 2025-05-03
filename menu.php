<?php
session_start();

// Agregar al carrito
if (isset($_POST['agregar'])) {
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];
    
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    $_SESSION['carrito'][] = ['producto' => $producto, 'precio' => $precio];
}

// Calcular total del carrito
function calcularTotal() {
    $total = 0;
    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $item) {
            $total += $item['precio'];
        }
    }
    return $total;
}

// Vaciar carrito
if (isset($_POST['vaciar_carrito'])) {
    unset($_SESSION['carrito']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú | Hamburguesas Javy's</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #004d00;
        }

        .navbar a {
            color: white !important;
            text-decoration: none;
            padding: 14px 20px;
            display: block;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #ff6600;
        }

        .header {
            text-align: center;
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 2.8rem;
            color: #004d00;
        }

        .header p {
            font-size: 1.1rem;
            color: #ff6600;
        }

        .footer {
            text-align: center;
            background-color: #333;
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }

        .card.menu-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
        }

        .card.menu-card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            height: 180px;
            object-fit: cover;
        }

        .card-body h5 {
            font-weight: 600;
            font-size: 1.2rem;
        }

        .card-body p {
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
        }

        .card-body .btn {
            width: 100%;
            font-weight: 500;
            font-size: 0.95rem;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #ff6600;
            border-color: #ff6600;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-primary:hover {
            background-color: #e65c00;
            border-color: #e65c00;
            transform: scale(1.03);
        }

        .btn-danger {
            border-radius: 8px;
        }

        .list-group-item {
            border: none;
            background-color: #fff;
            border-radius: 6px;
            margin-bottom: 8px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">Hamburguesas Javy's</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="menu.php">Menú</a></li>
                <li class="nav-item"><a class="nav-link" href="autor.php">Autor</a></li>
            </ul>
        </div>
    </nav>

    <!-- Header -->
    <div class="header">
        <h1>Menú Completo</h1>
        <p>Selecciona tus platillos favoritos y agréguelos al carrito.</p>
    </div>

    <!-- Menú -->
    <section id="menu" class="container mt-5">
        <h2>Hamburguesas</h2>
        <div class="row">
            <!-- Hamburguesa de Winny -->
            <div class="col-md-4">
                <div class="card menu-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Hamburguesa de Winny">
                    <div class="card-body">
                        <h5 class="card-title">Hamburguesa de Winny</h5>
                        <p class="card-text">Deliciosa hamburguesa con carne de winny.</p>
                        <p class="card-text font-weight-bold">$50</p>
                        <form action="menu.php" method="POST">
                            <input type="hidden" name="producto" value="Hamburguesa de Winny">
                            <input type="hidden" name="precio" value="50">
                            <button type="submit" name="agregar" class="btn btn-primary">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburguesa de Piña -->
            <div class="col-md-4">
                <div class="card menu-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Hamburguesa de Piña">
                    <div class="card-body">
                        <h5 class="card-title">Hamburguesa de Piña</h5>
                        <p class="card-text">Hamburguesa con piña fresca, sabor único.</p>
                        <p class="card-text font-weight-bold">$55</p>
                        <form action="menu.php" method="POST">
                            <input type="hidden" name="producto" value="Hamburguesa de Piña">
                            <input type="hidden" name="precio" value="55">
                            <button type="submit" name="agregar" class="btn btn-primary">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburguesa de Pyw -->
            <div class="col-md-4">
                <div class="card menu-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Hamburguesa de Pyw">
                    <div class="card-body">
                        <h5 class="card-title">Hamburguesa de Pyw</h5>
                        <p class="card-text">Hamburguesa con carne de pollo y cerdo.</p>
                        <p class="card-text font-weight-bold">$60</p>
                        <form action="menu.php" method="POST">
                            <input type="hidden" name="producto" value="Hamburguesa de Pyw">
                            <input type="hidden" name="precio" value="60">
                            <button type="submit" name="agregar" class="btn btn-primary">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promociones -->
        <h2 class="mt-5">Promociones Miércoles y Domingo</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card menu-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Promoción Winny y Papas">
                    <div class="card-body">
                        <h5 class="card-title">Hamburguesa de Winny + Papas y Refresco</h5>
                        <p class="card-text">Disfruta de esta increíble promoción.</p>
                        <p class="card-text font-weight-bold">$80</p>
                        <form action="menu.php" method="POST">
                            <input type="hidden" name="producto" value="Hamburguesa de Winny + Papas y Refresco">
                            <input type="hidden" name="precio" value="80">
                            <button type="submit" name="agregar" class="btn btn-primary">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card menu-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Promoción Piña y Papas">
                    <div class="card-body">
                        <h5 class="card-title">Hamburguesa de Piña + Papas y Refresco</h5>
                        <p class="card-text">Ideal para disfrutar en familia.</p>
                        <p class="card-text font-weight-bold">$85</p>
                        <form action="menu.php" method="POST">
                            <input type="hidden" name="producto" value="Hamburguesa de Piña + Papas y Refresco">
                            <input type="hidden" name="precio" value="85">
                            <button type="submit" name="agregar" class="btn btn-primary">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card menu-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Promoción Pyw y Papas">
                    <div class="card-body">
                        <h5 class="card-title">Hamburguesa de Pyw + Papas y Refresco</h5>
                        <p class="card-text">¡Una combinación deliciosa!</p>
                        <p class="card-text font-weight-bold">$90</p>
                        <form action="menu.php" method="POST">
                            <input type="hidden" name="producto" value="Hamburguesa de Pyw + Papas y Refresco">
                            <input type="hidden" name="precio" value="90">
                            <button type="submit" name="agregar" class="btn btn-primary">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carrito -->
        <div class="mt-5">
            <h3>Carrito de Compras</h3>
            <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0): ?>
                <ul class="list-group">
                    <?php foreach ($_SESSION['carrito'] as $item): ?>
                        <li class="list-group-item">
                            <?php echo $item['producto'] . " - $" . $item['precio']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="mt-3">
                    <strong>Total: $<?php echo calcularTotal(); ?></strong>
                </div>
                <form action="menu.php" method="POST">
                    <button type="submit" name="vaciar_carrito" class="btn btn-danger mt-3">Vaciar Carrito</button>
                </form>
            <?php else: ?>
                <p>No hay productos en el carrito.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Hamburguesas Javy's | Todos los derechos reservados</p>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>




