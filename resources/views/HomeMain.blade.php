<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="d-flex">

    <!-- Sidebar -->
    <div id="sidebar" class="bg-dark text-white vh-100 p-2 expanded" style="width:200px;">
        <a href="javascript:void(0)" id="toggle-btn" class="d-flex align-items-center text-warning text-decoration-none mb-4">
            <i class="fas fa-bars me-2"></i>
        </a>
        <a href="{{ route('tareas.create') }}" class="d-flex align-items-center text-warning text-decoration-none py-2">
            <i class="fas fa-plus-circle me-2"></i> <span>Publicar tarea</span>
        </a>
        <a href="{{ route('tareas.ver') }}" class="d-flex align-items-center text-warning text-decoration-none py-2">
            <i class="fas fa-tasks me-2"></i> <span>Ver tareas</span>
        </a>       
        <a href="{{ route('profesionales.show', ['id' => 3]) }}" class="d-flex align-items-center text-warning text-decoration-none py-2">
            <i class="fas fa-star me-2"></i> <span>Calificaciones</span>
        </a>
        <a href="#" class="d-flex align-items-center text-warning text-decoration-none py-2">
            <i class="fas fa-cog me-2"></i> <span>Configuración</span>
        </a>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1">
        <!-- Topbar -->
        <div class="d-flex justify-content-between align-items-center bg-white border-bottom px-4" style="height:80px;">
            <div>
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width:150px;">
            </div>
            <div class="d-flex align-items-center">
                <i class="fas fa-bell text-warning fs-4 me-3"></i>
                <i id="user-icon" class="fas fa-user-circle fs-4" style="cursor:pointer;"></i>
                <!-- Menú usuario -->
                <div id="user-menu" class="position-absolute bg-white border rounded shadow-sm mt-5" style="display:none; right:40px; z-index:1000;">
                    <a href="#" class="d-flex align-items-center text-decoration-none text-dark px-3 py-2">
                        <i class="fas fa-door-open me-2"></i> Cerrar sesión
                    </a>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="container py-4">
            @yield('content')
        </div>
    </div>

    <script>
        document.getElementById('toggle-btn').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
            sidebar.style.width = sidebar.classList.contains('collapsed') ? '45px' : '200px';
        });

        const userIcon = document.getElementById('user-icon');
        const userMenu = document.getElementById('user-menu');

        userIcon.addEventListener('click', () => {
            userMenu.style.display = (userMenu.style.display === 'block') ? 'none' : 'block';
        });

        document.addEventListener('click', (e) => {
            if (!userIcon.contains(e.target) && !userMenu.contains(e.target)) {
                userMenu.style.display = 'none';
            }
        });
    </script>
</body>
</html>