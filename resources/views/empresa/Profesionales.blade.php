@extends('HomeMain')
@section('content')
<div class="container mt-4">
    <h2>Profesionales con tareas finalizadas</h2>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Profesional</th>
                <th>Tareas Finalizadas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Juan Pérez</td>
                <td>3</td>
                <td>
                    <a href="/profesionales/1" class="btn btn-info btn-sm">Ver detalles</a>
                </td>
            </tr>
            <tr>
                <td>María Gómez</td>
                <td>5</td>
                <td>
                    <a href="/profesionales/2" class="btn btn-info btn-sm">Ver detalles</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
