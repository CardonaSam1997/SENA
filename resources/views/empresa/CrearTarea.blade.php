@extends('HomeMain')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center text-md-start">Publicar nueva tarea</h2>

    <form action="{{ route('company.tasks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-8">
                <label class="form-label">Título</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Pago (COP)</label>
                <input type="number" name="money" step="0.01" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="content" class="form-control" rows="4" required></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Área</label>
                <select name="area" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="Desarrollo">Desarrollo</option>
                    <option value="Diseño">Diseño</option>
                    <option value="Marketing">Marketing</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Fecha de vencimiento</label>
                <input type="date" name="expiration_date" class="form-control"  id="expiration_date" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label for="form-label">Archivos (PDF)</label>
                <input
                    type="file"
                    name="files[]"
                    class="form-control"
                    accept="application/pdf"
                    multiple
                >
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Publicar tarea
        </button>
    </form>
</div>

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'success',
        title: '¡Tarea creada!',
        text: 'La tarea "{{ session('task_created') }}" fue publicada correctamente.',
        confirmButtonColor: '#0d6efd',
        confirmButtonText: 'Perfecto',
        timer: 4000,
        showConfirmButton: false,
        willClose: () => {
            window.location.href = "{{ route('company.tasks.index') }}";
        }
    });
});
</script>
@endif


<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const dateInput = document.getElementById('expiration_date');

    form.addEventListener('submit', function (e) {
        const selectedDate = new Date(dateInput.value);
        const today = new Date();
        
        today.setHours(0, 0, 0, 0);

        if (selectedDate < today) {
            e.preventDefault();

            Swal.fire({
                icon: 'warning',
                title: 'Fecha inválida',
                text: 'Debes seleccionar una fecha mayor a hoy.',
                confirmButtonColor: '#0d6efd',
                confirmButtonText: 'Entendido'
            });
        }
    });
});
</script>


@endsection
