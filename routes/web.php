<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

//PRINCIPAL
Route::view('/', 'Home.Main')->name('pageMain');

Route::get('/login', [UserController::class, 'indexLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::prefix('register')->group(function () {
    Route::view('/', 'Home.FormRegister')->name('registro');
    Route::post('/', [UserController::class, 'store'])->name('register.store');
    
    Route::get('/role/{user}', [RegisterController::class, 'selectRole'])->name('register.role');
    
    // Formularios de rol
    Route::get('/professional/{user}', [RegisterController::class, 'formProfessional'])->name('register.professional.form');
    Route::post('/professional/{user}', [RegisterController::class, 'storeProfessional'])->name('register.professional.store');

    Route::get('/company/{user}', [RegisterController::class, 'formCompany'])->name('register.company.form');
    Route::post('/company/{user}', [RegisterController::class, 'storeCompany'])->name('register.company.store');
});


Route::view('/moderador', 'moderador.gestionUsuarios')->name('gestion');
//ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {    


    #Route::get('/admin', fn () => view('admin.dashboard'))->name('admin.dashboard');
});

//COMPANY
Route::middleware(['auth', 'role:company'])->group(function () {
    Route::view('/crear', 'empresa.crearTarea')->name('bussines.create');
});

//PROFESSIONAL
Route::middleware(['auth', 'role:professional'])->prefix('/professional')->group(function () {
    Route::view('/notification', 'Main.ViewNotification')->name('professional.notification');
    #Route::get('/user', fn () => view('user.dashboard'))->name('user.dashboard');
});

//Formularios de registro
Route::view('/rol', 'Home.FormRol')->name('rol');
Route::view('/registro-profesional', 'Home.FormProfessional')->name('formPro');
Route::view('/registro-empresa', 'Home.FormBussines')->name('formBuss');
Route::view('/recuperar-password', 'Home.ForgotPassword')->name('password.request');
Route::view('/notifications', 'Main.ViewNotification')->name('view.notifications');

//EMPRESA
#Route::view('/crear', 'empresa.crearTarea')->name('bussines.create');
Route::view('/listar', 'empresa.verTarea')->name('bussines.listar');
Route::view('/detalles-trabajo', 'empresa.detallesTarea')->name('bussines.detalles');
Route::view('/calificar', 'empresa.calificacion')->name('bussines.calificacion');
Route::get('/profesionales', function () {
    return view('Profesional.ViewDetails');})->name('profesionales.index');
Route::get('/profesionales/{id}', function ($id) {    
    $profesional = (object)[
        'id' => $id,
        'nombre' => 'Juan Pérez',
        'email' => 'juanperez@example.com',
        'especialidad' => 'Desarrollo Web',
        'calificacion' => null 
    ];
    $yaCalificado = $profesional->calificacion !== null;
    return view('empresa.PerfilProfesional', compact('profesional', 'yaCalificado'));
})->name('bussines.profesional.show');


Route::view('/configuracion', 'empresa.configuracion')->name('bussines.configuracion');

##PROFESIONAL##
Route::view('/professional/buscarTarea', 'Profesional.SearchTask')->name('professional.search');
Route::view('/professional/configuracion', 'Profesional.PendingTasks')->name('professional.pendingTasks');

Route::view('/professional/PendingTask', 'Profesional.ViewDetails')->name('professional.configuracion');

//moderador
Route::view('/moderador','Moderador.GestionUsuarios');