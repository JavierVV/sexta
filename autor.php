<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autor del Proyecto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #ff6600, #004d00);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 50px 20px;
        }

        .card {
            background-color: white;
            color: #333;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            padding: 40px 30px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .autor-img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #ff6600;
            margin-bottom: 20px;
        }

        h1 {
            color: #004d00;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .qr-section {
            margin-top: 30px;
        }

        .qr-section img {
            width: 180px;
            height: 180px;
        }

        .btn-volver {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 25px;
            background-color: #004d00;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-volver:hover {
            background-color: #003300;
        }

        .social-icons {
            margin-top: 20px;
        }

        .social-icons i {
            margin: 0 10px;
            color: #004d00;
            font-size: 24px;
            transition: transform 0.2s;
        }

        .social-icons i:hover {
            transform: scale(1.2);
            color: #ff6600;
        }

        @media (max-width: 600px) {
            .card {
                padding: 30px 20px;
            }

            .autor-img {
                width: 140px;
                height: 140px;
            }

            .qr-section img {
                width: 150px;
                height: 150px;
            }
        }
    </style>
</head>
<body>

    <div class="card">
        <img src="foto1.jpeg" alt="Autor" class="autor-img">
        <h1>Javier Villaseñor</h1>
        <p><i class="fas fa-user-graduate"></i> Estudiante de medios digitales</p>

        <div class="qr-section">
            <h3><i class="fas fa-qrcode"></i> Escanea el QR para visitar el sitio:</h3>
            <img src="https://api.qrserver.com/v1/create-qr-code/?data=http://localhost/index.php&size=200x200" alt="QR del sitio">
        </div>

        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-github-square"></i></a>
            <a href="#"><i class="fab fa-instagram-square"></i></a>
        </div>

        <a href="index.php" class="btn-volver"><i class="fas fa-arrow-left"></i> Volver al Inicio</a>
    </div>

</body>
</html>

