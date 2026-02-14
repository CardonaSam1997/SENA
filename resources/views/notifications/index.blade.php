@extends('HomeMain')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/Notification.css') }}">
@endsection

@section('content')

    <div class="content container py-3">
        @foreach($notifications->whereNull('read_at') as $notification)
            <x-notification-item :notification="$notification" />
        @endforeach

        <a href="{{ route('notifications.read') }}">Notificaciones revisadas</a>
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