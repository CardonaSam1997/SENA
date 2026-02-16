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
                            <a href="{{ route('professional.tasks.show', $task->id) }}"
                                class="btn btn-info btn-sm"
                                title="Ver detalles">
                                <i class="fas fa-eye"></i>
                            </a>

<form action="{{ route('professional.tasks.deliver', $task->id) }}" 
      method="POST" 
      enctype="multipart/form-data"
      class="d-inline">

    @csrf

    <input type="file" 
           name="delivery_file" 
           class="d-none file-input"
           onchange="this.form.submit()"
           accept="application/pdf">

    <button type="button" 
            class="btn btn-success btn-sm"
            onclick="this.closest('form').querySelector('.file-input').click()"
            title="Entregar">
        <i class="fas fa-box"></i>
    </button>
</form>
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
@endsection