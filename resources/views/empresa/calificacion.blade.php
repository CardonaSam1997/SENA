@extends('HomeMain')

@section('content')
<div class="container mt-4">
    <h2>Perfil del Profesional</h2>

    <!-- Datos del profesional -->
    <div class="card mb-4">
        <div class="card-body">
            <h4>Juan Pérez</h4>
            <p><strong>Email:</strong> juanperez@example.com</p>
            <p><strong>Especialidad:</strong> Desarrollo Web</p>
        </div>
    </div>

    <!-- Lista de tareas finalizadas -->
    <h5>Tareas finalizadas</h5>
    <ul class="list-group mb-4">
        <li class="list-group-item">Desarrollo de página corporativa</li>
        <li class="list-group-item">Optimización SEO</li>
        <li class="list-group-item">Implementación de pasarela de pagos</li>
    </ul>

    <!-- Calificación -->
    @if(!$yaCalificado)
        <h5>Calificar Profesional</h5>
        <form action="{{ route('profesionales.calificar', $profesional->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Selecciona una calificación:</label>
                <div class="rating">
                    <input type="radio" name="estrella" value="5" id="star5"><label for="star5">★</label>
                    <input type="radio" name="estrella" value="4" id="star4"><label for="star4">★</label>
                    <input type="radio" name="estrella" value="3" id="star3"><label for="star3">★</label>
                    <input type="radio" name="estrella" value="2" id="star2"><label for="star2">★</label>
                    <input type="radio" name="estrella" value="1" id="star1"><label for="star1">★</label>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Guardar Calificación</button>
        </form>
    @else
        <div class="alert alert-info">Ya has calificado a este profesional con {{ $profesional->calificacion }} estrellas.</div>
    @endif
</div>

<style>
.rating {
    direction: rtl;
    unicode-bidi: bidi-override;
}
.rating input {
    display: none;
}
.rating label {
    font-size: 2rem;
    color: #ddd;
    cursor: pointer;
}
.rating input:checked ~ label {
    color: gold;
}
.rating label:hover,
.rating label:hover ~ label {
    color: gold;
}
</style>
@endsection
