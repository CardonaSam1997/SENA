@extends('general')

@section('content')
<div class="container">
    <h2 class="mb-4">Lista de Tareas</h2>

    <table id="tablaTareas" class="table table-bordered table-striped align-middle text-center">
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
            <!-- Fila 1 -->
            <tr>
                <td>1</td>
                <td>Diseño de Landing Page</td>
                <td>Diseño</td>
                <td>2025-08-15</td>
                <td><span class="badge bg-success">Entregado</span></td>
                <td>
                    <button class="btn btn-warning btn-sm me-1">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>

            <!-- Fila 2 -->
            <tr>
                <td>2</td>
                <td>Desarrollo de API</td>
                <td>Sistemas</td>
                <td>2025-08-20</td>
                <td><span class="badge bg-primary">En Proceso</span></td>
                <td>
                    <button class="btn btn-warning btn-sm me-1">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>

            <!-- Fila 3 -->
            <tr>
                <td>3</td>
                <td>Campaña de Marketing</td>
                <td>Marketing</td>
                <td>2025-08-25</td>
                <td><span class="badge bg-secondary">Iniciado</span></td>
                <td>
                    <button class="btn btn-warning btn-sm me-1">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
             <!-- Fila 1 -->
            <tr>
                <td>1</td>
                <td>Diseño de Landing Page</td>
                <td>Diseño</td>
                <td>2025-08-15</td>
                <td><span class="badge bg-success">Entregado</span></td>
                <td>
                    <button class="btn btn-warning btn-sm me-1">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>

            <!-- Fila 2 -->
            <tr>
                <td>2</td>
                <td>Desarrollo de API</td>
                <td>Sistemas</td>
                <td>2025-08-20</td>
                <td><span class="badge bg-primary">En Proceso</span></td>
                <td>
                    <button class="btn btn-warning btn-sm me-1">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>

            <!-- Fila 3 -->
            <tr>
                <td>3</td>
                <td>Campaña de Marketing</td>
                <td>Marketing</td>
                <td>2025-08-25</td>
                <td><span class="badge bg-secondary">Iniciado</span></td>
                <td>
                    <button class="btn btn-warning btn-sm me-1">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
             <!-- Fila 1 -->
            <tr>
                <td>1</td>
                <td>Diseño de Landing Page</td>
                <td>Diseño</td>
                <td>2025-08-15</td>
                <td><span class="badge bg-success">Entregado</span></td>
                <td>
                    <button class="btn btn-warning btn-sm me-1">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>

            <!-- Fila 2 -->
            <tr>
                <td>2</td>
                <td>Desarrollo de API</td>
                <td>Sistemas</td>
                <td>2025-08-20</td>
                <td><span class="badge bg-primary">En Proceso</span></td>
                <td>
                    <button class="btn btn-warning btn-sm me-1">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>

            <!-- Fila 3 -->
            <tr>
                <td>3</td>
                <td>Campaña de Marketing</td>
                <td>Marketing</td>
                <td>2025-08-25</td>
                <td><span class="badge bg-secondary">Iniciado</span></td>
                <td>
                    <button class="btn btn-warning btn-sm me-1">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>

            <tr>
                <td>4</td>
                <td>Desarrollo de página web corporativa</td>
                <td>Desarrollo web</td>
                <td>2025-10-25</td>
                <td><span class="badge bg-danger">Sin iniciar</span></td>
                <td>
                    <button class="btn btn-warning btn-sm me-1">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- CSS DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- JS DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#tablaTareas').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
</script>
@endsection
