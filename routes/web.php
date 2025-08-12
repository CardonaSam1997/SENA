<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'Home.PageMain')->name('pageMain');
//PROFESIONAL
Route::view('/crear', 'empresa.crearTarea')->name('tareas.create');
Route::view('/ver', 'empresa.verTarea')->name('tareas.ver');
Route::view('/detalles', 'empresa.detallesTarea')->name('tareas.detalles');
Route::view('/calificar', 'empresa.calificacion')->name('tareas.calificacion');

Route::get('/profesionales', function () {
    return view('profesionales');
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
})->name('profesionales.show');


//PRINCIPAL
Route::view('/iniciar-sesion', 'Home.FormLogin')->name('iniciarSesion');
Route::view('/registro', 'Home.FormRegister')->name('registro');
Route::view('/rol', 'Home.SelectRol')->name('rol');

Route::view('/formulario-p', 'Home.FormProfessional')->name('formPro');
Route::view('/formulario-e', 'Home.FormBussines')->name('formBuss');

Route::view('/notifications', 'Main.ViewNotification')->name('view.notifications');

Route::view('/buscarTarea', 'Profesional.SearchTask')->name('task');
