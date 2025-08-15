<!-- resources/views/general.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Task</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/PageMain.css') }}">
    @yield('styles')
</head>
<body class="d-flex flex-column">    
    <!-- Header -->
    <header class="bg-white border-bottom shadow-sm p-3">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <!-- Logo alineado a la izquierda -->
            <div>
                <a href="{{ route('pageMain') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 150px;">
                </a>
            </div>
            <!-- Espacio para otros elementos a la derecha si los necesitas -->
            <div class="position-relative">
                @yield('adicion')
            </div>
        </div>
    </header>    
    <!-- Main -->
    <main class="p-4 flex-grow-1">
        @yield('content')
    </main>
</body>
</html>