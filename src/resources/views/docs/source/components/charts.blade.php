<div class="row mb-3">
    <div class="col-sm-6">
       
        @chart("doughnut",[
            [   
                "data"=>[
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"A",
                        // "backgroundColor"=>"rgb(255, 99, 132)"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"B",
                        // "backgroundColor"=>"rgb(54, 162, 235)"
                    ],
                    [
                        "data"=>$faker->numberBetween(10,300),
                        "label"=>"C",
                        // "backgroundColor"=>"rgb(255, 205, 86)"
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
            "suffix" =>"€",
            "palette"=>"winter"

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
            "layout.padding.right"=>40,
            "legend.display"=>true,
            "legend.position"=>"left",
            "title.display"=>true,
            "title.text"=>"Random pie chart",
            'borderWidth'=>5,
            'css_class'=>'border',
            "datalabels.labels.0.display"=>true,
            "datalabels.labels.0.anchor"=>"end",
            "datalabels.labels.0.align"=>"end",
            "datalabels.labels.0.color"=>"#ff0000",
            "datalabels.labels.0.content"=>"label",
            "datalabels.labels.0.font.size"=>"20pt",
            "datalabels.labels.1.display"=>true,
            "datalabels.labels.1.anchor"=>"center",
            "datalabels.labels.1.align"=>"center",
            "datalabels.labels.1.color"=>"#ffff00",
            "datalabels.labels.1.content"=>"value",
            "suffix"=>" €",
            
        ])
    </div>
    <div class="col-sm-6">

        @chart("polarArea",[
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
            "aspectRatio"=>1,
            // 'palette'=>'autumn'
            
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
                "borderColor"=>chartColor(0),
                'backgroundColor'=>chartRGBAColor(0, 0.4),
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
                "borderColor"=>chartColor(1),
                // "tension"=> 0.2,
                'backgroundColor'=>chartRGBAColor(1, 0.4),
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
            'palette'=>'winter',
            'color_mode'=>'element'
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
                ]
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
            'palette'=>'green'

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
                            "r"=>$faker->numberBetween(2,50)
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
                ]

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
                ]

            ]
        ],[
            "legend.display"=>false,
            'css_class'=>'border',
            "title.display"=>true,
            "title.text"=>"Random Bubble chart",
            'prefix' => '$',
            'datalabels.font.weight'=>'bold',
            'datalabels.color'=>'#ffffff',
            'palette'=>'winter'
                
        ])
    </div>
    <div class="col-sm-12">
        @php
            $numseries=2;
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
                    "data" =>$data
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