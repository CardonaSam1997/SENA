<div class="card-custom" data-bs-toggle="modal" data-bs-target="#taskModal{{ $task->id }}">  
  <h6>{{ $task->title }}</h6>

  <p>
    Descripción: {{ $task->content }} <br>
    Valor ofrecido: ${{ number_format($task->money, 0, ',', '.') }}
  </p>
</div>

@include('professionals.tasks.modal', ['task' => $task])
