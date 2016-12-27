<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraficaController extends Controller
{
    public function graph_penetration_rate(Request $request){

    	$titulo = str_replace("'", '"', $request->titulo);
    	$titulo = str_replace("\\", "", $titulo);

    	$proyecto = str_replace("'", '"', $request->proyecto);
    	$proyecto = str_replace("\\", "", $titulo);

    	return view('grafica', [
				'series' => $request->series, 
				'titulo' => $titulo,
				'size' => $request->size,
				'medida' => $request->medida,
				'proyecto' => $proyecto
			]);
    }

    public function graph_lithology(Request $request){
        $type = array(
            "ar" => "Arcilla",
            "lb" => "Lava Basaltica",
            "laa"=> "Lava Basaltica con contenido de arcilla",
            "la" => "Lava Andesitica",
            "laf"=> "Lava Andesitica sin fractura",
            "hc" => "Horizonte de contacto (lavas)",
            "pr" => "Piroclastos retrabajados",
            "sa" => "Sedimento aluvial",
            "sf" => "Sedimento fluvial"
        );
        $series = array();
        $total = 0;

        foreach ($request->series as $value) {$total += $value;}//total para calcular el porcentaje 
        for ($i=0; $i < count($request->series); $i++) {            
            $tmp = array(
                "value" => $request->series[$i],
                "type" => $type[ $request->type[$i] ],
                "percent" => (($request->series[$i]/$total)*100)."%"
            );
            array_push($series, $tmp);
        }

        

        dd($series);
        
    }




    /*AJAX*/
    public function new_project(Request $request){        
        return view('ajax.new_project', ["n"=>$request->n]) ;
    }


}
