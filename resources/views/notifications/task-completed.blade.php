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
