<?php

namespace Ajtarragona\WebComponents\Processes;

class DemoStep extends ProcessStep
{
    public $message ="Realitzant últimes tasques";
    public $errormessage;
    public $wait=0;
    public $weight=5;

    protected function execute(){
        //do nothing
        sleep(5);
        return true;
    }

}