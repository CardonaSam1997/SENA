@extends('HomeMain')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ViewDetails.css') }}">
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <h2 class="mb-4 text-primary fw-bold">👤 Detalles del perfil</h2>

            {{-- Columna izquierda: Info del usuario --}}
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
                    <p><strong>Correo:</strong> juanperez@mail.com</p>
                    <p><strong>Celular:</strong> 3001234567</p>
                    <p><strong>Hoja de vida:</strong> <a href="#">Descargar PDF</a></p>
                </div>
            </div>                                  
            
            {{-- Columna derecha: descripción + formulario --}}
            <div class="col-lg-8">
                <div class="row">                     
                    <div class="card shadow-sm p-3 mb-4">
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

                {{-- Formulario de actualización --}}
                <div class="card shadow-sm p-3">
                    <h5 class="mb-3">Actualizar información</h5>
                    <form method="POST" action="#">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="cedula" class="form-label">Cedula</label>
                            <input type="text" id="cedula" class="form-control" value="1234567890" disabled>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="Juan">
                        </div>

                        <div class="form-group mb-3">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="Pérez">
                        </div>

                        <div class="mb-3">
                            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" id="fechaNacimiento" class="form-control" value="1995-08-20" disabled>
                        </div>

                        <div class="form-group mb-3">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" value="3001234567">
                        </div>

                        <div class="form-group mb-3">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" value="juanperez@mail.com">
                        </div>

                        <div class="form-group mb-3">
                            <label for="ciudad">Ciudad de residencia</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" value="Bogotá">
                        </div>

                        <div class="form-group mb-3">
                            <label for="campo">Campo (Área de trabajo)</label>
                            <input type="text" class="form-control" id="campo" name="campo" value="Backend Development">
                        </div>

                        <div class="mb-3">
                            <label for="hoja_vida" class="form-label">Subir nueva hoja de vida</label>
                            <input type="file" class="form-control" id="hoja_vida" name="hoja_vida" accept=".pdf,.doc,.docx">
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


<!-- URL DE LA IMAGEN DEL PROFESIONAL, LA IMAGEN NO ME PERTENECE ES USADA TEMPORALMENTE PARA EL ESQUEMA
https://img.freepik.com/free-photo/close-up-young-good-looking-dark-skinned-cheerful-american-male-with-curly-black-hair-checkered-shirt-smiling-with-teeth-with-happy-relaxed-face-expression_176420-11124.jpg
-->