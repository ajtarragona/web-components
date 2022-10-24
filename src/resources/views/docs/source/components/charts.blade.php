<div class="row mb-3">
    <div class="col-sm-6">
        @chart("doughnut",[
            [   
                "data"=>[
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"A",
                        "backgroundColor"=>"rgb(255, 99, 132)"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"B",
                        "backgroundColor"=>"rgb(54, 162, 235)"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"C",
                        "backgroundColor"=>"rgb(255, 205, 86)"
                    ]
                ]
            ]
        ],[
            // "legend.display"=>false,
            "title.display"=>true,
            "title.text"=>"Random donut chart",
            'cutout'=>'30%',
            'css_class'=>'border bg-secondary',
            'id'=>'Chartdonut123',
            'title.color'=>'#ffffff',
            'borderColor'=>'#55595c',
            'legend.labels.color'=>'#ffffff',
            "suffix" =>"€"

        ])
    </div>
    
    <div class="col-sm-6">

        @chart("pie",[
            [   
                "data"=>[
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"A",
                        "backgroundColor"=>"rgb(255, 99, 132)"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"B",
                        "backgroundColor"=>"rgb(54, 162, 235)"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"C",
                        "backgroundColor"=>"rgb(255, 205, 86)"
                    ]
                ]
            ]
        ],[
            "legend.display"=>true,
            "legend.position"=>"left",
            "title.display"=>true,
            "title.text"=>"Random pie chart",
            'borderWidth'=>5,
            'css_class'=>'border',
            "datalabels.display"=>false,
            
        ])
    </div>
    <div class="col-sm-6">

        @chart("polarArea",[
            [   
                "data"=>[
                    [
                        "data"=>$faker->numberBetween(10,100),
                        "label"=>"A",
                        "backgroundColor"=>"rgb(255, 99, 132)"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,100),
                        "label"=>"B",
                        "backgroundColor"=>"rgb(54, 162, 235)"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,100),
                        "label"=>"C",
                        "backgroundColor"=>"rgb(255, 205, 86)"
                    ]
                ]
            ]
        ],[
            "legend.display"=>true,
            "legend.position"=>"left",
            "title.display"=>true,
            'css_class'=>'border',
            "title.text"=>"Random polar chart",
            'borderWidth'=>5,
            "aspectRatio"=>1
            
        ])
    </div>

    <div class="col-sm-6">

        @chart("radar",[
            [   
                "data"=>[
                    [
                        "data"=>$faker->numberBetween(10,100),
                        "label"=>"A"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,100),
                        "label"=>"B"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,100),
                        "label"=>"C"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,100),
                        "label"=>"D"
                    ]
                ],
                "borderColor"=>"rgb(255, 99, 132)",
                "backgroundColor"=>"rgba(255, 99, 132,0.4)"

            ],
            
            [   
                "data"=>[
                    [
                        "data"=>$faker->numberBetween(10,100),
                        "label"=>"A"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,100),
                        "label"=>"B"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,100),
                        "label"=>"C"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,100),
                        "label"=>"D"
                    ]
                ],
                "borderColor"=>"rgb(54, 162, 235)",
                "backgroundColor"=>"rgba(54, 162, 235,0.4)"

            ],
        ],[
            "legend.display"=>false,
            "legend.position"=>"left",
            "title.display"=>true,
            "title.text"=>"Random radar chart",
            'css_class'=>'border',
            "aspectRatio"=>1,
            
            
        ])
    </div>
</div>
<div class="row  mb-3">
    <div class="col-sm-12">
        @chart("line",[
            [   
                "label"=> "Serie 1",
                "data"=>[
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"1r T",
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"2n T",
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"3r T",
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"4t T",
                  ]
                ],
                "borderColor"=>'rgb(75, 192, 192)',
                'backgroundColor'=>'rgba(75, 192, 192,0.4)',
                'fill' =>1,
                'pointStyle' => 'star',
                'pointRadius' =>10
            ],
            [   
                "label"=> "Serie 2",
                "data"=>[
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"1r T",
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"2n T",
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"3r T",
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"4t T",
                  ]
                ],
                "borderColor"=>'rgb(0, 0, 192)',
                // "tension"=> 0.2,
                'backgroundColor'=>'rgba(0, 0, 192,0.4)',
                'fill' =>'origin',
                'pointStyle' => 'triangle',
                'pointRadius' =>10

      

            ]
        ],[
            "legend.display"=>true,
            "legend.position"=>"left",
            "title.display"=>true,
            "title.text"=>"Random line chart",
            'borderWidth'=>3,
            "tension"=> 0.4,
            'css_class'=>'border',
            "tooltip.usePointStyle"=>true,
            "animations"=>[
                "tension" => [
                    "duration" => 1000,
                    "easing" => 'linear',
                    "from" => 0.5,
                    "to" => 0,
                    "loop" => true
                ],
                "borderWidth" => [
                    "duration" => 1000,
                    "easing" => 'easeOut',
                    "from" => 10,
                    "to" => 1,
                    "loop" => true
                ]
            ]
        ])
    </div>

    <div class="col-sm-12">
        @chart("bar",[
            [   
                "label"=> "Serie 1",
                "data"=>[
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"1r T",
                        'backgroundColor'=>'#ffff00'

                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"2n T",
                        'backgroundColor'=>'#ff00ff',

                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"3r T",
                        'backgroundColor'=>'#00ff00',
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"4t T",
                        'backgroundColor'=>'#0000ff',

                  ]
                ],
                'backgroundColor'=>'rgb(0, 0, 192)'

            ],
            [   
                "label"=> "Serie 2",
                "data"=>[
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"1r T",
                        'backgroundColor'=>'#ffff00'

                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"2n T",
                        'backgroundColor'=>'#ff00ff',

                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"3r T",
                        'backgroundColor'=>'#00ff00',
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"4t T",
                        'backgroundColor'=>'#0000ff',

                  ]
                ],
                'backgroundColor'=>'rgb(0, 0, 192)'

            ]
        ],[
            "legend.display"=>false,
            "title.display"=>true,
            "title.text"=>"Random Bar chart",
            'borderWidth'=>0,
            'css_class'=>'border',
            "datalabels.color"=>'#333333',
            'suffix' => '%',
            // "tooltip.suffix"=>"%",
            // "tooltip.prefix"=>"$",
            "datalabels.display"=>true,
            // "datalabels.suffix"=>"%",
            "scales.x.title.display"=>true,
            "scales.x.title.text"=>"Trimestres",
            "scales.y.title.display"=>true,
            "scales.y.title.text"=>"Money",
            "scales.y.title.color"=>"red",
            "scales.x.title.color"=>"blue",
            // "scales.y.ticks.suffix"=>"%",
            // "scales.x.ticks.prefix"=>"TRIMESTRE",
            

        ])
    </div>
    <div class="col-sm-12">
        @chart("bar",[
            [   
                "label"=> "Serie 1",
                "data"=>[
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"1r T",

                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"2n T",

                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"3r T",
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"4t T",

                  ]
                ],
                'backgroundColor'=>'rgb(54, 162, 235)'

            ],
            [   
                "label"=> "Serie 2",
                "data"=>[
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"1r T",

                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"2n T",

                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"3r T",
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"4t T",

                  ]
                ],
                'backgroundColor'=>'rgb(255, 99, 132)'

            ],
            [   
                "label"=> "Serie 3",
                "data"=>[
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"1r T",

                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"2n T",

                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"3r T",
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"4t T",

                  ]
                ],
                'borderColor'=>'rgb(255, 205, 86)',
                'borderWidth'=>2,
                'backgroundColor'=>'rgba(255, 205, 86,0.4)'

            ]
        ],[
            "stacked"=>true,
            'horizontal'=>true,
            "legend.display"=>true,
            "title.display"=>true,
            "title.text"=>"Random Bar stacked chart",
            'css_class'=>'border',
            'borderWidth'=>0,
            "datalabels.color"=>'#333333',

        ])
    </div>
</div>
<div class="row  mb-3">
    <div class="col-sm-12">
        @chart("bubble",[
            [   
                "label"=> "Serie 1",
                "data"=>[
                    [
                        "data"=> [ 
                            "x"=>$faker->numberBetween(10,50),
                            "y"=>$faker->numberBetween(10,50),
                            "r"=>$faker->numberBetween(2,50),
                            'backgroundColor'=>'rgb(0, 0, 132)'
                        ]                               
                    ],
                    [
                        "data"=> [ 
                            "x"=>$faker->numberBetween(10,50),
                            "y"=>$faker->numberBetween(10,50),
                            "r"=>$faker->numberBetween(2,50),
                        ]                               
                    ],  
                    [
                        "data"=> [ 
                            "x"=>$faker->numberBetween(10,50),
                            "y"=>$faker->numberBetween(10,50),
                            "r"=>$faker->numberBetween(2,50),
                        ]                               
                    ],          
                    [
                        "data"=> [ 
                            "x"=>$faker->numberBetween(10,50),
                            "y"=>$faker->numberBetween(10,50),
                            "r"=>$faker->numberBetween(2,50),
                        ]                               
                    ]
                ],
                'backgroundColor'=>'rgb(255, 99, 132)'

            ],
            [   
                "label"=> "Serie 2",
                "data"=>[
                    [
                        "data"=> [ 
                            "x"=>$faker->numberBetween(10,50),
                            "y"=>$faker->numberBetween(10,50),
                            "r"=>$faker->numberBetween(2,50),
                        ]                               
                    ],
                    [
                        "data"=> [ 
                            "x"=>$faker->numberBetween(10,50),
                            "y"=>$faker->numberBetween(10,50),
                            "r"=>$faker->numberBetween(2,50),
                        ]                               
                    ],  
                    [
                        "data"=> [ 
                            "x"=>$faker->numberBetween(10,50),
                            "y"=>$faker->numberBetween(10,50),
                            "r"=>$faker->numberBetween(2,50),
                        ]                               
                    ],          
                    [
                        "data"=> [ 
                            "x"=>$faker->numberBetween(10,50),
                            "y"=>$faker->numberBetween(10,50),
                            "r"=>$faker->numberBetween(2,50),
                        ]                               
                    ]
                ],
                'backgroundColor'=>'rgb(75, 192, 192)'

            ]
        ],[
            "legend.display"=>false,
            'css_class'=>'border',
            "title.display"=>true,
            "title.text"=>"Random Bubble chart",
            'prefix' => '$',
            'datalabels.font.weight'=>'bold',
            'datalabels.color'=>'#ffffff'
            
                
        ])
    </div>
    <div class="col-sm-12">
        @php
            $numseries=2;
            $colors=['rgb(255, 99, 132)','rgb(75, 192, 192)'];
            $numdata=$faker->numberBetween(20,100);

            $datasets=[];
            for($i=0;$i<$numseries;$i++){
                $data=[];
                for($j=0;$j<$numdata;$j++){
                    $data[]=
                        [
                            "data"=> [ 
                                "x"=>$faker->numberBetween(10,50),
                                "y"=>$faker->numberBetween(10,50),
                            ]                               
                        ];
                }
                $datasets[]=[
                    "label"=> "Serie ".($i+1),
                    "data" =>$data,
                    'backgroundColor'=>$colors[$i]
                ];
            }
            // dump($datasets);
        @endphp
        @chart("scatter",$datasets,[
            "legend.display"=>true,
            "title.display"=>true,
            'css_class'=>'border',
            "title.text"=>"Random Scatter chart",
                
           
        ])
    </div>
</div>