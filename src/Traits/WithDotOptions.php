<?php

namespace Ajtarragona\WebComponents\Traits;
use Illuminate\Support\Str;


trait WithDotOptions{
    public $options;
    
    private function prepareOptions(){
        if($this->options && is_array($this->options)){
            foreach($this->options as $key=>$option){
                if(Str::contains($key,".")){
                    data_set($this->options, $key, $option);
                    unset($this->options[$key]);
                }
            }
        }

    }
}
    