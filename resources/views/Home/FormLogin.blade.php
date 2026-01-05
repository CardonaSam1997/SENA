@extends('PageMain')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/FormLogin.css') }}">
@endsection

@section('content')
<div class="login-container shadow">
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="{{ route('sign-up') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" 
                   value="{{ old('email') }}" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Recordarme</label>
        </div>

        <button type="submit" class="btn-login">Ingresar</button>

        <div class="register-link">
            <a href="{{ route('registro') }}">¿No tienes cuenta? Regístrate</a>
            <br>
            <a href="{{ route('password.request') }}"><small>¿Olvidaste tu contraseña?</small></a>
        </div>
    </form>
</div>
@endsection
