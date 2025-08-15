@extends('PageMain')


@section('styles')    
    
    <link rel="stylesheet" href="{{ asset('css/FormProfessional.css') }}">
@endsection

@section('content')
<div class="form-container">
    <h2>Registro Profesional</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <!-- Fila 1 -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
        </div>

        <!-- Fila 2 -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="tel" class="form-control" id="celular" name="celular" required>
            </div>
        </div>

        <!-- Fila 3 -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="especializacion" class="form-label">Especialización</label>
                <select class="form-select" id="especializacion" name="especializacion" required>
                    <option value="">Seleccione su especialización</option>
                    <option value="software">Desarrollo de Software</option>
                    <option value="redes">Redes y Telecomunicaciones</option>
                    <option value="soporte">Soporte Técnico</option>
                    <option value="diseño">Diseño Gráfico</option>
                    <option value="otros">Otros</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
        </div>

        <!-- Descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Cuéntanos sobre tu experiencia..." required></textarea>
        </div>

        <!-- Hoja de vida -->
        <div class="mb-3">
            <label for="hoja_vida" class="form-label">Subir hoja de vida</label>
            <input type="file" class="form-control" id="hoja_vida" name="hoja_vida" accept=".pdf,.doc,.docx" required>
        </div>

        <!-- Botón -->
        <button type="submit" class="btn-submit">Registrarme</button>
    </form>
</div>
@endsection