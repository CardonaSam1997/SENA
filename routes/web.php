<?php

use Illuminate\Support\Facades\Route;

//PRINCIPAL
#Route::view('/', 'HomeMain')->name('pageMain');
Route::view('/', 'Home.Main')->name('pageMain');

//Formularios de registro
Route::view('/iniciar-sesion', 'Home.FormLogin')->name('iniciarSesion');
Route::view('/registro', 'Home.FormRegister')->name('registro');
Route::view('/rol', 'Home.FormRol')->name('rol');
Route::view('/registro-profesional', 'Home.FormProfessional')->name('formPro');
Route::view('/registro-empresa', 'Home.FormBussines')->name('formBuss');
Route::view('/recuperar-password', 'Home.ForgotPassword')->name('password.request');

//General, para ambos
Route::view('/notifications', 'Main.ViewNotification')->name('view.notifications');


//EMPRESA
Route::view('/crear', 'empresa.crearTarea')->name('bussines.create');
Route::view('/listar', 'empresa.verTarea')->name('bussines.listar');
Route::view('/detalles-trabajo', 'empresa.detallesTarea')->name('bussines.detalles');
Route::view('/calificar', 'empresa.calificacion')->name('bussines.calificacion');
Route::get('/profesionales', function () {
    return view('Profesional.ViewDetails');
})->name('profesionales.index');

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
Route::view('/professional/notification', 'Main.ViewNotification')->name('professional.notification');
Route::view('/professional/PendingTask', 'Profesional.ViewDetails')->name('professional.configuracion');