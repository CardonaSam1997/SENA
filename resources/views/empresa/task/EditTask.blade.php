@extends('HomeMain')

@section('content')
<div class="container">
    <h2 class="mb-4 text-primary fw-bold">Editar información</h2>

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

    @if($task->files->count())
    <br>    
    <label class="form-label">Archivos actuales</label>
    <hr>
        <div class="mb-3">
            <ul class="list-group">
                @foreach($task->files as $file)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ asset('storage/'.$file->path) }}" target="_blank">
                            {{ basename($file->path) }}
                        </a>
                        <button
                            type="button"
                            class="btn btn-sm btn-danger"
                            onclick="confirmDelete({{ $file->id }})">
                            ✕
                        </button>
                        <form id="delete-file-{{ $file->id }}"
                            action="{{ route('company.tasks.files.destroy', $file) }}"
                            method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>        
        <hr>
    @endif
</div>




<script>
    function confirmDelete(fileId) {
        Swal.fire({
            title: '¿Eliminar archivo?',
            text: 'Este archivo se eliminará permanentemente.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-file-' + fileId).submit();
            }
        });
    }
</script>


@endsection