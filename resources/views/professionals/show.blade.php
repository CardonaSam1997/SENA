@extends('HomeMain')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/ViewDetails.css') }}">
@endsection

@section('content')
<div class="container py-4">
    <div class="row">
        <h2 class="mb-4 text-primary fw-bold">👤 Detalles del perfil</h2>

        {{-- COLUMNA IZQUIERDA --}}
        <div class="col-lg-4">
            <div class="card shadow-sm p-3 mb-4">
                <div class="text-center">

                    <img src="{{ $professional->document_photo 
                                ? asset('storage/'.$professional->document_photo) 
                                : asset('images/profesional.png') }}"
                         class="rounded-circle mb-3"
                         alt="Foto Profesional"
                         style="width:200px;height:200px;object-fit:cover;">

                    <h4>{{ $professional->name }} {{ $professional->last_name }}</h4>

                    <p class="text-muted">
                        {{ $professional->service_type ?? 'Sin especialidad registrada' }}
                    </p>

                </div>

                <hr>

                <p>
                    <strong>Años de experiencia:</strong>
                    {{ $professional->experience ?? 'No definido' }}
                </p>

                <p>
                    <strong>Lugar de residencia:</strong>
                    {{ $professional->address }}
                </p>

                <p>
                    <strong>Correo:</strong>
                    {{ $user->email }}
                </p>

                <p>
                    <strong>Hoja de vida:</strong>
                    @if($professional->curriculum)
                        <a href="{{ asset('storage/'.$professional->curriculum) }}" target="_blank">
                            Descargar
                        </a>
                    @else
                        No disponible
                    @endif
                </p>
            </div>
        </div>

        {{-- COLUMNA DERECHA --}}
        <div class="col-lg-8">

            {{-- DESCRIPCIÓN --}}
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="mb-3">Descripción</h5>
                <p>
                    {{ $professional->description ?? 'Sin descripción registrada.' }}
                </p>
            </div>

            <hr>

            {{-- FORMULARIO ACTUALIZACIÓN --}}
            <div class="card shadow-sm p-3">
                <h5 class="mb-3">Actualizar información</h5>

                <form method="POST"
                      action="{{ route('professional.profile.update') }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Documento</label>
                        <input type="text"
                               class="form-control"
                               value="{{ $professional->document }}"
                               disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text"
                               class="form-control"
                               name="name"
                               value="{{ $professional->name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Apellido</label>
                        <input type="text"
                               class="form-control"
                               name="last_name"
                               value="{{ $professional->last_name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha de nacimiento</label>
                        <input type="date"
                               class="form-control"
                               value="{{ $professional->birth_date }}"
                               disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dirección</label>
                        <input type="text"
                               class="form-control"
                               name="address"
                               value="{{ $professional->address }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email"
                               class="form-control"
                               name="email"
                               value="{{ $user->email }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Área de trabajo</label>
                        <input type="text"
                               class="form-control"
                               name="service_type"
                               value="{{ $professional->service_type }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control"
                                  name="description"
                                  rows="3">{{ $professional->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Actualizar hoja de vida</label>
                        <input type="file"
                               class="form-control"
                               name="curriculum"
                               accept=".pdf,.doc,.docx">
                    </div>
                
                    <button type="submit" class="btn btn-primary">
                        Guardar cambios
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: "{{ session('success') }}",
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Aceptar'
    });
});
</script>
@endif