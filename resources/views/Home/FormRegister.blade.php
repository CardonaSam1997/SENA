@extends('HomeMain')

@section('content')
<style>
    .register-container {
        max-width: 600px;
        margin: 80px auto;
        background: #324E66;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        color: #FFFFFF;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .register-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #F7B919;
        font-weight: 700;
        letter-spacing: 1.2px;
    }
    .form-label {
        color: #FFFFFF;
        font-weight: 600;
    }
    .form-control {
        border-radius: 8px;
        border: 1.5px solid #F7B919;
        background: #FFFFFF;
        color: #000000;
        transition: border-color 0.3s ease;
    }
    .form-control:focus {
        border-color: #F7B919;
        box-shadow: 0 0 8px #F7B919;
        outline: none;
    }
    .btn-register {
        background-color: #F7B919;
        color: #324E66;
        font-weight: 700;
        border-radius: 10px;
        border: none;
        width: 100%;
        padding: 12px;
        font-size: 1.1rem;
        transition: background-color 0.3s ease;
    }
    .btn-register:hover {
        background-color: #e1a50a;
        color: #000000;
    }
    .login-link {
        text-align: center;
        margin-top: 18px;
    }
    .login-link a {
        color: #F7B919;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .login-link a:hover {
        color: #FFFFFF;
        text-decoration: underline;
    }
</style>

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

        <button type="submit" class="btn-register">Registrarme</button>

        <div class="login-link">
            <a href="#">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </form>
</div>
@endsection
