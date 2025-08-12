<!-- resources/views/general.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>     
    
        .notification {
            margin:20px 30px;
            display: flex;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
            align-items: flex-start;
            background-color: #f9f9f9;
        }
        .notification img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            background-color: #ddd;
        }
        .notification-content {
            flex: 1;
        }
        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }
        .notification-header h4 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }
        .notification-header small {
            color: gray;
            font-size: 12px;
        }
        .notification p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }
        .error-text {
            color: red;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .container-searchTask {
            display: grid;
            grid-template-columns: 1fr 1fr 2fr;
            gap: 10px;
            padding: 10px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background: #fff;
        }
        .header {
            background: #d4f5d4;
            padding: 5px;
            border-radius: 20px;
            text-align: center;
            font-weight: bold;
        }
        .filtros input[type="text"], .filtros button {
            width: 100%;
            padding: 5px;
            margin: 5px 0;
        }
        .filtros label {
            display: block;
            margin: 5px 0;
        }
        .tarea-item {
            display: flex;
            gap: 10px;
            align-items: center;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px 0;
        }
        .img-cuadro {
            width: 50px;
            height: 50px;
            background: brown;
        }
        .detalles .img-grande {
            width: 70px;
            height: 70px;
            background: brown;
        }
        .detalles h4, .detalles p {
            margin: 5px 0;
        }
        .detalles ul {
            margin: 10px 0;
        }
        .archivo {
            display: inline-block;
            width: 60px;
            height: 60px;
            background: #eee;
            margin: 5px;
        }




        body {
            display: flex;
        }
        .sidebar {
            background-color: #25405e;
            color: white;
            min-height: 100vh;
            transition: width 0.3s;
            overflow: hidden;
            white-space: nowrap;
        }
        .sidebar.collapsed {
            width: 45px;
        }
        .sidebar.expanded {
            width: 200px;
        }
        .sidebar a {
            color: gold;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 15px 5px;
            margin-bottom:5px;            
        }
        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar i {
            min-width: 40px;
            text-align: center;
        }
        .content {
            flex-grow: 1;            
        }
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 10px 40px;
            border-bottom: 1px solid #ccc;
            height:80px;
            position: relative;
        }
        .sidebar>a:nth-child(1){
          padding-top:10px;
          height:40px;
          margin-bottom:90px;
        }
        /* Estilo del menú desplegable */
        .user-menu {
            position: absolute;
            top: 70px;
            right: 40px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 6px;
            display: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
            z-index: 1000;
        }
        .user-menu a {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
        }
        .user-menu a:hover {
            background-color: #f5f5f5;
        }
        .user-menu i {
            margin-right: 8px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar expanded">
        <a href="javascript:void(0)" id="toggle-btn">
            <i class="fas fa-bars"></i>            
        </a>
        <a href="{{ route('tareas.create') }}">
            <i class="fas fa-plus-circle"></i>
            <span>Publicar tarea</span>
        </a>
        <a href="{{ route('tareas.ver') }}">
            <i class="fas fa-tasks"></i>
            <span>Ver tareas</span>
        </a>
        <a href="{{ route('tareas.detalles') }}">
            <i class="fas fa-envelope-open-text"></i>
            <span>Revisar solicitudes</span>
        </a>
        <a href="{{ route('profesionales.show', ['id' => 3]) }}">
            <i class="fas fa-star"></i>
            <span>Calificaciones</span>
        </a>
        <!-- Módulo de configuración -->
        <a href="#">
            <i class="fas fa-cog"></i>
            <span>Configuración</span>
        </a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="topbar">
            <div>
              <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width:150px;">
            </div>
            <div>
                <i class="fas fa-bell text-warning fs-4 me-3"></i>
                <i id="user-icon" class="fas fa-user-circle fs-4" style="cursor: pointer;"></i>
                <!-- Menú desplegable -->
                <div id="user-menu" class="user-menu">
                    <a href="#">
                        <i class="fas fa-door-open"></i> Cerrar sesión
                    </a>
                </div>
            </div>
        </div>
        @yield('content')
    </div>

    <script>
        document.getElementById('toggle-btn').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
            sidebar.classList.toggle('expanded');
        });

        // Toggle menú usuario
        const userIcon = document.getElementById('user-icon');
        const userMenu = document.getElementById('user-menu');

        userIcon.addEventListener('click', () => {
            userMenu.style.display = (userMenu.style.display === 'block') ? 'none' : 'block';
        });

        // Cerrar menú si se hace clic fuera
        document.addEventListener('click', (e) => {
            if (!userIcon.contains(e.target) && !userMenu.contains(e.target)) {
                userMenu.style.display = 'none';
            }
        });
    </script>

</body>
</html>