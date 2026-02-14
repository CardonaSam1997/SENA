@extends('HomeMain')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/Notification.css') }}">
@endsection

@section('content')
<div class="content container py-3">

    @forelse($notifications as $notification)
        <x-notification-item :notification="$notification" />
    @empty
        <p>No hay notificaciones revisadas en la última semana.</p>
    @endforelse

  
 
</div>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection