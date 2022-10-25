<?php

namespace Ajtarragona\WebComponents\Models\Charts;


class PieChart extends BaseChart
{
    public $chart_type = "pie";
    
    protected $donut=false;
    
    protected $color_mode="element";
    
    protected $options = [
        "aspectRatio" => 1,  
    ];

    public function __construct($options=[])
    {
        parent::__construct($options);

        
        if((isset($this->options["donut"]) && $this->options["donut"]) || (isset($this->options["doughnut"]) && $this->options["doughnut"])){
            $this->donut=true;
        }

        if($this->donut){
            $this->chart_type="doughnut";
            $this->setOption("cutout", '50%' );
        }

        // dump($this);
        
        // dump($this->options);
    }
    
}