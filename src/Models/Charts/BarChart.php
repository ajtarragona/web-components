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
        if(isset($options["horizontal"]) && $options["horizontal"]){
            $this->horizontal=true;
            unset($options["horizontal"]);
        }
        if(isset($options["stacked"]) && $options["stacked"]){
            $this->stacked=true;
            unset($options["stacked"]);
        }

        $this->options['indexAxis'] = $this->horizontal?'y':'x';
        $this->options['scales.x.stacked'] = $this->stacked;
        $this->options['scales.y.stacked'] = $this->stacked;

        parent::__construct($options);
        
    }
    
}