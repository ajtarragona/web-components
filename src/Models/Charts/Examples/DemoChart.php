<?php

namespace Ajtarragona\WebComponents\Models\Charts\Examples;

use Ajtarragona\WebComponents\Models\Charts\DatasetValue;
use Ajtarragona\WebComponents\Models\Charts\LineChart;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;


class DemoChart extends LineChart
{   

    public $id="demo_chart";

    protected $options = [
        'title.text'=>"Demo chart",
        'title.display'=> true,
        'legend.position' =>'right',
        'legend.onClick'=>false,
        'datalabels.display'=>false,
        'tooltip.backgroundColor' => '#ffffff',
        'tooltip.bodyColor' => '#333333',
        'tooltip.titleColor' => '#666666',
        'tooltip.caretSize' => 0,
        'title.align'=>'start',
        'title.font.size'=>'20pt',
        'aspectRatio' => 2
    ];

    protected $colors=[
        "255, 99, 132",
        "54, 162, 235",
        "255, 205, 86",
        "0, 0, 132"
    ];

    /**
     * Class constructor.
     */
    public function __construct($options=[])
    {
        parent::__construct($options);
        
        $faker = FakerFactory::create();
        $numseries=$faker->numberBetween(1,4);
        $numdata=$faker->numberBetween(3,8);
        
        for($i=0;$i<$numseries; $i++){
            $dataset=$this->addDataset("Serie " .($i+1), null, [
                'borderColor'=>'rgb('.$this->colors[$i].')',
                'backgroundColor'=>'rgba('.$this->colors[$i].',0.3)',
                'fill'=>'origin'
            ]);

            for($j=0;$j<$numdata; $j++){
                
                $this->addValueToDataset($dataset->id, new DatasetValue("Opcio ".($j+1), $faker->numberBetween(100,300)));
            }

        }
        // dd($this);
    }

}