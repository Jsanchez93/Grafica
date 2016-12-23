<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('penetration_rate', function () { return view('datos'); });
Route::get('lithology', function () { return view('datos_litologia'); });



Route::post('graph', 'GraficaController@grafica');



Route::group(['prefix' => 'ajax'], function () {    
    Route::post('projects_tabs', 'GraficaController@new_project');
});
