<?php

namespace Ajtarragona\WebComponents\Models\Charts;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;


class DemoChart extends LineChart
{   

    public $id="demo_chart";

    protected $options = [
        'title.text'=>"Demo chart",
        'title.display'=> true,
        // 'aspectRatio'=>1,
        "datalabels.display" => false
       
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
        $faker = FakerFactory::create();
        parent::__construct($options);
       
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