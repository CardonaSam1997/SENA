<?php

use Illuminate\Support\Facades\Route;

//PRINCIPAL
Route::view('/', 'HomeMain')->name('pageMain');
#Route::view('/', 'Home.Main')->name('pageMain');

//Formularios de registro
Route::view('/iniciar-sesion', 'Home.FormLogin')->name('iniciarSesion');
Route::view('/registro', 'Home.FormRegister')->name('registro');
Route::view('/rol', 'Home.FormRol')->name('rol');
Route::view('/registro-profesional', 'Home.FormProfessional')->name('formPro');
Route::view('/registro-empresa', 'Home.FormBussines')->name('formBuss');

//General, para ambos
Route::view('/notifications', 'Main.ViewNotification')->name('view.notifications');


//EMPRESA
Route::view('/crear', 'empresa.crearTarea')->name('tareas.create');
#ESTE HAY QUE QUITARLO -  SE ESTA USANDO EN LA VISTA (Parece que era un problema de cache)
Route::view('/ver', 'empresa.verTarea')->name('tareas.ver');
#################

Route::view('/detalles', 'empresa.detallesTarea')->name('tareas.detalles');
Route::view('/calificar', 'empresa.calificacion')->name('tareas.calificacion');

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
})->name('profesionales.show');




Route::view('/buscarTarea', 'Profesional.SearchTask')->name('task');