<?php

namespace Ajtarragona\WebComponents\Models\Charts\Examples;

use Ajtarragona\WebComponents\Models\Charts\DatasetValue;
use Ajtarragona\WebComponents\Models\Charts\LineChart;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;


class DemoChart extends LineChart
{   

    protected $palette="default";
    protected $color_mode="dataset";
    

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
                // 'fill'=>'origin'
            ]);

            for($j=0;$j<$numdata; $j++){
                
                $this->addValueToDataset($dataset->id, "Opcio ".($j+1), $faker->numberBetween(100,300));
            }

        }
        // dd($this);
    }

}