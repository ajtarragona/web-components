<?php

namespace Ajtarragona\WebComponents\Processes;

class ProcessStep
{
    public $message ="OK!";
    public $errormessage ="Error!";
    public $wait = 0;
    public $weight = 0;
    protected $action;
    
    private function callAction($my_function, $params=null) {
        return $my_function($params);
    }    

    public function run(){
        // return $my_function($params);
        // dd($this);
        if($this->wait) sleep($this->wait);
        // $this->action();

        if (method_exists($this, 'execute')) {
            return $this->execute();
        }else{
            if($this->action) return $this->callAction($this->action,$this);
        }
			
        // return call_user_func(array($this, 'action'),$args);
        // return call_user_func_array(array($this, 'action'), array($arg1, $arg2));
    }
    
    
    public function __construct($action=null, $args=[]) {
        
        if(isset($args["message"])) $this->message = $args["message"];
        if(isset($args["errormessage"])) $this->errormessage = $args["errormessage"];
        if(isset($args["wait"])) $this->wait = intval($args["wait"]);
        if(isset($args["weight"])) $this->weight = floatval($args["weight"]);

        $this->action = $action;

    } 

    
}