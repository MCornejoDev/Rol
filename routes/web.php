<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Crear personaje*/

Route::get('crear', function () {
    return view('crearpersonaje');
});

Route::get('/crear',[
    'as'=>'crear',
    'uses'=> 'CrearPersonajeController@index'
]);

Route::post('crear',[
    'as'=>'registrar',
    'uses'=> 'CrearPersonajeController@registrar'
]);

/*Ver personajes*/

Route::get('personajes',[
    'as'=>'mostrarTodos',
    'uses'=>'MostrarPersonajeController@mostrarTodos'
]);

Route::get('personaje/{id}',[
    'as'=>'mostrar',
    'uses'=>'MostrarPersonajeController@mostrar'
]);

/*Modificar personaje*/

Route::post('personaje/{id}',[
    'as'=>'modificar',
    'uses'=>'MostrarPersonajeController@modificar'
]);

/*Eliminar personajes*/

Route::get('personaje/eliminar/{id}',[
    'as'=>'eliminar',
    'uses'=>'MostrarPersonajeController@eliminarPersonaje'
]);

/*Descargar mapas*/

Route::get('mapas',[
    'as'=>'mapas',
    'uses'=>'MostrarMapasController@mostrar'
]);

/*Herramientas y estadisticas*/ 

Route::get('herramientas',[
    'as'=>'herramientas',
    'uses'=>'HerramientasController@herramienta'
]);

Route::get('estadisticas',[
    'as'=>'estadisticas',
    'uses'=>'HerramientasController@estadisticas'
]);
