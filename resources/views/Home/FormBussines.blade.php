@extends('PageMain')


@section('styles')        
    <link rel="stylesheet" href="{{ asset('css/FormBussines.css') }}">
@endsection

@section('content')       
<div class="form-container">
    <h2>Registro Empresa</h2>
    <form method="POST" action="">

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nit" class="form-label">NIT</label>
                <input type="text" class="form-control" id="nit" name="nit" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nombreEmpresa" class="form-label">Nombre Empresa</label>
                <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" required>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="tipoServicio" class="form-label">Tipo de Servicio</label>
                <select class="form-select" id="tipoServicio" name="tipoServicio" required>
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
                <label for="paginaWeb" class="form-label">Página Web</label>
                <input type="url" class="form-control" id="paginaWeb" name="paginaWeb" placeholder="https://" required>
            </div>
            <div class="col-md-6 mb-3">
            </div>
        </div>

        <!-- <button type="submit" class="btn-submit">Registrar Empresa</button> -->
        <a href="{{ route('bussines.create') }}"  class="btn-register d-block text-center " >Registrar empresa</a>

    </form>
</div>
@endsection