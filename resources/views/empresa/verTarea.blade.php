@extends('HomeMain')

@section('content')
<div class="container-fluid px-2 px-md-4">
    <h2 class="mb-4 text-center text-md-start">Lista de Tareas</h2>

    <div class="table-responsive">
        <table id="tablaTareas" class="table table-bordered table-striped align-middle text-center w-100">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Área</th>
                    <th>Fecha Vencimiento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->area }}</td>
                        <td>{{ $task->expiration_date->format('Y-m-d') }}</td>
                        <td>
                            @php
                                $badge = match($task->state) {
                                    'pendiente' => 'danger',
                                    'asignada' => 'primary',
                                    'finalizada' => 'success',
                                    default => 'secondary',
                                };
                            @endphp

                            <span class="badge bg-{{ $badge }}">
                                {{ ucfirst($task->state) }}
                            </span>
                        </td>
                        <td>
                            
                            <a href="{{ route('company.tasks.edit', $task->id) }}" class="btn btn-warning btn-sm me-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            
                            <form action="{{ route('company.tasks.destroy', $task->id) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Eliminar esta tarea?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

        </table>
        <div class="d-flex justify-content-center mt-3">
    {{ $tasks->links('pagination::bootstrap-5') }}
</div>

    </div>
</div>

{{-- Estilos para mejorar en móvil --}}
<style>
@media (max-width: 576px) {
    .btn-sm {
        padding: 0.5rem 0.7rem;
        font-size: 0.9rem;
    }
    #tablaTareas th, #tablaTareas td {
        white-space: nowrap;
        font-size: 0.85rem;
    }
}
</style>

{{-- DataTables Responsive --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#tablaTareas').DataTable({
        responsive: true,
        paging: false,
        searching: false,
        info: false,
        ordering: false,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
</script>

@endsection
