<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Profesional</title>
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
    <h2>Registro Profesional</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <!-- Fila 1 -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
        </div>

        <!-- Fila 2 -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="tel" class="form-control" id="celular" name="celular" required>
            </div>
        </div>

        <!-- Fila 3 -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="area" class="form-label">Área</label>
                <select class="form-select" id="area" name="area" required>
                    <option value="">Seleccione un área</option>
                    <option value="software">Desarrollo de Software</option>
                    <option value="redes">Redes y Telecomunicaciones</option>
                    <option value="soporte">Soporte Técnico</option>
                    <option value="diseño">Diseño Gráfico</option>
                    <option value="otros">Otros</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
        </div>

        <!-- Descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Cuéntanos sobre tu experiencia..." required></textarea>
        </div>

        <!-- Hoja de vida -->
        <div class="mb-3">
            <label for="hoja_vida" class="form-label">Subir hoja de vida</label>
            <input type="file" class="form-control" id="hoja_vida" name="hoja_vida" accept=".pdf,.doc,.docx" required>
        </div>

        <!-- Botón -->
        <button type="submit" class="btn-submit">Registrarme</button>
    </form>
</div>

</body>
</html>