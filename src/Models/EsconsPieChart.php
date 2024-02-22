<?php

namespace Ajtarragona\WebComponents\Models;

use App\Models\Oracle\Participacio;
use App\Models\Oracle\Partit;
use Ajtarragona\Charts\Models\DoughnutChart;
use Ajtarragona\Charts\Traits\AsyncChart;

class EsconsPieChart extends DoughnutChart
{
    
    // use AsyncChart;

    public $id="escons_chart";
    public $year;
    public $refresh_rate=2; //seconds
    public $preloader=false;

    protected $options = [
        'layout.padding' => 0,
        'legend.display' =>false,
        'legend.position' =>'right',
        // 'borderWidth'=>10,
        // 'borderColor'=>'red'
        'title.display'=>false,
        // 'title.text'=>"HOLA",
        "datalabels"=> [
            "font"=>[
                "weight"=>'bold',
                "family"=>'system-ui'
            ],
            "labels" =>[
                "valor"=>[
                    "backgroundColor"=>'#ffffff',
                    "borderRadius"=>20,
                    "padding"=>5,
                    "color"=>'#333333',
                    "display"=>true,
                    "anchor"=>'center',
                    "align"=>'center',
                    "content"=>"label",
                    'display'=>false
                    
                ],
                "nom"=>[
                    "color"=>'#ffffff',
                    "display"=>true,
                    "content"=>"value",
                    "anchor"=>'center',
                    "align"=>'center',
                    "font"=>[
                        "weight"=>'bold',
                    ]
                    
                ]
            ]
        ],
        'circumference'=>180,
        'rotation'=>-90,
        // 'legend.onClick'=>false,
        'tooltip.backgroundColor' => '#ffffff',
        'tooltip.bodyColor' => '#333333',
        'tooltip.caretSize' => 0,
        'title.position'=>'bottom',
        'title.align'=>'center',
        'title.font.size'=>'20pt',
        'aspectRatio' => 2,
        'tooltip.position' => "average"//"esconsTooltipPositioner"
        
    ];


    /**
     * Class constructor.
     */
    public function __construct($options=[])
    {
        
        
        parent::__construct($options);
        
       
        $numescons=27;
        $this->setOption('title.text', $numescons . " Escons");
        
        
        

        
        $this->id="escons_chart_2019";
        
    
        
        $resultats=[
            [
                "partit"=>"PSC-CP",
                "escons"=>7,
                "color"=>"#da0818",
            ],
            [
                "partit"=>"ERC-MES-AM",
                "escons"=>7,
                "color"=>"#ffbf41",
            ],
            [
                "partit"=>"Cs",
                "escons"=>4,
                "color"=>"#f64e02",
            ],
            [
                "partit"=>"JUNTS",
                "escons"=>3,
                "color"=>"#3ed9c9",
            ],
            [
                "partit"=>"ECP-TGN-ECG",
                "escons"=>2,
                "color"=>"#59326c",
            ],
            [
                "partit"=>"CUP-AMUNT",
                "escons"=>2,
                "color"=>"#f7ea00",
            ],
            [
                "partit"=>"PP",
                "escons"=>2,
                "color"=>"#0057a4",
            ]
        ];

        // dd($resultats);

        $dataset=$this->addDataset("Eleccions 2019", collect());

        foreach($resultats as $resultat){
            // dd($resultat);
            $color=$resultat["color"];

            $this->addValueToDataset($dataset->id, $resultat["partit"], $resultat["escons"] ,  [
                'backgroundColor'=>$color,
            ]);
        }

        
    }
}