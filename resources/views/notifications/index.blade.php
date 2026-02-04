@extends('HomeMain')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/Notification.css') }}">
@endsection

@section('content')
<div class="content container py-3">



  @foreach($notifications->whereNull('read_at') as $notification)
      <x-notification-item :notification="$notification" />
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