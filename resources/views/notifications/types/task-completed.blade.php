@extends('HomeMain')

@section('content')
<div class="container">

    <h4 class="mb-4 text-success">
        {{ $notification->data['title'] }}
    </h4>

    {{-- Detalle de la tarea --}}
    <div class="d-flex card mb-4">
        <div class="card-header bg-light fw-bold">
            Detalles de la tarea
        </div>

        <div class="card-body">
            <div class="row">            
                <div class="col-md-5">
                    <p><strong>Título:</strong> {{ $task->title }}</p>
                    <p><strong>Área:</strong> {{ $task->area }}</p>
                    <p><strong>Descripción:</strong></p>
                    <p>{{ $task->content }}</p>
                    <p><strong>Estado:</strong> {{ ucfirst($task->state) }}</p>
                    <p><strong>Fecha de vencimiento:</strong>
                        {{ $task->expiration_date->format('d/m/Y') }}
                    </p>                  
                </div>

                <div class="col-md-3">
                @if($applyTask->delivery_file)
                        <div class="text-center mt-4">
                            @if($applyTask->paid)
                                <a href="{{ asset('storage/'.$applyTask->delivery_file) }}"
                                class="btn btn-success"
                                target="_blank">
                                    <i class="fas fa-download"></i> Descargar archivo
                                </a>
                            @else
                                <div id="paypal-button-container"></div>
                            @endif
                        </div>
                    @else
                        <p class="text-muted mt-3">
                            La tarea aún no ha sido entregada.
                        </p>
                    @endif  
                </div>
            </div>
        </div>
    </div>
    {{-- Profesional que completó la tarea --}}
    <div class="card">
        <div class="card-header bg-success text-white fw-bold">
            Profesional que completó la tarea
        </div>

        <div class="card-body">
            <p><strong>Nombre:</strong>
                {{ $professional->name }} {{ $professional->last_name }}
            </p>
            <p><strong>Experiencia:</strong> {{ $professional->experience }} años</p>
            <p><strong>Educación:</strong> {{ $professional->academic_education }}</p>
            <p><strong>Servicio:</strong> {{ $professional->service_type }}</p>
        </div>
    </div>

</div>
<script src="https://www.paypal.com/sdk/js?client-id=AS6h5QXn4mGjirvAjGa5eikobIOtxrWxQ6QfS8CmBlH2jidTZ17sctS0_-ycFU5VLAfGSbbA5epLUke5&currency=USD"></script>

<script>
    const captureUrlBase = "{{ url('company/paypal/capture') }}";

paypal.Buttons({

    createOrder: function(data, actions) {
        return fetch("{{ route('company.paypal.create') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                amount: '{{ $task->money }}'
            })
        })
        .then(res => res.json())
        .then(data => data.id);
    },

    onApprove: function(data, actions) {
        return fetch(captureUrlBase + '/' + data.orderID, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                professional_id: '{{ $applyTask->professional_id }}',
                task_id: '{{ $applyTask->task_id }}'
            })
        })
        .then(res => res.json())
        .then(response => {
            alert(response.message);
            location.reload();
        });
    },

    onError: function(err) {
        alert('No se pudo realizar el pago');
    }

}).render('#paypal-button-container');
</script>
@endsection