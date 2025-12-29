@extends('HomeMain')

@section('content')
<div class="container-fluid px-2 px-md-4">
    <h2 class="mb-4 text-center text-md-start">Lista de Tareas</h2>

    <div class="table-responsive">
        <table id="tablaTareas" class="table table-bordered table-striped align-middle text-center w-100">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Área</th>
                    <th>Fecha Vencimiento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>            
                <tr>
                    <td>1</td>
                    <td>Diseño de Landing Page</td>
                    <td>Diseño</td>
                    <td>2025-08-15</td>
                    <td><span class="badge bg-danger">Sin iniciar</span></td>
                    <td>
                        <a href="{{ route('bussines.detalles') }}" class="btn btn-warning btn-sm me-1">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>            
                <tr>
                    <td>2</td>
                    <td>Desarrollo de API</td>
                    <td>Sistemas</td>
                    <td>2025-08-20</td>
                    <td><span class="badge bg-primary">En Proceso</span></td>
                    <td>
                        <a href="{{ route('bussines.detalles') }}" class="btn btn-warning btn-sm me-1">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Campaña de Marketing</td>
                    <td>Marketing</td>
                    <td>2025-08-25</td>                
                    <td><span class="badge bg-danger">Sin iniciar</span></td>
                    <td>
                        <a href="{{ route('bussines.detalles') }}" class="btn btn-warning btn-sm me-1">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>             
                <tr>
                    <td>4</td>
                    <td>Diseño de Landing Page</td>
                    <td>Diseño</td>
                    <td>2025-08-15</td>
                    <td><span class="badge bg-success">Entregado</span></td>
                    <td>
                        <a href="{{ route('bussines.profesional.show', ['id' => 1]) }}" class="btn btn-warning btn-sm me-1">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Desarrollo de API</td>
                    <td>Sistemas</td>
                    <td>2025-08-20</td>
                    <td><span class="badge bg-primary">En Proceso</span></td>
                    <td>
                        <a href="{{ route('bussines.detalles') }}" class="btn btn-warning btn-sm me-1">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>                       
            </tbody>
        </table>
    </div>
</div>

<style>
@media (max-width: 576px) {
    .btn-sm {
        padding: 0.5rem 0.7rem;
        font-size: 0.9rem;
    }
    #tablaTareas th, #tablaTareas td {
        white-space: nowrap;
        font-size: 0.85rem;
    }
}
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#tablaTareas').DataTable({
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
</script>
@endsection
