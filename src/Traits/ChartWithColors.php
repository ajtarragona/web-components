<?php

namespace Ajtarragona\WebComponents\Traits;
use Illuminate\Support\Str;


trait ChartWithColors{

    public static function color($index, $palette="default"){
        $model=new self;
        $model->palette=$palette;
        return $model->getColor($index);
    }

    public static function rgbColor($index, $palette="default"){
        $model=new self;
        $model->palette=$palette;
        return $model->getRGBColor($index);
    }

    public static function rgbaColor($index, $opacity=1, $palette="default"){
        $model=new self;
        $model->palette=$palette;
        return $model->getRGBAColor($index, $opacity);
    }

    protected function getColorMode(){
        return $this->color_mode ?? "dataset";
    }
    
    protected function getColor($index){
        $palette =$this->palette ?? "default";
        return $this->palettes[$palette][ $index % count($this->palettes[$palette])]; //da la vuelta
    }

    protected function getRGBAColor($index, $opacity=1){
        return "rgba(". implode(",",html2rgb($this->getColor($index))).",".$opacity.")";
    }
    
    protected function getRGBColor($index){
        return "rgb(". implode(",",html2rgb($this->getColor($index))).")";
    }


    protected function addColorToOptions($options, $index){
        // if($this->chart_type=="bar" && $this->color_mode=="element") dump($this->options, $options);

        if(!isset($options["backgroundColor"])){
            $options["backgroundColor"] = $this->getColor($index);
        }
        if(in_array($this->chart_type,["line","radar"])){
            if(!isset($options["borderColor"])){
                $options["borderColor"] = $this->getColor($index);
            }
        }
        return $options;
    }
}  