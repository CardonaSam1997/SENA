@extends('HomeMain')

@section('content')
<div class="container">
    <h2 class="mb-4">Gestión de Usuarios</h2>

    <table id="tablaUsuarios" class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>            
            <tr>
                <td>1</td>
                <td>Juan Pérez</td>
                <td>juanperez@example.com</td>
                <td><span class="badge bg-warning">Pendiente</span></td>
                <td>
                    <button class="btn btn-primary btn-sm verDetalles" 
                            data-id="1" 
                            data-nombre="Juan Pérez" 
                            data-correo="juanperez@example.com"
                            data-img="/uploads/verificaciones/juan.jpg">
                        <i class="fas fa-eye"></i> Revisar
                    </button>
                    <button class="btn btn-danger btn-sm btnBloquear"
                            data-id="1"
                            data-nombre="Juan Pérez">
                        <i class="fas fa-ban"></i> Bloquear
                    </button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>María Gómez</td>
                <td>maria.gomez@example.com</td>
                <td><span class="badge bg-success">Verificado</span></td>
                <td>
                    <button class="btn btn-primary btn-sm verDetalles" 
                            data-id="2" 
                            data-nombre="María Gómez" 
                            data-correo="maria.gomez@example.com"
                            data-img="/uploads/verificaciones/maria.jpg">
                        <i class="fas fa-eye"></i> Revisar
                    </button>
                    <button class="btn btn-danger btn-sm btnBloquear"
                            data-id="2"
                            data-nombre="María Gómez">
                        <i class="fas fa-ban"></i> Bloquear
                    </button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Carlos López</td>
                <td>carlos.lopez@example.com</td>
                <td><span class="badge bg-danger">Bloqueado</span></td>
                <td>
                    <button class="btn btn-primary btn-sm verDetalles" 
                            data-id="3" 
                            data-nombre="Carlos López" 
                            data-correo="carlos.lopez@example.com"
                            data-img="/uploads/verificaciones/carlos.jpg">
                        <i class="fas fa-eye"></i> Revisar
                    </button>
                    <button class="btn btn-danger btn-sm btnBloquear"
                            data-id="3"
                            data-nombre="Carlos López">
                        <i class="fas fa-ban"></i> Bloquear
                    </button>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Ana Torres</td>
                <td>ana.torres@example.com</td>
                <td><span class="badge bg-warning">Pendiente</span></td>
                <td>
                    <button class="btn btn-primary btn-sm verDetalles" 
                            data-id="4" 
                            data-nombre="Ana Torres" 
                            data-correo="ana.torres@example.com"
                            data-img="/uploads/verificaciones/ana.jpg">
                        <i class="fas fa-eye"></i> Revisar
                    </button>
                    <button class="btn btn-danger btn-sm btnBloquear"
                            data-id="4"
                            data-nombre="Ana Torres">
                        <i class="fas fa-ban"></i> Bloquear
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal Revisar -->
<div class="modal fade" id="modalVerificacion" tabindex="-1" aria-labelledby="modalVerificacionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalVerificacionLabel">Detalles del Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body text-center">
        <img id="modalImagen" src="" class="img-fluid mb-3" alt="Imagen de verificación">
        <p><strong>Nombre:</strong> <span id="modalNombre"></span></p>
        <p><strong>Correo:</strong> <span id="modalCorreo"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Marcar como Verificado</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Bloquear -->
<div class="modal fade" id="modalBloquear" tabindex="-1" aria-labelledby="modalBloquearLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modalBloquearLabel">Bloquear Usuario</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <p>¿Seguro que deseas bloquear a <strong id="modalNombreBloquear"></strong>?</p>
        <input type="hidden" id="modalIdBloquear">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger">Sí, Bloquear</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    $('#tablaUsuarios').DataTable({
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });

    // Evento Revisar
    $(document).on('click', '.verDetalles', function () {
        let nombre = $(this).data('nombre');
        let correo = $(this).data('correo');
        let img = $(this).data('img');

        $('#modalNombre').text(nombre);
        $('#modalCorreo').text(correo);
        $('#modalImagen').attr('src', img);

        $('#modalVerificacion').modal('show');
    });

    // Evento Bloquear
    $(document).on('click', '.btnBloquear', function () {
        let id = $(this).data('id');
        let nombre = $(this).data('nombre');

        $('#modalIdBloquear').val(id);
        $('#modalNombreBloquear').text(nombre);

        $('#modalBloquear').modal('show');
    });
});
</script>
@endsection
