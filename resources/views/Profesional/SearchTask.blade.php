@extends('HomeMain')

@section('styles')
<style>
  .card-custom {
    background: #fff;
    border-radius: 12px;
    padding: 15px;
    margin-bottom: 15px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    cursor: pointer;
    transition: transform 0.2s;
  }
  .card-custom:hover {
    transform: translateY(-3px);
  }
  .section-title {
    font-weight: 600;
    margin-bottom: 10px;
    font-size: 1.1rem;
  }
  .filter-box {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 12px;
    margin-bottom: 20px;
  }
  @media (max-width: 768px) {
    .filter-box {
      margin-bottom: 25px;
    }
  }
</style>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row mt-3">

    <!-- Filtros -->
    <div class="col-12 col-md-3">
      <div class="filter-box">
        <div class="section-title">Filtros tareas</div>
        <form>
          <div class="mb-3">
            <label class="form-label">Área:</label>
            <input type="text" class="form-control mb-2" placeholder="Buscar">

            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="sistemas">
              <label class="form-check-label" for="sistemas">Sistemas</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="diseno">
              <label class="form-check-label" for="diseno">Diseño</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="marketing">
              <label class="form-check-label" for="marketing">Marketing</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="administracion">
              <label class="form-check-label" for="administracion">Administración</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="finanzas">
              <label class="form-check-label" for="finanzas">Finanzas</label>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Fecha publicación:</label><br>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="hoy">
              <label class="form-check-label" for="hoy">Hoy</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="semana">
              <label class="form-check-label" for="semana">Última semana</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="mes">
              <label class="form-check-label" for="mes">Último mes</label>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Tareas disponibles -->
    <div class="col-12 col-md-9">
      <div class="section-title">Tareas disponibles</div>
      
      <!-- Card ejemplo -->
      <div class="card-custom" data-bs-toggle="modal" data-bs-target="#taskModal1">
        <div class="mb-2 bg-secondary text-white text-center rounded" style="height:80px;">Imagen</div>
        <h6>Título de la tarea</h6>
        <p>Sector: Diseño <br> Valor ofrecido: $200.000</p>
      </div>

      <div class="card-custom" data-bs-toggle="modal" data-bs-target="#taskModal1">
        <div class="mb-2 bg-secondary text-white text-center rounded" style="height:80px;">Imagen</div>
        <h6>Otra tarea</h6>
        <p>Sector: Sistemas <br> Valor ofrecido: $350.000</p>
      </div>

      <div class="card-custom" data-bs-toggle="modal" data-bs-target="#taskModal1">
        <div class="mb-2 bg-secondary text-white text-center rounded" style="height:80px;">Imagen</div>
        <h6>Otra tarea</h6>
        <p>Sector: Sistemas <br> Valor ofrecido: $350.000</p>
      </div>

      <div class="card-custom" data-bs-toggle="modal" data-bs-target="#taskModal1">
        <div class="mb-2 bg-secondary text-white text-center rounded" style="height:80px;">Imagen</div>
        <h6>Otra tarea</h6>
        <p>Sector: Sistemas <br> Valor ofrecido: $350.000</p>
      </div>

    </div>
  </div>
</div>

<!-- Modal Detalles de tarea -->
<div class="modal fade" id="taskModal1" tabindex="-1" aria-labelledby="taskModal1Label" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taskModal1Label">Detalles de la tarea</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-between">
          <div class="bg-secondary text-white text-center" style="height:80px; width:80px;">Img</div>
          <span class="text-muted">02/08/2024</span>
        </div>
        <h6 class="mt-3">Título de la tarea</h6>
        <p>Sector: Diseño <br> Valor ofrecido: $200.000</p>

        <button class="btn btn-primary btn-sm mb-3">Aplicar</button>
        <button class="btn btn-outline-primary btn-sm mb-3">Comentar</button>

        <h6>Descripción</h6>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>

        <h6>Requisitos</h6>
        <ul>
          <li>Punto 1</li>
          <li>Punto 2</li>
          <li>Punto 3</li>
        </ul>

        <h6>Archivos</h6>
        <div class="bg-light p-3 rounded">
          <p><i class="fa-regular fa-file"></i> Documento1.pdf</p>
          <p><i class="fa-regular fa-file"></i> Documento2.pdf</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a2e0d5f5b9.js" crossorigin="anonymous"></script>
@endsection
