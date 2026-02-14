@extends('HomeMain')

@section('content')
<div class="container">
    <h4 class="mb-3">{{ $task->title }}</h4>

    <table class="table table-striped align-middle">
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
                <td>
                    {{ $app->professional->name }}
                    {{ $app->professional->last_name }}
                </td>

                <td>{{ $app->professional->experience }} años</td>

                <td>
                    @if($app->suggestion)
                        <button
                            class="btn btn-sm btn-outline-info"
                            data-bs-toggle="modal"
                            data-bs-target="#commentModal{{ $app->professional_id }}">
                            Ver comentario
                        </button>
                    @else
                        N/A
                    @endif
                </td>

                <td>
                    @if($app->authorization)
                        <span class="badge bg-success">Sí</span>
                    @else
                        <span class="badge bg-secondary">No</span>
                    @endif
                </td>

                <td class="d-flex gap-1">
                    {{-- Autorizar --}}
                    @if(!$app->authorization)
                        <form method="POST"
                                action="{{ route('company.apply-tasks.authorize', [$task, $app->professional]) }}">
                            @csrf
                            <button class="btn btn-sm btn-success">
                                Autorizar
                            </button>
                        </form>
                    @endif

                    {{-- Ver perfil --}}
                    <a href="{{ route('company.professionals.show', $app->professional) }}"
                       class="btn btn-sm btn-primary">
                        Perfil
                    </a>
                </td>
            </tr>

            {{-- MODAL COMENTARIO --}}
            @if($app->suggestion)
            <div class="modal fade"
                 id="commentModal{{ $app->professional_id }}"
                 tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                Comentario del profesional
                            </h5>
                            <button type="button" class="btn-close"
                                data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>{{ $app->suggestion }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        @endforeach
        </tbody>
    </table>
</div>

@if(session('authorized'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Profesional autorizado',
    text: 'El profesional fue autorizado correctamente',
});
</script>
@endif

@endsection