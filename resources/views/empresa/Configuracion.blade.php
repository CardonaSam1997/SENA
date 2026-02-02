@extends('HomeMain')

@section('content')
<div class="container py-5">
   <div class="row justify-content-center">
    <h2 class="mb-4 text-primary fw-bold"><i class="fa-solid fa-circle-user"></i>Detalles del usuario</h2>

    {{-- Cambiar credenciales --}}  
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0"><i class="fas fa-key me-2"></i> Cambiar Credenciales</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('user.change-password') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Contraseña actual</label>
                <input type="password" name="current_password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nueva contraseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Confirmar nueva contraseña</label>
              <input type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="form-control"
                    required>
              <div class="invalid-feedback">
                  Las contraseñas no coinciden.
              </div>
            </div>

            <button type="submit" id="btn-submit-password" class="btn btn-success w-100">
              <i class="fas fa-save me-2"></i> Guardar cambios
            </button>
          </form>
        </div>
      </div>
    </div>
      
      <div class="col-md-8 mb-4">
        <div class="card shadow-sm border-0 rounded-3">
          <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-building me-2"></i> Datos de la Empresa</h5>
            <button class="btn btn-light btn-sm">
              <i class="fas fa-edit me-1"></i> Editar
            </button>
          </div>
          <div class="card-body">

            <div class="mb-3">
              <strong><i class="fas fa-id-card me-2 text-primary"></i> Nombre:</strong> {{ $company->name }}
            </div>

            <div class="mb-3">
              <strong><i class="fas fa-hashtag me-2 text-primary"></i> NIT:</strong> {{ $company->nit }}
            </div>

            <div class="mb-3">
              <strong><i class="fas fa-map-marker-alt me-2 text-primary"></i> Dirección:</strong> {{ $company->address }}
            </div>

            <div class="mb-3">
              <strong><i class="fas fa-envelope me-2 text-primary"></i> Correo:</strong> {{ $company->user->email }}
            </div>

            <div class="mb-3">
              <strong><i class="fas fa-briefcase me-2 text-primary"></i> Tipos de servicio:</strong> {{ $company->service_type }}              
            </div>

            <div class="mb-3">
              <strong><i class="fas fa-calendar-alt me-2 text-primary"></i> Fecha de registro:</strong> {{ optional($company->created_at)->format('d/m/Y') ?? 'No disponible' }}
            </div>

            <hr>

            <div class="mb-2">
              <strong><i class="fas fa-user me-2 text-primary"></i> Registrado por:</strong> {{ $company->user->username }}
            </div>

            <div>
              <strong><i class="fas fa-user-tie me-2 text-primary"></i> Cargo:</strong> {{ ucfirst($company->user->role) }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form[action="{{ route('user.change-password') }}"]');
    const password = document.getElementById('password');
    const confirmation = document.getElementById('password_confirmation');
    const submitBtn = document.getElementById('btn-submit-password');

    function validatePasswords() {
        if (!password.value || !confirmation.value) {
            submitBtn.disabled = true;
            return;
        }

        if (password.value !== confirmation.value) {
            confirmation.classList.add('is-invalid');
            submitBtn.disabled = true;
        } else {
            confirmation.classList.remove('is-invalid');
            submitBtn.disabled = false;
        }
    }

    password.addEventListener('input', validatePasswords);
    confirmation.addEventListener('input', validatePasswords);

    form.addEventListener('submit', function (e) {
        if (submitBtn.disabled) {
            e.preventDefault();
        }
    });

    submitBtn.disabled = true;
});
</script>


  @if ($errors->any())
    <script>
      
      document.addEventListener('DOMContentLoaded', function () {
          Swal.fire({
              icon: 'error',
              title: 'Error',
              html: `{!! implode('<br>', $errors->all()) !!}`,
              confirmButtonColor: '#dc3545',
              confirmButtonText: 'Entendido'
          });
      });
    </script>
  @endif

  @if(session('password_changed'))
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          Swal.fire({
              icon: 'success',
              title: 'Contraseña actualizada',
              text: 'Tu contraseña se cambió correctamente.',
              confirmButtonColor: '#198754',
              confirmButtonText: 'Perfecto'
          });
      });
    </script>
  @endif


@endsection