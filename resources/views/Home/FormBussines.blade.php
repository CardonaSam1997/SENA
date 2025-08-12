<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 700px;
            margin: 50px auto;
            background: #324E66;
            padding: 30px;
            border-radius: 12px;
            color: #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #F7B919;
            font-weight: 700;
        }
        .form-label {
            font-weight: 600;
        }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1.5px solid #F7B919;
        }
        .form-control:focus, .form-select:focus {
            border-color: #F7B919;
            box-shadow: 0 0 8px #F7B919;
        }
        .btn-submit {
            background-color: #F7B919;
            color: #324E66;
            font-weight: 700;
            border-radius: 10px;
            padding: 10px;
            width: 100%;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #e1a50a;
            color: #000;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Registro Empresa</h2>
    <form method="POST" action="">
        <!-- Fila 1 -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nit" class="form-label">NIT</label>
                <input type="text" class="form-control" id="nit" name="nit" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nombreEmpresa" class="form-label">Nombre Empresa</label>
                <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" required>
            </div>
        </div>

        <!-- Fila 2 -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="tipoServicio" class="form-label">Tipo de Servicio</label>
                <select class="form-select" id="tipoServicio" name="tipoServicio" required>
                    <option value="">Seleccione un tipo de servicio</option>
                    <option value="tecnologia">Tecnología</option>
                    <option value="construccion">Construcción</option>
                    <option value="marketing">Marketing</option>
                    <option value="recursos_humanos">Recursos Humanos</option>
                    <option value="otros">Otros</option>
                </select>
            </div>
        </div>

        <!-- Fila 3 -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="paginaWeb" class="form-label">Página Web</label>
                <input type="url" class="form-control" id="paginaWeb" name="paginaWeb" placeholder="https://" required>
            </div>
            <div class="col-md-6 mb-3">
                <!-- espacio deliberado para mantener la misma estructura visual -->
            </div>
        </div>

        <!-- Botón -->
        <button type="submit" class="btn-submit">Registrar Empresa</button>
    </form>
</div>

</body>
</html>
