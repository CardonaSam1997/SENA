@extends('PageMain')


@section('styles')        
    <link rel="stylesheet" href="{{ asset('css/FormBussines.css') }}">
@endsection

@section('content')       
<div class="form-container">
    <h2>Registro Empresa</h2>
    <form method="POST" action="{{ route('register.company.store', ['user' => $user->id]) }}">
        @csrf
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nit" class="form-label">NIT</label>
                <input type="text" class="form-control" id="nit" name="nit" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Nombre Empresa</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="address" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="service_type" class="form-label">Tipo de Servicio</label>
                <select class="form-select" id="service_type" name="service_type" required>
                    <option value="">Seleccione un tipo de servicio</option>
                    <option value="tecnologia">Tecnología</option>
                    <option value="construccion">Construcción</option>
                    <option value="marketing">Marketing</option>
                    <option value="recursos_humanos">Recursos Humanos</option>
                    <option value="otros">Otros</option>
                </select>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="web" class="form-label">Página Web</label>
                <input type="url" class="form-control" id="web" name="web" placeholder="https://" required>
            </div>
            <div class="col-md-6 mb-3">
            </div>
        </div>
        <button type="submit" class="btn-submit">Registrar Empresa</button>        
    </form>
</div>
@endsection