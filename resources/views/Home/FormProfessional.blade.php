@extends('PageMain')

@section('styles')        
    <link rel="stylesheet" href="{{ asset('css/FormProfessional.css') }}">
@endsection

@section('content')
<div class="form-container">
    <h2>Registro Profesional</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.professional.store', ['user' => $user->id]) }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input 
                    type="text" 
                    class="form-control @error('document') is-invalid @enderror" 
                    id="cedula"
                    name="document"
                    value="{{ old('document') }}" 
                    placeholder="Ingrese su cédula" 
                    >
                @error('document')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="nombre"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Ingrese su nombre"
                    >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input 
                    type="text"
                    class="form-control @error('last_name') is-invalid @enderror" 
                    id="apellido"
                    name="last_name"
                    value="{{ old('last_name') }}"
                    placeholder="Ingrese su apellido"
                    >
                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Género</label>
                <select name="gender"class="form-select @error('gender') is-invalid @enderror">
                    <option value="">Seleccione</option>
                    <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Femenino</option>                        
                </select>
                @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-4 mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" 
                       id="direccion" name="address" value="{{ old('address') }}"
                       placeholder="Ej: CL 123 #45-67" >
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>           
        </div>

        <div class="row">

            <div class="col-md-6  mb-3">
                <label class="form-label">Formación académica</label>
                <input type="text"
                    name="academic_education"
                    class="form-control @error('academic_education') is-invalid @enderror"
                    value="{{ old('academic_education') }}"
                    placeholder="Ej: Ingeniero de Software, Técnico en Sistemas"
                    >
                @error('academic_education')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="especializacion" class="form-label">Especialización</label>
                <select class="form-select @error('service_type') is-invalid @enderror" 
                        id="especializacion" name="service_type" >
                    <option value="">Seleccione su especialización</option>
                    <option value="software" {{ old('service_type') == 'software' ? 'selected' : '' }}>Desarrollo de Software</option>
                    <option value="network" {{ old('service_type') == 'network' ? 'selected' : '' }}>Redes y Telecomunicaciones</option>
                    <option value="support" {{ old('service_type') == 'support' ? 'selected' : '' }}>Soporte Técnico</option>
                    <option value="design" {{ old('service_type') == 'design' ? 'selected' : '' }}>Diseño Gráfico</option>
                    <option value="others" {{ old('service_type') == 'others' ? 'selected' : '' }}>Otros</option>
                </select>
                @error('service_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control @error('birth_date') is-invalid @enderror" 
                    id="fecha_nacimiento" name="birth_date" value="{{ old('birth_date') }}">
                @error('birth_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2 mb-3">
                <label class="form-label">Edad</label>
                <input type="number"
                    name="age"
                    min="0"
                    class="form-control @error('age') is-invalid @enderror"
                    value="{{ old('age') }}">
                @error('age')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-4 mb-3">
                <label for="experiencia" class="form-label">Años de experiencia</label>
                <input type="number" class="form-control @error('experience') is-invalid @enderror" 
                    id="experiencia" name="experience" value="{{ old('experience') }}" min="0"
                    placeholder="Ingrese años de experiencia" >
                @error('experience')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="descripcion" name="description" rows="3" placeholder="Cuéntanos sobre tu experiencia..." >{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>            

            <div class="col-md-6 mb-3">
                <label for="hoja_vida" class="form-label">Subir hoja de vida</label>
                <input type="file" class="form-control @error('curriculum') is-invalid @enderror" 
                       id="hoja_vida" name="curriculum" accept=".pdf">
                @error('curriculum')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
        </div>
        <button type="submit" class="btn-submit">Registrarme</button>         
    </form>
</div>
@endsection