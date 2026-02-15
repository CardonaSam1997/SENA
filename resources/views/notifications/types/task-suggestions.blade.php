@extends('HomeMain')

@section('content')
<div class="container">

    <h4 class="mb-4 text-info">
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
            <p><strong>Fecha de vencimiento:</strong>
                {{ $task->expiration_date->format('d/m/Y') }}
            </p>
        </div>
    </div>

    {{-- Tabla de sugerencias --}}
    <div class="card">
        <div class="card-header bg-info text-white fw-bold">
            Profesionales que enviaron sugerencias
        </div>

        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Profesional</th>
                        <th>Experiencia</th>
                        <th>Sugerencia</th>
                        <th>Puntaje</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($applications as $apply)
                        <tr>
                            <td>
                                {{ $apply->professional->name }}
                                {{ $apply->professional->last_name }}
                            </td>
                            <td>{{ $apply->professional->experience }} años</td>
                            <td>{{ $apply->suggestion }}</td>
                            <td>{{ $apply->score }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">
                                No hay sugerencias registradas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection