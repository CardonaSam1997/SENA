@extends('HomeMain')

@section('content')
<div class="container">

    <h4 class="mb-4 text-success">
        {{ $notification->data['title'] }}
    </h4>

    {{-- Detalle de la tarea --}}
    <div class="card mb-4">
    <div class="card-header bg-light fw-bold">
        Detalles de la tarea
    </div>

    <div class="card-body">

        <p><strong>Título:</strong> {{ $task->title }}</p>
        <p><strong>Área:</strong> {{ $task->area }}</p>
        <p><strong>Descripción:</strong></p>
        <p>{{ $task->content }}</p>
        <p><strong>Estado:</strong> {{ ucfirst($task->state) }}</p>
        <p><strong>Fecha de vencimiento:</strong>
            {{ $task->expiration_date->format('d/m/Y') }}
        </p>

        @if($applyTask->delivery_file)
            <div class="text-center mt-4">
                @if($applyTask->paid)
                    <a href="{{ asset('storage/'.$applyTask->delivery_file) }}"
                       class="btn btn-success"
                       target="_blank">
                        <i class="fas fa-download"></i> Descargar archivo
                    </a>
                @else
                    <a href="#"
                       class="btn btn-warning d-flex align-items-center justify-content-center gap-2">
                        <i class="fab fa-paypal fa-2x"></i>
                        <span>Pagar con PayPal</span>
                    </a>
                @endif
            </div>
        @else
            <p class="text-muted mt-3">
                La tarea aún no ha sido entregada.
            </p>
        @endif

    </div>
</div>

    {{-- Profesional que completó la tarea --}}
    <div class="card">
        <div class="card-header bg-success text-white fw-bold">
            Profesional que completó la tarea
        </div>

        <div class="card-body">
            <p><strong>Nombre:</strong>
                {{ $professional->name }} {{ $professional->last_name }}
            </p>
            <p><strong>Experiencia:</strong> {{ $professional->experience }} años</p>
            <p><strong>Educación:</strong> {{ $professional->academic_education }}</p>
            <p><strong>Servicio:</strong> {{ $professional->service_type }}</p>
        </div>
    </div>

</div>
@endsection