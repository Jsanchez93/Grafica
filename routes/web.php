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
    return view('datos');
});

Route::group(['prefix' => 'ajax'], function () {
    Route::get('projects_tabs', function ()    {
       return view('ajax.new_project') ;
    });
});

Route::post('grafica/', 'GraficaController@grafica');