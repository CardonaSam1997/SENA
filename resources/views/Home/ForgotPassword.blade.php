<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #d4af37;
            border: none;
        }
        .btn-primary:hover {
            background-color: #b7952b;
        }
        label {
            font-weight: bold;
            color: #555;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h3 class="text-center mb-4">Recuperar Contraseña</h3>
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo" required>
                    </div>                    
                    <div class="mb-3">
                        <label for="nuevaContraseña" class="form-label">Nueva contraseña</label>
                        <input type="password" class="form-control" id="nuevaContraseña" placeholder="Ingresa tu nueva contraseña">
                    </div>
                    <div class="mb-3">
                        <label for="confirmarContraseña" class="form-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="confirmarContraseña" placeholder="Confirma tu nueva contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Restablecer Contraseña</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
