<?php

namespace Ajtarragona\WebComponents\Processes;

class DemoStep extends ProcessStep
{
    public $message ="Realitzant últimes tasques...";
    public $wait=0;
    public $weight=10;

    protected function execute(){
        //do nothing
        sleep(5);
        return true;
    }

}