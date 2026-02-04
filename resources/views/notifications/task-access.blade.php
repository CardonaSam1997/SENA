@extends('HomeMain')

@section('content')

<div class="container">
    <h4>{{ $task->title }}</h4>

    <table class="table">
        <thead>
            <tr>
                <th>Profesional</th>
                <th>Experiencia</th>
                <th>Sugerencia</th>                
                <th>Autorizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $app)
                <tr>
                    <td>{{ $app->professional->name }} {{ $app->professional->last_name }}</td>
                    <td>{{ $app->professional->experience }} años</td>
                    @if($app->suggestion)
                    <td>Mensaje por leer</td>
                    @else
                    <td>N/A</td>
                    @endif
                    <td>
                        {{ $app->authorization ? 'Sí' : 'No' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection