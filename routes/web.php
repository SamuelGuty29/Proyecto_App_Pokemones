<?php

use App\Http\Controllers\Usuario\UsuarioController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('lista_pokemones.index');
})->name('index.pokemones');

// Ruta para registrar un usuario
Route::get('/Usuario/Registrar', [UsuarioController::class, 'vista_crear_usuario'])->name('vista_crear_usuario');

// Ruta para guardar al usuario en la base de datos
Route::post('/Usuario/Guardar', [UsuarioController::class, 'crear_usuario'])->name('crear_usuario');

// Ruta para el login del usuario
Route::get('/Usuario/Login', [UsuarioController::class, 'vista_login_usuario'])->name('vista_login_usuario');

// Ruta para verificar si el usuario es correcto en el login
Route::post('/Usuario', [UsuarioController::class, 'validar_login'])->name('validar_login');

// Ruta para cerrar la sesion del usuario
Route::get('/Principal', [UsuarioController::class, 'cerrar_sesion_usuario'])->name('cerrar_sesion_usuario');

// Ruta ver los detalles de un pokemon solo si el usuario esta logueado
Route::get('/ver_datos_pokemon/{id}', [UsuarioController::class, 'ver_datos_pokemon'])->name('ver_datos_pokemon');
