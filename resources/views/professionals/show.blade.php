@extends('HomeMain')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Perfil del profesional</h5>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Nombre:</div>
                        <div class="col-md-8">
                            {{ $professional->name }} {{ $professional->last_name }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Correo:</div>
                        <div class="col-md-8">
                            {{ $professional->email }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Experiencia:</div>
                        <div class="col-md-8">
                            {{ $professional->experience }} años
                        </div>
                    </div>

                  

                    @if(!empty($professional->description))
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Descripción:</div>
                        <div class="col-md-8">
                            {{ $professional->description }}
                        </div>
                    </div>
                    @endif
                </div>

                <div class="card-footer text-end">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                        Volver
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection