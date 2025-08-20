@extends('HomeMain')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-3">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-key me-2"></i> Cambiar Credenciales</h5>
          </div>
          <div class="card-body">
            
            <form>
              <div class="mb-3">
                <label for="correo" class="form-label"><i class="fas fa-envelope me-2"></i> Correo</label>
                <input type="email" id="correo" class="form-control" placeholder="Ingrese nuevo correo">
              </div>

              <div class="mb-3">
                <label for="password" class="form-label"><i class="fas fa-lock me-2"></i> Contraseña</label>
                <input type="password" id="password" class="form-control" placeholder="Ingrese nueva contraseña">
              </div>

              <div class="mb-3">
                <label for="passwordConfirm" class="form-label"><i class="fas fa-lock me-2"></i> Confirmar contraseña</label>
                <input type="password" id="passwordConfirm" class="form-control" placeholder="Repita la contraseña">
              </div>

              <button type="submit" class="btn btn-success w-100">
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
              <strong><i class="fas fa-id-card me-2 text-primary"></i> Nombre:</strong> Empresa Ejemplo S.A.S
            </div>

            <div class="mb-3">
              <strong><i class="fas fa-hashtag me-2 text-primary"></i> NIT:</strong> 900123456-7
            </div>

            <div class="mb-3">
              <strong><i class="fas fa-map-marker-alt me-2 text-primary"></i> Dirección:</strong> Calle 123 #45-67, Bogotá
            </div>

            <div class="mb-3">
              <strong><i class="fas fa-envelope me-2 text-primary"></i> Correo:</strong> contacto@empresa.com
            </div>

            <div class="mb-3">
              <strong><i class="fas fa-briefcase me-2 text-primary"></i> Tipos de servicio:</strong> 
              Desarrollo de software, Instalación de redes, Soporte técnico
            </div>

            <div class="mb-3">
              <strong><i class="fas fa-calendar-alt me-2 text-primary"></i> Fecha de registro:</strong> 20/08/2025
            </div>

            <div class="mb-3">
              <strong><i class="fas fa-phone me-2 text-primary"></i> Celular:</strong> +57 300 123 4567
            </div>

            <hr>

            <div class="mb-2">
              <strong><i class="fas fa-user me-2 text-primary"></i> Registrado por:</strong> Juan Pérez
            </div>

            <div>
              <strong><i class="fas fa-user-tie me-2 text-primary"></i> Cargo:</strong> Administrador
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection