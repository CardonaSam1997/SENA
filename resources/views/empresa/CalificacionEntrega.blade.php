@extends('HomeMain')

@section('content')
<div class="container">
    <h2 class="mb-4">Detalles de la tarea</h2>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Información de la tarea
        </div>
        <div class="card-body">
            <h4 class="card-title">Título: Desarrollo de página web corporativa</h4>
            <p><strong>Pago:</strong> $2,500,000 COP</p>
            <p><strong>Área:</strong> Sistemas</p>
            <p><strong>Fecha de vencimiento:</strong> 20/08/2025</p>
            <p><strong>Descripción:</strong> Se requiere el desarrollo de una página web corporativa con diseño responsivo, optimizada para SEO y con integración a un sistema de gestión de contenidos.</p>
            <p><strong>Archivo adjunto:</strong> <a href="#">Requisitos.pdf</a></p>
            
            <hr>
            <h5 class="mt-3">Entrega del trabajo</h5>
            <ul class="list-group mb-3">
                <li class="list-group-item"><a href="#">Diseño_final.fig</a></li>
                <li class="list-group-item"><a href="#">Codigo_fuente.zip</a></li>
                <li class="list-group-item"><a href="#">https://miweb-demo.com</a></li>
            </ul>
            
            <h5 class="mt-4">Calificar al profesional</h5>
            <p><strong>Profesional:</strong> Juan Pérez</p>
            
            <div class="mb-3">
                <label for="comentarios" class="form-label">Comentarios</label>
                <textarea class="form-control" id="comentarios" rows="3" placeholder="Escribe tus comentarios aquí..."></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Puntuación</label>
                <div id="rating" class="text-warning fs-4">
                    <i class="fa-regular fa-star" data-value="1"></i>
                    <i class="fa-regular fa-star" data-value="2"></i>
                    <i class="fa-regular fa-star" data-value="3"></i>
                    <i class="fa-regular fa-star" data-value="4"></i>
                    <i class="fa-regular fa-star" data-value="5"></i>
                </div>
            </div>

            <button class="btn btn-success">Enviar calificación</button>
        </div>
    </div>
</div>

<script>    
    const stars = document.querySelectorAll('#rating i');
    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = parseInt(star.getAttribute('data-value'));
            stars.forEach((s, i) => {
                s.classList.remove('fa-solid');
                s.classList.add('fa-regular');
                if(i < value){
                    s.classList.remove('fa-regular');
                    s.classList.add('fa-solid');
                }
            });
        });
    });
</script>
@endsection
