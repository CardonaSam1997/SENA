<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Profesional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border-radius: 10px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .comment-card {
            background-color: #ffffff;
            border-left: 5px solid #007bff;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
        }
        .star {
            color: gold;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="row">
            <!-- Información del profesional -->
            <div class="col-lg-4">
                <div class="card shadow-sm p-3 mb-4">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="Foto Profesional">
                        <h4>Juan Pérez</h4>
                        <p class="text-muted">Desarrollador Backend</p>
                        <div>
                            <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">☆</span>
                        </div>
                    </div>
                    <hr>
                    <p><strong>Años de experiencia:</strong> 5</p>
                    <p><strong>Lugar de residencia:</strong> Bogotá, Colombia</p>
                    <p><strong>Hoja de vida:</strong> <a href="#">Descargar PDF</a></p>
                </div>
            </div>

            <!-- Comentarios -->
            <div class="col-lg-8">
                <div class="card shadow-sm p-3">
                    <h5 class="mb-3">Comentarios de empresas</h5>
                    
                    <div class="comment-card">
                        <strong>Empresa: Tech Solutions S.A.S</strong>
                        <p>Excelente profesional, entregó todo antes de la fecha límite.</p>
                    </div>
                    
                    <div class="comment-card">
                        <strong>Empresa: InnovarTech</strong>
                        <p>Muy comprometido y con gran capacidad para resolver problemas complejos.</p>
                    </div>
                    
                    <div class="comment-card">
                        <strong>Empresa: Software Creativo</strong>
                        <p>Buena comunicación y calidad de trabajo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
