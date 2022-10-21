<?php

namespace Ajtarragona\WebComponents\Models\Charts;


class BarChart extends BaseChart
{
    public $chart_type = "bar";
    
    protected $horizontal=false;
    protected $stacked=false;
    
    protected $options = [
        "datalabels.display" => false
    ];
   
    
    public function __construct($options=[])
    {

       
        parent::__construct($options);

        if(isset($this->options["horizontal"]) && $this->options["horizontal"]){
            $this->horizontal=true;
            
        }
        if(isset($this->options["stacked"]) && $this->options["stacked"]){
            $this->stacked=true;
        }

        $this->setOption('indexAxis',  $this->horizontal?'y':'x');
        $this->setOption('scales.x.stacked',  $this->stacked);
        $this->setOption('scales.y.stacked', $this->stacked);

        
    }
    
}