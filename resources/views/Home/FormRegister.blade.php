@extends('PageMain')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/FormRegister.css') }}">
@endsection

@section('content')
<div class="register-container shadow">
    <h2>Registrarse</h2>
    <form method="POST" action="">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="username" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="username" name="username" 
                       value="{{ old('username') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="{{ old('email') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label">Repetir contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" 
                       name="password_confirmation" required>
            </div>
        </div>

        <!-- <button type="submit" class="btn-register">Registrarme</button> -->
        <a href="{{ route('rol') }}"  class="btn-register d-block text-center " >Registrarme</a>

        <div class="login-link">
            <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </form>
</div>
@endsection
