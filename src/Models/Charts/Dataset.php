<?php

namespace Ajtarragona\WebComponents\Models\Charts;

use Ajtarragona\WebComponents\Traits\WithDotOptions;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;


class Dataset
{   
    public $id;
    public $label;
    public $data;

    use WithDotOptions;
    


    /**
     * Class constructor.
     */
    public function __construct($label=null, $data=null, $options=[])
    {
        $this->label = $label;
        $this->id = $label ? Str::snake($label): null;
        $this->data = $data ?? collect();
        $this->options = $options;
        $this->prepareOptions();
    }

    

    public function getDataLabels(){
        return $this->data->pluck("label")->all();
    }
    
    public function printDataLabels(){
        return "\"".implode("\",\"",$this->getDataLabels())."\"";
    }

    public function getDataValues(){
        return $this->data->pluck("data")->all();
    }

    public function printDataValues($dataset_id){
        return implode(",",$this->getDataValues());
    }

    public function addDataValue($title, $value, $options=[]){
        $this->data->push(new DatasetValue($title,$value, $options));
        
    }
   
   
    public function getDataColors($dataset_id){
        return $this->data->pluck("options.backgroundColor")->all();
    }
    public function printDataColors($dataset_id){
        return "\"".implode("\",\"",$this->getDataColors())."\"";
    }
}
