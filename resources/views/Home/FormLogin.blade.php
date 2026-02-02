@extends('PageMain')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/FormLogin.css') }}">
@endsection

@section('content')

<div class="container d-flex justify-content-center">
    <div class="w-100" style="max-width: 420px;">

        @error('email')
            <div class="alert alert-danger text-center mb-3" role="alert">
                {{ $message }}
            </div>
        @enderror

        <div class="login-container shadow">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        required
                    >
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Recordarme</label>
                </div>

                <button type="submit" class="btn-login w-100">
                    Ingresar
                </button>

                <div class="register-link text-center mt-3">
                    <a href="{{ route('registro') }}">¿No tienes cuenta? Regístrate</a>
                    <br>
                    <a href="{{ route('password.request') }}">
                        <small>¿Olvidaste tu contraseña?</small>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
