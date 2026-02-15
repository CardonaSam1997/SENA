<div class="card-custom" data-bs-toggle="modal" data-bs-target="#taskModal{{ $task->id }}" id=card-custom-id>
  <h6>{{ $task->title }}</h6>

  <p class="text-truncate-multiline" style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;">
    Descripción: {{ $task->content }} 
  </p> 
  </p>
    Valor ofrecido: ${{ number_format($task->money, 0, ',', '.') }}
  </p>
</div>

@include('professionals.tasks.modal', ['task' => $task])