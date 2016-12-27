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
Route::post('graph', 'GraficaController@graph_penetration_rate');


Route::get('lithology-data', function () { return view('lithology-data'); });
Route::post('lithology-graph', 'GraficaController@graph_lithology');







Route::group(['prefix' => 'ajax'], function () {    
    Route::post('projects_tabs', 'GraficaController@new_project');
});
