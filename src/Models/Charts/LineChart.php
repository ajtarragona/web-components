<?php

namespace Ajtarragona\WebComponents\Models\Charts;


class LineChart extends BaseChart
{
    public $chart_type = "line";
    
    protected $options = [
        "datalabels.display" => false
    ];
    
   
    
}