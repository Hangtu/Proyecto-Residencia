<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



  Route::get('/mapa_partidos', function () {
    return view('general.mapa');
 });

    Route::get('/resultados_partidos', function () {
    return view('general.resultados');
 });


Route::group(['middleware'=>'auth'],function(){	


 Route::get('/', function () {
     return view('auth');
 });

  Route::get('/bienvenido', function () {
    return view('bienvenido');
 });

 //REGISTRO...

Route::any('/registro_arbitros','arbitro@index');
Route::any('/arbitro/create','arbitro@create');
Route::resource('arbitro','arbitro');


Route::any('/registro_cancha','cancha@index');
Route::any('/cancha/create','cancha@create');
Route::resource('canchas','cancha');


Route::any('/registro_equipo','equipo@index');
Route::any('/equipo/create','equipo@create');
Route::resource('equipos','equipo');

Route::any('/registro_jugador','jugador@index');
Route::any('/jugador/create','jugador@create');

Route::resource('jugadores','jugador');

Route::any('/registro_medico','medico@index');
Route::any('/medico/create','medico@create');
Route::resource('medicos','medico');

Route::any('/definir_grupo','grupos@definir');
Route::any('/definir_grupo_store','grupos@store');

Route::any('/registro_encuentros','encuentro@index');
Route::any('/crear_encuentros','encuentro@create');
Route::any('/update_encuentro','encuentro@update');


Route::resource('protesta','protestaController');

Route::resource('mensaje_protesta','mensajeProtestaController');



});

Route::resource('resultados_finales','resultadosFinalesController');

Route::any('/ionic/lista_partidos','ionicController@lista_partidos');
Route::any('/ionic/enviar_resultados/{data}','ionicController@guardarResultados');


Route::any('/ionic/crear_protesta/{data}','ionicController@crearProtesta');


Route::post('/auth', 'loginController@login');
Route::get('/logout', 'loginController@logout');

