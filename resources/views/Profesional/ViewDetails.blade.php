
@extends('HomeMain')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ViewDetails.css') }}">
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">

            <div class="col-lg-4">
                <div class="card shadow-sm p-3 mb-4">
                    <div class="text-center">
                        <img src="{{ asset('images/profesional.png') }}" class="rounded-circle mb-3" alt="Foto Profesional" style="width: 200px; height: 200px; object-fit: cover;">
                        <h4>Juan Pérez</h4>
                        <p class="text-muted">Desarrollador Backend</p>
                        <div>
                            <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">☆</span>
                        </div>
                    </div>
                    <hr>
                    <p><strong>Años de experiencia:</strong> 5</p>
                    <p><strong>Lugar de residencia:</strong> Bogotá, Colombia</p>
                    <p><strong>Correo:</strong> Bogotá, Colombia</p>
                    <p><strong>Hoja de vida:</strong> <a href="#">Descargar PDF</a></p>
                </div>
            </div>                                  
            
            <div class="col-lg-8">
                <div class="row">                     
                    <div class="card shadow-sm p-3">
                        <h5 class="mb-3">Descripción</h5>                        
                        <p>
                            Profesional con amplia experiencia en el desarrollo de soluciones tecnológicas 
                            a medida. Especializado en optimizar procesos empresariales mediante herramientas 
                            innovadoras y metodologías ágiles. Comprometido con la calidad, la puntualidad y 
                            la satisfacción del cliente.
                        </p>  
                    </div>                
                </div>
                
                <hr>

                <div class="row">
                    <div class="card shadow-sm p-3">
                        <h5 class="mb-3">Comentarios de empresas</h5>
                        
                        <div class="comment-card">
                            <strong>Empresa: Tech Solutions S.A.S</strong>
                            <p>Excelente profesional, entregó todo antes de la fecha límite.</p>
                        </div>
                        
                        <div class="comment-card">
                            <strong>Empresa: InnovarTech</strong>
                            <p>Muy comprometido y con gran capacidad para resolver problemas complejos.</p>
                        </div>
                        
                        <div class="comment-card">
                            <strong>Empresa: Software Creativo</strong>
                            <p>Buena comunicación y calidad de trabajo.</p>
                        </div>
                        
                        <div class="comment-card">
                            <strong>Empresa: Tech Solutions S.A.S</strong>
                            <p>Excelente profesional, entregó todo antes de la fecha límite.</p>
                        </div>
                        
                        <div class="comment-card">
                            <strong>Empresa: InnovarTech</strong>
                            <p>Muy comprometido y con gran capacidad para resolver problemas complejos.</p>
                        </div>
                        
                        <div class="comment-card">
                            <strong>Empresa: Software Creativo</strong>
                            <p>Buena comunicación y calidad de trabajo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<!-- URL DE LA IMAGEN DEL PROFESIONAL, LA IMAGEN NO ME PERTENECE ES USADA TEMPORALMENTE PARA EL ESQUEMA
https://img.freepik.com/free-photo/close-up-young-good-looking-dark-skinned-cheerful-american-male-with-curly-black-hair-checkered-shirt-smiling-with-teeth-with-happy-relaxed-face-expression_176420-11124.jpg
-->