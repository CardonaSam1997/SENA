@extends('HomeMain')

@section('content')
<div class="container">
    <h4>{{ $notification->data['title'] }}</h4>

    <div class="card">
        <div class="card-body">
            <p><strong>Tarea:</strong> {{ $task->title }}</p>
            <p><strong>Área:</strong> {{ $task->area }}</p>
            <p><strong>Fecha de vencimiento:</strong>
                {{ $task->expiration_date->format('d/m/Y') }}
            </p>
        </div>
    </div>
</div>
@endsection
