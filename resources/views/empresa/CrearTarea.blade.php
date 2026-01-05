@extends('HomeMain')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center text-md-start">Publicar nueva tarea</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf        
        <div class="row mb-3">
            <div class="col-12 col-md-8 mb-3 mb-md-0">
                <label for="titulo" class="form-label">Título de la tarea</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}" required>
            </div>
            <div class="col-12 col-md-4">
                <label for="pago" class="form-label">Pago (COP)</label>
                <input type="number" name="pago" id="pago" class="form-control" step="0.01" value="{{ old('pago') }}" required>
            </div>
        </div>        
        <div class="mb-3">
            <label for="contenido" class="form-label">Descripción</label>
            <textarea name="contenido" id="contenido" class="form-control" rows="4" required>{{ old('contenido') }}</textarea>
        </div>        
        <div class="row mb-3">
            <div class="col-12 col-md-6 mb-3 mb-md-0">
                <label for="area" class="form-label">Área</label>
                <select name="area" id="area" class="form-select" required>
                    <option value="">Seleccione un área</option>
                    <option value="Desarrollo">Desarrollo</option>
                    <option value="Diseño">Diseño</option>
                    <option value="Marketing">Marketing</option>
                </select>
            </div>
            <div class="col-12 col-md-6">
                <label for="fecha_vencimiento" class="form-label">Fecha de vencimiento</label>
                <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" value="{{ old('fecha_vencimiento') }}" required>
            </div>
        </div>        
        <div class="row mb-3">
            <div class="col-12 col-md-6 mb-3 mb-md-0">
                <label for="area_trabajo" class="form-label">Área de trabajo</label>
                <select name="area_trabajo" id="area_trabajo" class="form-select" required>
                    <option value="">Seleccione área de trabajo</option>
                    <option value="Sistemas">Sistemas</option>
                    <option value="Recursos Humanos">Recursos Humanos</option>
                    <option value="Redes Sociales">Redes Sociales</option>
                    <option value="Administración">Administración</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="col-12 col-md-6">
                <label for="archivo" class="form-label">Archivo PDF</label>
                <input type="file" name="archivo" id="archivo" class="form-control" accept="application/pdf">
            </div>
        </div>        
        <div class="d-grid d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary w-100 w-md-auto">
                Publicar tarea
            </button>
        </div>
    </form>
</div>
@endsection
