@extends('HomeMain')

@section('content')
<div class="container">

    <h2 class="mb-3">{{ $task->title }}</h2>

    <div class="card mb-3">
        <div class="card-body">

            <p><strong>Área:</strong> {{ $task->area }}</p>
            <p><strong>Estado:</strong> {{ $task->state }}</p>
            <p><strong>Fecha límite:</strong> {{ $task->expiration_date }}</p>
            <p><strong>Pago:</strong> ${{ $task->money }}</p>

            <hr>

            <h5>Descripción</h5>
            <p>{{ $task->content }}</p>

        </div>
    </div>

    <h5>Archivos</h5>

    @if($task->files->isEmpty())
        <div class="alert alert-secondary">
            No hay archivos adjuntos.
        </div>
    @else
        <ul class="list-group">
            @foreach($task->files as $file)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Archivo
                    <a href="{{ asset('storage/'.$file->path) }}" 
                       target="_blank"
                       class="btn btn-sm btn-primary">
                        Ver
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

</div>
@endsection