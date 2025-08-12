@extends('general')

@section('content')
<div class="container-searchTask">

    <!-- Filtros -->
    <div class="card filtros">
        <div class="header">Filtros tareas</div>
        <label>Área:</label>
        <input type="text" placeholder="Buscar...">
        <label>Fecha publicación:</label>
        <label><input type="radio" name="fecha"> Hoy</label>
        <label><input type="radio" name="fecha"> La última semana</label>
        <label><input type="radio" name="fecha"> Último mes</label>
        <button>Buscar</button>
    </div>

    <!-- Tareas disponibles -->
    <div class="card">
        <div class="header">Tareas disponibles</div>

        <div class="tarea-item">
            <div class="img-cuadro"></div>
            <div>
                <strong>Título</strong><br>
                Sector<br>
                Valor ofrecido: $500.000
            </div>
        </div>

        <div class="tarea-item">
            <div class="img-cuadro"></div>
            <div>
                <strong>Título</strong><br>
                Sector<br>
                Valor ofrecido: $300.000
            </div>
        </div>

        <div class="tarea-item">
            <div class="img-cuadro"></div>
            <div>
                <strong>Título</strong><br>
                Sector<br>
                Valor ofrecido: $150.000
            </div>
        </div>

         <div class="tarea-item">
            <div class="img-cuadro"></div>
            <div>
                <strong>Título</strong><br>
                Sector<br>
                Valor ofrecido: $500.000
            </div>
        </div>

        <div class="tarea-item">
            <div class="img-cuadro"></div>
            <div>
                <strong>Título</strong><br>
                Sector<br>
                Valor ofrecido: $300.000
            </div>
        </div>

        <div class="tarea-item">
            <div class="img-cuadro"></div>
            <div>
                <strong>Título</strong><br>
                Sector<br>
                Valor ofrecido: $150.000
            </div>
        </div>

         <div class="tarea-item">
            <div class="img-cuadro"></div>
            <div>
                <strong>Título</strong><br>
                Sector<br>
                Valor ofrecido: $500.000
            </div>
        </div>

        <div class="tarea-item">
            <div class="img-cuadro"></div>
            <div>
                <strong>Título</strong><br>
                Sector<br>
                Valor ofrecido: $300.000
            </div>
        </div>

        <div class="tarea-item">
            <div class="img-cuadro"></div>
            <div>
                <strong>Título</strong><br>
                Sector<br>
                Valor ofrecido: $150.000
            </div>
        </div>
    </div>

    <!-- Detalles -->
    <div class="card detalles">
        <div class="header">Detalles</div>
        <p style="text-align: right;">02/06/2024</p>
        <div style="display: flex; gap: 10px; align-items: center;">
            <div class="img-grande"></div>
            <div>
                <strong>Título</strong><br>
                Sector<br>
                Valor ofrecido: $500.000
            </div>
        </div>
        <button style="margin-top: 10px;">Aceptar</button>
        <h4>Detalles</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet facilisis urna. Praesent consectetur est at lobortis fermentum.</p>
        <ul>
            <li>Requisito 1</li>
            <li>Requisito 2</li>
            <li>Requisito 3</li>
        </ul>
        <h4>Archivos</h4>
        <div class="archivo"></div>
        <div class="archivo"></div>
    </div>

</div>
@endsection