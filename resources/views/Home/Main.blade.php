<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Task Landing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-white text-dark">

<!-- Header -->
<header class="d-flex justify-content-between align-items-center py-3 px-4">
    <div class="d-flex align-items-center gap-2">
        <img src="{{asset('images/logo.png')}}" alt="Business Task Logo" height="60">
    </div>
    <a href="{{ route('iniciarSesion') }}" class="btn btn-warning rounded-pill fw-bold px-4">Login</a>
</header>

<!-- Hero -->
<section class="container py-5">
    <div class="row align-items-center g-5">
        <div class="col-md-6">
            <h1 class="fw-bold">Lorem Ipsum is simply dummy text of the printing and typesetting</h1>
            <p class="text-primary">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
        </div>
        <div class="col-md-6">
            <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded p-4" style="height:300px;">
                ESTE CUADRO ES PARA IMAGEN DE DOS PERSONAS
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="container py-5">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="border border-primary rounded p-4 text-center bg-white">
                <div class="bg-warning mx-auto mb-3" style="width:40px;height:40px;"></div>
                <h4>Lorem Ipsum is simply</h4>
                <p class="text-primary small">Dummy text of the printing and typesetting industry...</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="border border-primary rounded p-4 text-center bg-white">
                <div class="bg-warning mx-auto mb-3" style="width:40px;height:40px;"></div>
                <h4>Lorem Ipsum is simply</h4>
                <p class="text-primary small">Dummy text of the printing and typesetting industry...</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="border border-primary rounded p-4 text-center bg-white">
                <div class="bg-warning mx-auto mb-3" style="width:40px;height:40px;"></div>
                <h4>Lorem Ipsum is simply</h4>
                <p class="text-primary small">Dummy text of the printing and typesetting industry...</p>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="text-center py-5">
    <h2>Our <span class="text-warning">Services</span></h2>
    <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
        <div class="bg-primary text-white rounded p-3" style="width:200px;">Retina Ready</div>
        <div class="bg-primary text-white rounded p-3" style="width:200px;">Creative Elements</div>
        <div class="bg-primary text-white rounded p-3" style="width:200px;">Easy-to-Use</div>
        <div class="bg-primary text-white rounded p-3" style="width:200px;">Easy Import</div>
    </div>
</section>

<!-- Testimonials -->
<section class="bg-dark text-white py-5">
    <div class="container text-center">
        <h2>Testimonial</h2>
        <div class="row g-4 mt-4 justify-content-center">
            <div class="col-md-3">
                <div class="border border-warning rounded p-3 bg-primary">
                    <img src="person1.jpg" alt="HumouThero" class="rounded-circle mb-3" width="60" height="60">
                    <h4 class="text-warning">HumouThero</h4>
                    <p class="small">If suffered alteration in some form, by injected humour...</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="border border-warning rounded p-3 bg-primary">
                    <img src="person2.jpg" alt="HumouThero" class="rounded-circle mb-3" width="60" height="60">
                    <h4 class="text-warning">HumouThero</h4>
                    <p class="small">If suffered alteration in some form, by injected humour...</p>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-warning">&lt;</button>
            <button class="btn btn-warning">&gt;</button>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-primary text-white py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="d-flex gap-2 mb-3">
                    <span>●</span><span>●</span><span>●</span>
                </div>
                <p class="small">There are many variations of passages...</p>
            </div>
            <div class="col-md-3">
                <h4 class="text-warning">LET US HELP YOU</h4>
                <ul class="list-unstyled small">
                    <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="#" class="text-white text-decoration-none">About</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Service</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4 class="text-warning">INFORMATION</h4>
                <ul class="list-unstyled small">
                    <li><a href="#" class="text-white text-decoration-none">Terms</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4 class="text-warning">OUR DESIGN</h4>
                <p class="small">There are many variations of passages...</p>
                <input type="email" class="form-control form-control-sm" placeholder="Enter your email">
                <button class="btn btn-warning mt-2 btn-sm">Subscribe</button>
            </div>
        </div>
    </div>
</footer>

<!-- Copyright -->
<div class="bg-dark text-white text-center py-2 small">
    © 2019 All Rights Reserved. Design by Free Html Templates
</div>

</body>
</html>