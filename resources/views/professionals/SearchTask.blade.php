@extends('HomeMain')

@section('content')
<div class="container-fluid">
  <div class="row mt-3">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <!-- Filtros -->
    <div class="col-12 col-md-3">
      <div class="filter-box">
        <div class="section-title">Filtros tareas</div>
        <form>
          <div class="mb-3">            
            <button type="submit" class="form-control mb-2" placeholder="Buscar">

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