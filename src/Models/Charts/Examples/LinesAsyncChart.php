<?php

namespace Ajtarragona\WebComponents\Models\Charts\Examples;

use Ajtarragona\WebComponents\Models\Charts\DatasetValue;
use Ajtarragona\WebComponents\Models\Charts\LineChart;
use Ajtarragona\WebComponents\Traits\AsyncChart;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;


class LinesAsyncChart extends LineChart
{   

    use AsyncChart;

    public $id="demo_async_line_chart";
    public $preloader=false;

    
    protected $options = [
        'title.text'=>"Demo async line chart",
        'title.display'=> true,
        'legend.position' =>'right',
        'datalabels.display'=>false,
        'tooltip.backgroundColor' => '#ffffff',
        'tooltip.bodyColor' => '#333333',
        'tooltip.titleColor' => '#666666',
        'tooltip.caretSize' => 0,
        'title.align'=>'start',
        'title.font.size'=>'20pt',
        'aspectRatio' => 2
    ];

 

    protected $numseries;
    protected $numdata;
    public $refresh_rate=5; //seconds


    /**
     * Class constructor.
     */
    public function __construct($options=[])
    {
        parent::__construct($options);
        $faker = FakerFactory::create();
        
        $this->numseries=4;
        $this->numdata=$faker->numberBetween(3,8);
        
    }

    public function reload(){
        $faker = FakerFactory::create();
        // try
        // $this->setOption('title.display', rand(1,2)==1);
        $this->setOption('title.font.size', rand(15,25).'pt');
        
        // dd($this->getRGBColor(0));
        for($i=0;$i<$this->numseries; $i++){
            $dataset=$this->addDataset("Serie " .($i+1), null, [
                'borderColor'=>$this->getRGBColor($i),
                'backgroundColor'=>$this->getRGBAColor($i, 0.2),
                'fill'=>'origin'
            ]);
            // dd($dataset);
            for($j=0;$j<$this->numdata; $j++){
                $this->addValueToDataset($dataset->id, "Opcio ".($j+1), $faker->numberBetween(100,300));
            }

        }
    }

}