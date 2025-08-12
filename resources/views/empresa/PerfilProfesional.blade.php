@extends('general')

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

    <!-- Tabla de tareas finalizadas -->
    <h5>Tareas finalizadas</h5>
    <table class="table table-bordered mb-4">
        <thead class="table-light">
            <tr>
                <th>Tarea</th>
                <th>Entrega</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Desarrollo de página corporativa</td>
                <td><span class="badge bg-success">A tiempo</span></td>
            </tr>
            <tr>
                <td>Optimización SEO</td>
                <td><span class="badge bg-warning text-dark">Demora</span></td>
            </tr>
            <tr>
                <td>Implementación de pasarela de pagos</td>
                <td><span class="badge bg-danger">No entregó</span></td>
            </tr>
        </tbody>
    </table>

    <!-- Calificación -->
    <h5>Calificar Profesional</h5>
    <form action="#" method="POST">
        <div class="mb-3 d-flex align-items-center">
            <div class="rating me-3">
                <input type="radio" name="estrella" value="5" id="star5"><label for="star5">★</label>
                <input type="radio" name="estrella" value="4" id="star4"><label for="star4">★</label>
                <input type="radio" name="estrella" value="3" id="star3"><label for="star3">★</label>
                <input type="radio" name="estrella" value="2" id="star2"><label for="star2">★</label>
                <input type="radio" name="estrella" value="1" id="star1"><label for="star1">★</label>
            </div>
        </div>

         <hr>

        <!-- Campo para escribir comentario -->
        <div class="mb-3">
            <label for="comentario" class="form-label">Escribe un comentario sobre esta persona:</label>
            <textarea class="form-control" id="comentario" rows="4" placeholder="Escribe tu comentario aquí..."></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar Calificación</button>
    </form>
</div>

<style>
.rating {
    display: flex;
    flex-direction: row;
}
.rating input {
    display: none;
}
.rating label {
    font-size: 2rem;
    color: #ddd;
    cursor: pointer;
    transition: color 0.2s;
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
