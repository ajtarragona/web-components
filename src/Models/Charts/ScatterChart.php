<?php

namespace Ajtarragona\WebComponents\Models\Charts;


class ScatterChart extends BaseChart
{
    public $chart_type = "scatter";
    
    protected $options = [
        "datalabels.display" => false
    ];
    
}