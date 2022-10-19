<?php

namespace Ajtarragona\WebComponents\Models\Charts;


class PolarAreaChart extends BaseChart
{
    public $chart_type = "polarArea";
    
    
    protected $options = [
        "datalabels.display" => false
    ];
    
}