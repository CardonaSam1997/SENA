@extends('HomeMain')

@section('styles')
<style>
  .task-card {
    background: #fff;
    border-radius: 12px;
    padding: 15px;
    margin-bottom: 15px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    display: flex;
    align-items: flex-start;
    transition: all 0.2s ease-in-out;
  }

  .task-card:hover {
    transform: translateY(-2px);
  }

  .task-img {
    flex-shrink: 0;
    width: 48px;
    height: 48px;
    border-radius: 10px;
    background: #0d6efd;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
  }

  .task-header {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-bottom: 6px;
  }

  .task-title {
    font-weight: 600;
    font-size: 1rem;
    color: #212529;
  }

  .task-header small {
    font-size: 0.8rem;
    color: #6c757d;
  }

  .task-desc {
    font-size: 0.9rem;
    color: #495057;
  }

  /* Ajustes móviles */
  @media (max-width: 576px) {
    .task-card {
      flex-direction: column;
      align-items: flex-start;
    }
    .task-img {
      margin-bottom: 10px;
    }
    .task-header {
      flex-direction: column;
      align-items: flex-start;
      gap: 3px;
    }
  }
</style>
@endsection

@section('content')
<div class="content container py-3">


@foreach($notifications as $notification)
<div class="task-card">
    <div class="task-img bg-warning">
        <i class="fas fa-clock"></i>
    </div>

    <div class="flex-grow-1 ms-3">
        <div class="task-header">
            <span class="task-title">{{ $notification->data['title'] }}</span>
            <small>{{ $notification->created_at->format('d/m/Y') }}</small>
        </div>

        <p class="task-desc mb-0">
            {{ $notification->data['message'] }}
        </p>
    </div>
</div>
@endforeach

  <!-- Notificación 1 -->
  <div class="task-card">
    <div class="task-img">
      <i class="fas fa-tasks"></i>
    </div>
    <div class="flex-grow-1 ms-3">
      <div class="task-header">
        <span class="task-title">Nueva tarea asignada</span>
        <small>03/09/2025</small>
      </div>
      <p class="task-desc mb-0">
        Se te asignó la tarea <strong>"Diseño de Landing Page"</strong> en el área de <em>Diseño</em>, con vencimiento el <strong>15/08/2025</strong>.
      </p>
    </div>
  </div>

  <!-- Notificación 2 -->
  <div class="task-card">
    <div class="task-img bg-warning">
      <i class="fas fa-clock"></i>
    </div>
    <div class="flex-grow-1 ms-3">
      <div class="task-header">
        <span class="task-title">Tarea próxima a vencer</span>
        <small>02/09/2025</small>
      </div>
      <p class="task-desc mb-0">
        La tarea <strong>"Desarrollo de API"</strong> vence el <strong>20/08/2025</strong>. Recuerda avanzar en el área de <em>Sistemas</em>.
      </p>
    </div>
  </div>

  <!-- Notificación 3 -->
  <div class="task-card">
    <div class="task-img bg-success">
      <i class="fas fa-check-circle"></i>
    </div>
    <div class="flex-grow-1 ms-3">
      <div class="task-header">
        <span class="task-title">Tarea completada</span>
        <small>01/09/2025</small>
      </div>
      <p class="task-desc mb-0">
        La tarea <strong>"Campaña de Marketing"</strong> fue entregada exitosamente en el área de <em>Marketing</em>.
      </p>
    </div>
  </div>

</div>

@if(session('welcome_professional'))
<div class="modal fade" id="welcomeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¡Bienvenido!</h5>
            </div>
            <div class="modal-body">
                <p>
                    El perfil se creo correctamente.  
                    Desde aquí puedes crear y gestionar a tareas, recuerda autenticarte para poder aplicar a ellas.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    Entendido
                </button>
            </div>
        </div>
    </div>
</div>
@endif

@if(session('welcome_professional'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = new bootstrap.Modal(
            document.getElementById('welcomeModal')
        );
        modal.show();
    });
</script>
@endif
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection