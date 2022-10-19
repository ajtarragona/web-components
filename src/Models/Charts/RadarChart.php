<?php

namespace Ajtarragona\WebComponents\Models\Charts;


class RadarChart extends BaseChart
{
    public $chart_type = "radar";
    
    protected $options = [
        "datalabels.display" => false
    ];
    
    
}