@extends('HomeMain')

@section('content')
<div class="container-fluid px-2 px-md-4">
    <h2 class="mb-4 text-center text-md-start">Lista de Tareas</h2>

    @if($tasks->isEmpty())
    <div class="alert alert-info text-center">
        No tienes tareas autorizadas actualmente.
    </div>
@else
    <div class="table-responsive">
         <x-data-table id="tablaTareas">
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
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->area }}</td>
                        <td>{{ $task->expiration_date }}</td>
                        <td>
                            <span class="badge bg-primary">
                                {{ $task->state }}
                            </span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-data-table>           
    </div>
    @endif
</div>

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
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
</script>
@endsection
