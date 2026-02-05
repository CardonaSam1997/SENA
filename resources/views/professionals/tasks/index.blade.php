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

      @forelse($tasks as $task)
        <x-task-card :task="$task" />
      @empty
        <p class="text-muted">No hay tareas disponibles.</p>
      @endforelse
    </div>

  </div>
</div>

@endsection