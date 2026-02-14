@extends('HomeMain')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/Notification.css') }}">
@endsection

@section('content')
<div class="content container py-3">

@if($active->count())

    @foreach($active as $notification)
        <x-notification-item :notification="$notification" />
    @endforeach

@endif

@if($deleted->count())

    <h5 class="mt-4 text-danger">Tareas eliminadas</h5>

    @foreach($deleted as $notification)

        <div class="opacity-50 text-decoration-line-through pointer-events-none">

            <x-notification-item :notification="$notification" :clickable="false"/>

        </div>

    @endforeach

@endif

  
 
</div>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection