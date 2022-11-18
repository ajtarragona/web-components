<?php

namespace Ajtarragona\WebComponents\Processes;


class DemoProcess extends BaseProcess 
{

    public function __construct($options=[]) {
        parent::__construct($options);
        $this->endmessage="Demo process finished!";
       
        $numsteps=$this->getOption("steps",100); //lo que pasen por parametro o 100

        // Podemos añadir steps anónimos, inicializando sus valores 
        // y pasando la funcion que se ejecutara
        for($i=0;$i<$numsteps;$i++){
            $this->addStep(function($step){
                
                usleep(100000);
                return true;
            },[
                 "message"=> "Demo step ". $i ." succesful",
                "errormessage"=> "Error in demo step ". $i
            ]);
        }


        // O bien pasar instancia de una clase que herede BaseStep
        //esta classe deberá implementar el método execute

        $this->addStep(new DemoStep());

       
    }
}