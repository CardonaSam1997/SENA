<style>
  .card-custom {
        background-color: rgb(252, 252, 252) !important;
 
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 15px;
    transition: all 0.2s ease-in-out;
}

.card-custom:hover {
    background-color: #eceff3;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    cursor: pointer;
}
</style>

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