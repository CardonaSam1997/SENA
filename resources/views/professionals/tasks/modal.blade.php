
<div class="modal fade" id="taskModal{{ $task->id }}" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">{{ $task->title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <span class="text-muted">
          {{ optional($task->created_at)->format('d/m/Y') ?? 'Sin fecha' }}
        </span>

        <p class="mt-2">
          Sector: {{ $task->area }} <br>
          Valor: ${{ number_format($task->money, 0, ',', '.') }}
        </p>

@if(isset($task))
  <form method="POST" action="{{ route('professional.tasks.apply', $task->id) }}">
    @csrf
    <button class="btn btn-primary btn-sm mb-3">Aplicar</button>
  </form>
@endif


        <h6>Descripción</h6>
        <p>{{ $task->content }}</p>

        <h6>Archivos</h6>
        <div class="bg-light p-3 rounded">
          @forelse($task->files as $file)
            <p>
              <i class="fa-regular fa-file"></i>
              <a href="{{ asset('storage/'.$file->path) }}" target="_blank">
                {{ basename($file->path) }}
              </a>
            </p>
          @empty
            <p class="text-muted">Sin archivos</p>
          @endforelse
        </div>

      </div>
    </div>
  </div>
</div>