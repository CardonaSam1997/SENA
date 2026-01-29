@extends('PageMain')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ForgotPassword.css') }}">
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">

                <h3 class="text-center mb-4">Restablecer Contraseña</h3>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    {{-- Token --}}
                    <input type="hidden" name="token" value="{{ $token }}">

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control"
                            required
                        >
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nueva contraseña --}}
                    <div class="mb-3">
                        <label class="form-label">Nueva contraseña</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required
                        >
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Confirmación --}}
                    <div class="mb-3">
                        <label class="form-label">Confirmar contraseña</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Restablecer contraseña
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection