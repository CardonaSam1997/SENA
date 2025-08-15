
@extends('PageMain')

@section('styles')    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/FormRol.css') }}">
@endsection


@section('adicion')
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <span>Bienvenido</span>
        </div>
    </div>

@endsection

@section('content')
   <div class="container d-flex flex-column justify-content-center align-items-center min-vh-80 text-center">

    <div class="mb-4">
        <h1 class="fw-bold">LOREM IPSUM</h1>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
        </p>
    </div>

    <div class="row justify-content-center g-4">
      
        <div class="col-md-4">
            <div class="role-card" onclick="selectRole('profesional')">
                <i class="bi bi-person-workspace role-icon"></i>
                <h5 class="fw-bold">Profesionales</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="role-card" onclick="selectRole('empresa')">
                <i class="bi bi-building role-icon"></i>
                <h5 class="fw-bold">Empresas</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>

    </div>

</div>

 
<footer class="bg-light text-center py-2 fixed-bottom border-top">
    Condiciones de uso
</footer>
<script>
    function selectRole(role) {
        if (role === 'profesional') {
            window.location.href = "{{ route('formPro') }}";
        } else if (role === 'empresa') {            
            window.location.href = "{{ route('formBuss') }}";            
        }
    }
</script>
@endsection