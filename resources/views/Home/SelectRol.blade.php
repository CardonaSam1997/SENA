<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Rol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
        }
        .role-card {
            background-color: #f4f4f4;
            padding: 25px;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .role-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
        }
        .role-icon {
            font-size: 4rem;
            color: #F8BA1A;
            margin-bottom: 15px;
        }
        footer {
            text-align: center;
            margin-top: 50px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Business Task" style="height:50px;">
            <span>Bienvenido</span>
        </div>
    </div>

    <!-- Título principal -->
    <div class="container text-center mt-4">
        <h1 class="fw-bold">LOREM IPSUM</h1>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
        </p>
    </div>

    <!-- Tarjetas de selección de rol -->
    <div class="container mt-5">
        <div class="row justify-content-center g-4">
            <div class="col-md-4">
                <div class="role-card" onclick="selectRole('profesional')">
                    <i class="bi bi-person-workspace role-icon"></i>
                    <h5 class="fw-bold">Profesionales</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="role-card" onclick="selectRole('empresa')">
                    <i class="bi bi-building role-icon"></i>
                    <h5 class="fw-bold">Empresas</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5">
        Condiciones de uso
    </footer>

    <script>
        function selectRole(role) {
            alert("Has seleccionado el rol: " + role);
            // Aquí puedes redirigir según el rol:
            // window.location.href = "/registro-" + role;
        }
    </script>

</body>
</html>
