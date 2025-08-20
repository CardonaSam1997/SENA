<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Business Task</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  @yield('styles')
  <link rel="stylesheet" href="{{ asset('css/HomeMain.css') }}">  
</head>
<body>

  <div class="app">    
    <aside id="sidebar" class="d-flex flex-column">
      <a href="#" id="toggle-btn" class="mb-2">
        <i class="fas fa-bars"></i> <span>Menú</span>
      </a>
      @if (request()->segment(1) == 'professional')      
         <a href="{{ route('professional.search') }}" class="nav-link">
            <i class="fas fa-search"></i><span>Buscar Tarea</span>
        </a>
        <a href="{{ route('professional.pendingTasks') }}" class="nav-link">      
            <i class="fas fa-tasks"></i><span> Listar trabajos</span>
        </a>
        <a href="{{ route('professional.configuracion') }}" class="nav-link">
            <i class="fas fa-cog"></i><span>Configuración</span>
        </a>
      @else      
        <a href="{{ route('bussines.create') }}">
          <i class="fas fa-plus-circle"></i><span>Publicar tarea</span>
        </a>
        <a href="{{ route('bussines.listar') }}">
          <i class="fas fa-tasks"></i><span>Ver tareas</span>
        </a>      
        <a href="{{ route('bussines.configuracion') }}">
          <i class="fas fa-cog"></i><span>Configuración</span>
        </a>
      @endif
    </aside>

    <div class="right">
      <header class="topbar">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width:160px;">
        <div class="d-flex align-items-center">
        @if (request()->segment(1) == 'professional')      
        <a href="{{ route('professional.notification') }}" class="me-3 text-decoration-none" style="" id="notification">
          <i class="fas fa-bell text-warning fs-4"></i>
          <div class="circle"></div>
        </a>          
          @else
          <a href="{{ route('view.notifications') }}" class="me-3 text-decoration-none" style="" id="notification">
            <i class="fas fa-bell text-warning fs-4"></i>
            <div class="circle"></div>
          </a>
          @endif

          <i id="user-icon" class="fas fa-user-circle fs-4" style="cursor:pointer;"></i>
          <div id="user-menu" class="position-absolute bg-white border rounded shadow-sm mt-5"
               style="display:none; right:24px; z-index:1000;">
            <a href="{{ route('pageMain') }}" class="d-flex align-items-center text-decoration-none text-dark px-3 py-2">
              <i class="fas fa-door-open me-2"></i> Cerrar sesión              
            </a>

            <a href="#" class="d-flex align-items-center text-decoration-none text-danger px-3 py-2">
              <i class="fas fa-user-slash me-2"></i> <strong>Eliminar cuenta</strong>
            </a>
          </div>
        </div>
      </header>
      
      <main class="main">        
        <div class="container-xl page-container">
          @yield('content')
        </div>
      </main>
    </div>
  </div>
<script src="{{ asset('js/HomeMainSideBar.js') }}"></script>
</body>
</html>
