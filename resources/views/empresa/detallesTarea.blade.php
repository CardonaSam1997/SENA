@extends('general')

@section('content')
<div class="container">
    <h2 class="mb-4">Detalles de la tarea</h2>

    <!-- Información de la tarea -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Información de la tarea
        </div>
        <div class="card-body">
            <h4 class="card-title">Título: Desarrollo de página web corporativa</h4>
            <p><strong>Pago:</strong> $2,500,000 COP</p>
            <p><strong>Área:</strong> Sistemas</p>
            <p><strong>Fecha de vencimiento:</strong> 20/08/2025</p>
            <p><strong>Descripción:</strong> Se requiere el desarrollo de una página web corporativa con diseño responsivo, optimizada para SEO y con integración a un sistema de gestión de contenidos.</p>
            <p><strong>Archivo adjunto:</strong> <a href="#">Requisitos.pdf</a></p>
        </div>
    </div>

    <!-- Postulaciones -->
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Profesionales postulados
        </div>
        <div class="card-body">
            <table id="tablaPostulaciones" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Profesión</th>
                        <th>Calificación</th>
                        <th>Años experiencia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Juan Pérez</td>
                        <td>Desarrollador Full Stack</td>
                        <td>-</td>
                        <td>2 años</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalSugerencia1">
                                <i class="fa-solid fa-eye"></i> Ver sugerencia
                            </button>
                            <button class="btn btn-success btn-sm" onclick="autorizar('Juan Pérez')">
                                <i class="fa-solid fa-check"></i> Autorizar
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>María Gómez</td>
                        <td>Diseñadora UX/UI</td>
                        <td>8</td>
                        <td>6 años</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalSugerencia2">
                                <i class="fa-solid fa-eye"></i> Ver sugerencia
                            </button>
                            <button class="btn btn-success btn-sm" onclick="autorizar('María Gómez')">
                                <i class="fa-solid fa-check"></i> Autorizar
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Sugerencia Juan -->
<div class="modal fade" id="modalSugerencia1" tabindex="-1" aria-labelledby="modalSugerencia1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSugerencia1Label">Sugerencia de Juan Pérez</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        Considero que puedo realizar el proyecto en 15 días utilizando Laravel y Vue.js, con un diseño optimizado para dispositivos móviles.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Sugerencia María -->
<div class="modal fade" id="modalSugerencia2" tabindex="-1" aria-labelledby="modalSugerencia2Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSugerencia2Label">Sugerencia de María Gómez</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        Propongo un rediseño con enfoque minimalista, priorizando la experiencia de usuario y utilizando Figma para la fase de prototipado.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#tablaPostulaciones').DataTable();
    });

    function autorizar(nombre) {
        alert('Has autorizado a ' + nombre + ' para trabajar en esta tarea.');
        // Aquí puedes hacer un fetch/axios POST a Laravel para guardar el cambio
    }
</script>
@endpush
@endsection
