@extends('HomeMain')

@section('content')
<div class="container my-4">
    <h2 class="mb-4 text-primary fw-bold">📌 Detalles de la tarea</h2>

    <div class="card shadow-lg mb-4">
        <div class="card-header bg-gradient bg-primary text-white fw-bold">
            Información de la tarea
        </div>
        <div class="card-body">
            <h4 class="card-title text-dark mb-3">
                <i class="fa-solid fa-briefcase"></i> Título: Desarrollo de página web corporativa
            </h4>
            <p><strong><i class="fa-solid fa-dollar-sign"></i> Pago:</strong> $2,500,000 COP</p>
            <p><strong><i class="fa-solid fa-building"></i> Área:</strong> Sistemas</p>
            <p><strong><i class="fa-solid fa-calendar"></i> Fecha de vencimiento:</strong> 20/08/2025</p>
            <p><strong><i class="fa-solid fa-file-alt"></i> Descripción:</strong> Se requiere el desarrollo de una página web corporativa con diseño responsivo, optimizada para SEO y con integración a un sistema de gestión de contenidos.</p>
            <p><strong><i class="fa-solid fa-paperclip"></i> Archivo adjunto:</strong> <a href="#">Requisitos.pdf</a></p>
        </div>
    </div>
    
    <div class="card shadow-lg">
        <div class="card-header bg-gradient bg-secondary text-white fw-bold">
            <i class="fa-solid fa-users"></i> Profesionales postulados
        </div>
        <div class="card-body">
            <table id="tablaPostulaciones" class="table table-bordered table-striped align-middle nowrap w-100">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Profesión</th>
                        <th>Calificación</th>
                        <th>Años experiencia</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Juan Pérez</td>
                        <td>Desarrollador Full Stack</td>
                        <td>-</td>
                        <td>2 años</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalSugerencia1">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPerfilJuan">
                                <i class="fa-solid fa-user"></i>
                            </button>
                            <button class="btn btn-success btn-sm" onclick="autorizar('Juan Pérez')">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>María Gómez</td>
                        <td>Diseñadora UX/UI</td>
                        <td>8</td>
                        <td>6 años</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalSugerencia2">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPerfilMaria">
                                <i class="fa-solid fa-user"></i>
                            </button>
                            <button class="btn btn-success btn-sm" onclick="autorizar('María Gómez')">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODALES (dejamos dentro para evitar errores) --}}
<div class="modal fade" id="modalSugerencia1" tabindex="-1" aria-labelledby="modalSugerencia1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalSugerencia1Label">💡 Sugerencia de Juan Pérez</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
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

<div class="modal fade" id="modalSugerencia2" tabindex="-1" aria-labelledby="modalSugerencia2Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalSugerencia2Label">💡 Sugerencia de María Gómez</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
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

<div class="modal fade" id="modalPerfilJuan" tabindex="-1" aria-labelledby="modalPerfilJuanLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalPerfilJuanLabel">👤 Perfil de Juan Pérez</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p><strong>Profesión:</strong> Desarrollador Full Stack</p>
        <p><strong>Experiencia:</strong> 2 años en desarrollo web con Laravel, Vue.js y MySQL</p>
        <p><strong>Portafolio:</strong> <a href="{{route('profesionales.index', 1)}}" target="_blank">Ver portafolio</a></p>
        <p><strong>Descripción:</strong> Apasionado por crear soluciones digitales escalables y eficientes, con un enfoque en la experiencia de usuario.</p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalPerfilMaria" tabindex="-1" aria-labelledby="modalPerfilMariaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalPerfilMariaLabel">👤 Perfil de María Gómez</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p><strong>Profesión:</strong> Diseñadora UX/UI</p>
        <p><strong>Experiencia:</strong> 6 años en diseño de interfaces y experiencia de usuario</p>
        <p><strong>Portafolio:</strong> <a href="{{route('profesionales.index', 1)}}" target="_blank">Ver portafolio</a></p>
        <p><strong>Descripción:</strong> Creativa y meticulosa, enfocada en optimizar la interacción entre usuario y producto digital.</p>
      </div>
    </div>
  </div>
</div>

{{-- DataTables Responsive --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tablaPostulaciones').DataTable({
            responsive: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            },
            pageLength: 5
        });
    });

    function autorizar(nombre) {
        Swal.fire({
            icon: 'success',
            title: 'Autorizado',
            text: 'Has autorizado a ' + nombre + ' para trabajar en esta tarea.',
            confirmButtonColor: '#198754'
        });
    }
</script>
@endsection
