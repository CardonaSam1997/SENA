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
    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
  </head>
  <body>

    <div class="app d-flex">    
      <aside id="sidebar" class="sidebar d-none d-md-flex flex-column bg-primary text-white">
        <div class="sidebar-top d-flex align-items-center justify-content-between p-3">
          <a href="#" id="toggle-btn" class="text-white text-decoration-none d-flex align-items-center">
            <i class="fas fa-bars me-2"></i>
            <span class="sidebar-title">Menú</span>
          </a>
          
        </div>

        <nav class="nav flex-column px-2">
          @if (request()->segment(1) == 'professional')
            <a href="{{ route('professional.search') }}" class="nav-link text-white py-2"><i class="fas fa-search me-2"></i><span class="link-text">Buscar Tarea</span></a>
            <a href="{{ route('professional.pendingTasks') }}" class="nav-link text-white py-2"><i class="fas fa-tasks me-2"></i><span class="link-text">Listar trabajos</span></a>
            <a href="{{ route('professional.configuracion') }}" class="nav-link text-white py-2"><i class="fas fa-cog me-2"></i><span class="link-text">Configuración</span></a>
          @else
            <a href="{{ route('company.tasks.create') }}" class="nav-link text-white py-2">
              <i class="fas fa-plus-circle me-2"></i>
              <span class="link-text">Publicar tarea</span>
            </a>
            <a href="{{ route('company.tasks.index') }}" class="nav-link text-white py-2">
              <i class="fas fa-tasks me-2"></i>
              <span class="link-text">Ver tareas</span>
            </a>            
            <a href="{{ route('company.configuracion') }}" class="nav-link text-white py-2">
              <i class="fas fa-cog me-2"></i>
              <span class="link-text">Configuración</span>
            </a>
          @endif
        </nav>

        <div class="sidebar-footer mt-auto p-3 small">
          <div>© {{ date('Y') }} Sena</div>
        </div>
      </aside>
      
      <div class="right flex-grow-1 d-flex flex-column">
        <header class="topbar d-flex justify-content-between align-items-center p-2 border-bottom bg-white">        
          <button class="btn btn-outline-primary d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
            <i class="fas fa-bars"></i>
          </button>
          
          <div class="d-flex align-items-center flex-grow-1 justify-content-center justify-content-md-start">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid" style="max-width:140px;">
          </div>

          <div class="d-flex align-items-center position-relative">
            @if (request()->segment(1) == 'professional')
              <a href="{{ route('notifications.index') }}" class="me-3 position-relative text-decoration-none text-dark">
                <x-bell-notification />
              </a>
            @else
              <a href="{{ route('notifications.index') }}" class="me-3 position-relative text-decoration-none text-dark">
                <x-bell-notification />
              </a>
            @endif

            <i id="user-icon" class="fas fa-user-circle fs-4 me-2" style="cursor:pointer;"></i>
            <div id="user-menu" class="position-absolute bg-white border rounded shadow-sm"
                style="display:none; right:0; top:48px; z-index:1000; min-width:180px;">
              <a href="{{ route('pageMain') }}" class="d-flex align-items-center text-decoration-none text-dark px-3 py-2">
                <i class="fas fa-door-open me-2"></i> Cerrar sesión
              </a>
              <a href="#" class="d-flex align-items-center text-decoration-none text-danger px-3 py-2">
                <i class="fas fa-user-slash me-2"></i> <strong>Eliminar cuenta</strong>
              </a>
            </div>
          </div>
        </header>

        <main class="main flex-grow-1 p-3">
          <div class="container-fluid page-container">
            @yield('content')
          </div>
        </main>
      </div>
    </div>
    
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
      <div class="offcanvas-header">
        <h5 id="mobileSidebarLabel">Menú</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
      </div>
      <div class="offcanvas-body">
        @if (request()->segment(1) == 'professional')
          <a href="{{ route('professional.search') }}" class="nav-link mb-2"><i class="fas fa-search me-2"></i>Buscar Tarea</a>
          <a href="{{ route('professional.pendingTasks') }}" class="nav-link mb-2"><i class="fas fa-tasks me-2"></i>Listar trabajos</a>
          <a href="{{ route('professional.configuracion') }}" class="nav-link mb-2"><i class="fas fa-cog me-2"></i>Configuración</a>
        @else
          <a href="{{ route('company.tasks.create') }}" class="nav-link mb-2"><i class="fas fa-plus-circle me-2"></i>Publicar tarea</a>
          <a href="{{ route('company.tasks.index') }}" class="nav-link mb-2"><i class="fas fa-tasks me-2"></i>Ver tareas</a>
          <a href="{{ route('company.configuracion') }}" class="nav-link mb-2"><i class="fas fa-cog me-2"></i>Configuración</a>
        @endif
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/HomeMainSideBar.js') }}"></script>
  </body>
</html>