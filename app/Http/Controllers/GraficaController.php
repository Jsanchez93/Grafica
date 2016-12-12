<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraficaController extends Controller
{
    public function grafica(Request $request){
    	$titulo = str_replace("'", '"', $request->titulo);
    	$titulo = str_replace("\\", "", $titulo);
    	return view('grafica', [
				'series' => $request->series, 
				'titulo' => $titulo,
				'size' => $request->size,
				'medida' => $request->medida,
				'proyecto' => $request->proyecto
			]);
    }
}