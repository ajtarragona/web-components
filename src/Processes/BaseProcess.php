<?php

namespace Ajtarragona\WebComponents\Processes;

use Exception;

class BaseProcess 
{
    protected $steps=[];
    protected $options=[];
    public $endmessage="Finished";

    public function __construct($options=[]) {
        $this->options=$options;
    }

    public function getOption($name, $default=null){
        return data_get($this->options, $name, $default);
    }

    public function setSteps($steps){
        $this->steps=$steps;
        return $this;
    }

    public function addStep($step,$args=[]){
        if($step instanceof ProcessStep) $this->steps[]=$step;
        else if(is_callable($step)) $this->steps[]=new ProcessStep($step,$args);

        return $this;
    }

    protected function toJson($msg){
        return json_encode($msg);
    }

    protected function info($i, $step, $progress){
        echo "\n".$this->toJson([
            "type" =>"info",
            "progress" =>$progress,
            "step" => $i,
            "totalsteps" => count($this->steps),
            "message" =>$step->message,
        ]);
    }

    protected function error($i, $step, $progress){
        echo "\n".$this->toJson([
            "type" =>"error",
            "progress" =>$progress,
            "step" => $i,
            "totalsteps" => count($this->steps),
            "message" =>$step->errormessage,
        ]);
    }

    protected function finished(){
        echo "\n".$this->toJson([
            "type" =>"success",
            "progress" =>100,
            "message" =>$this->endmessage,
        ]);
    }
    

    protected function abort($message, $code=500){
        echo "\n".$this->toJson([
            "type" =>"abort",
            "message" =>$message,
        ]);
        abort($code,$message);
    }


    protected function prepareWeights(){
        $usedweight=0;
        $numwithnoweight=0;
        foreach($this->steps as $step){
            $usedweight += $step->weight;
            if($step->weight==0) $numwithnoweight++;
        }
        //si la suma es mayor que 100, devuelvo una excepcion
        if($usedweight>100) throw new Exception("Total Weight exceeds 100%");

        //recoorro los que no tengan peso y les pongo lo que queda
        $stepweight=(100-$usedweight)/$numwithnoweight;
        // dd($stepweight);
        $totalweight=0;

        foreach($this->steps as $i=>$step){
            if($step->weight==0) $this->steps[$i]->weight=$stepweight;

            $totalweight += $this->steps[$i]->weight;
        }
        // dd($this->steps);
        
        if( ceil($totalweight) < 100) throw new Exception("Total weight must be equal to 100%");

    }

    
    public function run(){
        if($this->steps){
            set_time_limit(0); 
            ob_implicit_flush(true);
            ob_end_flush();

            $this->prepareWeights();
            // dd($this);
            try{
                $progress=0;
                foreach($this->steps as $i=>$step){
                    $progress = $progress + $step->weight;
                            
                    if($step->run()){
                        $this->info(($i+1), $step, $progress);
                    }else{
                        $this->error(($i+1), $step, $progress); 
                    }
                    
                }
                $this->finished();

            }catch(Exception $e){
                // dd($e);
                // abort(500,$e->getMessage());
                $this->abort($e->getMessage());
                // echo "\n".json_encode(["progress"=>"100", "message"=>"error"]);
            }
            
            
            //no se ejecuta nada más después del proceso
            die();
        }
    }

}