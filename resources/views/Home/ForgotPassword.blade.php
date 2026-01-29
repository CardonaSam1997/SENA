@extends('PageMain')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ForgotPassword.css') }}">
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                @if (session('status'))
    <div class="alert alert-success mt-3">
        {{ session('status') }}
    </div>
@endif
                <h3 class="text-center mb-4">Recuperar Contraseña</h3>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    @error('email')
    <div class="text-danger mt-1">
        {{ $message }}
    </div>
@enderror
                    <button type="submit" class="btn btn-primary w-100">
                        Enviar enlace de recuperación
                    </button>
                </form>
                <div class="text-center mt-3">
                    <div class="register-link">
                        <a href="{{ route('login') }}"><small>Volver al inicio de sesión</small></a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection