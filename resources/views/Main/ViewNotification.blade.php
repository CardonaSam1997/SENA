@extends('HomeMain')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ViewNotification.css') }}">
@endsection

@section('content')
   <!-- Content -->
  <div class="content container">
    
    <!-- Card 1 -->
    <div class="task-card d-flex">
      <div class="task-img me-3">Error</div>
      <div class="flex-grow-1">
        <div class="task-header">
          <span class="task-title">Lorem Ipsum is simply dummy</span>
          <small class="text-muted">Date</small>
        </div>
        <p class="mb-0">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
        </p>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="task-card d-flex">
      <div class="task-img me-3">Error</div>
      <div class="flex-grow-1">
        <div class="task-header">
          <span class="task-title">Lorem Ipsum is simply dummy</span>
          <small class="text-muted">Date</small>
        </div>
        <p class="mb-0">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
        </p>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="task-card d-flex">
      <div class="task-img me-3">Error</div>
      <div class="flex-grow-1">
        <div class="task-header">
          <span class="task-title">Lorem Ipsum is simply dummy</span>
          <small class="text-muted">Date</small>
        </div>
        <p class="mb-0">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
        </p>
      </div>
    </div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>    
@endsection
