<?php

namespace Ajtarragona\WebComponents\Models\Charts;


class PieChart extends BaseChart
{
    public $chart_type = "pie";
    
    protected $donut=false;
    
    protected $options = [
        "aspectRatio" => 1,  
    ];

    public function __construct($options=[])
    {
       
        
        if(isset($options["donut"]) && $options["donut"]){
            $this->donut=true;
            unset($options["donut"]);
        }

        if($this->donut){
            $this->chart_type="doughnut";
            $this->options["cutout"] = '50%' ;
        }
        parent::__construct($options);
        
        // dump($this->options);
    }
    
}