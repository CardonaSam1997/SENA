@extends('HomeMain')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/SearchTask.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">       

        <div class="col-12" >
            <div class="row mt-3">
        
               <!-- Columna 1: Filtros -->
<div class="col-md-3">
    <div class="section-title">Filtros tareas</div>
    <form>
        <div class="mb-3">
            <label class="form-label">Área:</label>
            <input type="text" class="form-control mb-2" placeholder="Buscar">
            
            <!-- Checkboxes de áreas -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="sistemas">
                <label class="form-check-label" for="sistemas">Sistemas</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="diseno">
                <label class="form-check-label" for="diseno">Diseño</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="marketing">
                <label class="form-check-label" for="marketing">Marketing</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="administracion">
                <label class="form-check-label" for="administracion">Administración</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="finanzas">
                <label class="form-check-label" for="finanzas">Finanzas</label>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha publicación:</label><br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="hoy">
                <label class="form-check-label" for="hoy">Hoy</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="semana">
                <label class="form-check-label" for="semana">Última semana</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="mes">
                <label class="form-check-label" for="mes">Último mes</label>
            </div>
        </div>
    </form>
</div>

        
                <div class="col-md-4 tareas-disponibles">
                    <div class="section-title">Tareas disponibles</div>
                    
                    <div class="card-custom p-3">
                        <div class="mb-2 bg-secondary text-white text-center">Imagen</div>
                        <h6>Título</h6>
                        <p>Sector <br> Valor ofrecido:</p>
                    </div>
                    
                    <div class="card-custom p-3">
                        <div class="mb-2 bg-secondary text-white text-center">Imagen</div>
                        <h6>Título</h6>
                        <p>Sector <br> Valor ofrecido:</p>
                    </div>

                    <div class="card-custom p-3">
                        <div class="mb-2 bg-secondary text-white text-center">Imagen</div>
                        <h6>Título</h6>
                        <p>Sector <br> Valor ofrecido:</p>
                    </div>
                    
                    <div class="card-custom p-3">
                        <div class="mb-2 bg-secondary text-white text-center">Imagen</div>
                        <h6>Título</h6>
                        <p>Sector <br> Valor ofrecido:</p>
                    </div>

                    <div class="card-custom p-3">
                        <div class="mb-2 bg-secondary text-white text-center">Imagen</div>
                        <h6>Título</h6>
                        <p>Sector <br> Valor ofrecido:</p>
                    </div>
                    
                    <div class="card-custom p-3">
                        <div class="mb-2 bg-secondary text-white text-center">Imagen</div>
                        <h6>Título</h6>
                        <p>Sector <br> Valor ofrecido:</p>
                    </div>
                </div>

                <div class="col-md-5" >
                    <div class="section-title">Detalles</div>
                    
                    <div class="card-custom p-3" style="overflow-y: auto;height: 55vh; ">
                        <div class="d-flex justify-content-between">
                            <div class="bg-secondary text-white text-center" style="height:80px; width:80px;">Img$</div>
                            <span class="text-muted">02/08/2024</span>
                        </div>
                        <h6 class="mt-2">Título</h6>
                        <p>Sector <br> Valor ofrecido:</p>
                        <button class="btn btn-primary btn-sm mb-3">Aplicar</button>
                        <button class="btn btn-primary btn-sm mb-3">Comentar</button>
                        
                        <h6>Descripcion</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>

                        <h6>Requisitos</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                        
                        <ul>
                            <li>Punto 1</li>
                            <li>Punto 2</li>
                            <li>Punto 3</li>
                        </ul>
                        
                        <h6>Archivos</h6>
                        <div class="bg-light p-3 rounded">
                            <p><i class="fa-regular fa-file"></i> Documento1.pdf</p>
                            <p><i class="fa-regular fa-file"></i> Documento2.pdf</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a2e0d5f5b9.js" crossorigin="anonymous"></script>
@endsection