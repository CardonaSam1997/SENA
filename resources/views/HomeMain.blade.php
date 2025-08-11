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
    <!-- Main Content -->
    <div class="content">
        <div class="topbar">
            <div>
              <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width:150px;">
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