@extends('PageMain')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ForgotPassword.css') }}">
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h3 class="text-center mb-4">Recuperar Contraseña</h3>
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo" required>
                    </div>                    
                    <div class="mb-3">
                        <label for="nuevaContraseña" class="form-label">Nueva contraseña</label>
                        <input type="password" class="form-control" id="nuevaContraseña" placeholder="Ingresa tu nueva contraseña">
                    </div>
                    <div class="mb-3">
                        <label for="confirmarContraseña" class="form-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="confirmarContraseña" placeholder="Confirma tu nueva contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Restablecer Contraseña</button>
                </form>
                <div class="text-center mt-3">
                    <div class="register-link">
                        <a href="{{ route('iniciarSesion') }}"><small>Volver al inicio de sesión</small></a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection