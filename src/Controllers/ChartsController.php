<?php

namespace Ajtarragona\WebComponents\Controllers;

use Ajtarragona\WebComponents\Controllers\BaseController as Controller;
use Exception;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class ChartsController extends Controller
{

    public function loadChart(Request $request){
       
       try{ 
            // dd($request->all());
            // abort(500, "LALALAL");
            $classname=$request->classname;
            $options=$request->except(['classname','_token']);
            
            // laravel me cambia los puntos de las claves de los parametros por _
            $options=collect($options)->mapWithKeys(function ($item, $key) {
                return [str_replace("_",".",$key) => $item];
            })->all();
            

            $chart=new $classname($options);
            $chart->reload();

            return response()->json([
                "datasets"=>$chart->getDatasets(),
                "options"=>$chart->getOptions()
            ]);
           
            
        }catch(Exception $e){
            return response()->json([
                "message"=>$e->getMessage()
            ], 500);
        }
    }

}