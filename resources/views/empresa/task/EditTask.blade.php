@extends('HomeMain')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center text-md-start">Editar tarea</h2>

    <form action="{{ route('company.tasks.update', $task) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-8">
                <label class="form-label">Título</label>
                <input type="text" name="title" class="form-control"
                       value="{{ old('title', $task->title) }}" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Pago (COP)</label>
                <input type="number" name="money" step="0.01" class="form-control"
                       value="{{ old('money', $task->money) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="content" class="form-control" rows="4" required>{{ old('content', $task->content) }}</textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Área</label>
                <select name="area" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="Desarrollo" {{ $task->area === 'Desarrollo' ? 'selected' : '' }}>Desarrollo</option>
                    <option value="Diseño" {{ $task->area === 'Diseño' ? 'selected' : '' }}>Diseño</option>
                    <option value="Marketing" {{ $task->area === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Fecha de vencimiento</label>
                <input type="date" name="expiration_date" class="form-control"
                       value="{{ old('expiration_date', $task->expiration_date) }}" required>
            </div>
        </div>


        @if($task->files->count())
            <div class="mb-3">
                <label class="form-label">Archivos actuales</label>
                <ul class="list-group">
                    @foreach($task->files as $file)
                        <li class="list-group-item">
                            {{ $file->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label">Agregar archivos (PDF)</label>
            <input type="file"
                name="files[]"
                class="form-control"
                accept="application/pdf"
                multiple>
        </div>



        <button type="submit" class="btn btn-primary">
            Guardar cambios
        </button>
    </form>
</div>
@endsection