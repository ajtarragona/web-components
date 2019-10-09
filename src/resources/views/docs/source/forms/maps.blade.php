@gmap([
    "name"=>"map_simple",
])
@gmap([
    "name"=>"map_simple3",
    "zoom"=>10,
    "center" =>"43.3051042,-1.9774373999999852",
    "geolocate"=>false
])


@gmap([
    "zoom" =>12,
    "multiple"=>false,
    "name"=>"map_simple2",
    "addmarkerbtn" => true,
    "placeholder"=>"Buscador",
    "addmarkerbtntext"=>"Dale!",
    "icon" => "search",
    "height"=>"600px",
    "markers"=>[
        [
            "name"=>"Avinguda Prat de la Riba",
            "location"=> [
                "lat"=>41.1176215,
                "lng"=>1.2460229000000709
            ]
        ]
    ]
    
])


@gmap([
    "zoom" =>14,
    "multiple"=>true,
    "name"=>"map_multiple",
    "search"=>false,
    "addmarkerbtn" => true,
    "animation" => false,
    "cluster" => true,
    "markers"=>[
        [
            "name"=>"Avinguda Prat de la Riba",
            "location"=> [
                "lat"=>41.1176215,
                "lng"=>1.2460229000000709
            ]
        ],
        [
            "name"=>"Pere Martell 49",
            "infobox"=>"Pere Martell 49",
            "location"=> [
                "lat"=>41.1126923, 
                "lng"=>1.242945500000019
            ]
        ]
    ],
    "controls" =>[
        "zoom" => false,
        "mapType"=> true,
        "scale"=> true,
        "streetView" => true,
        "rotate" => true,
        "fullscreen"=> false,

    ]
    
])


@gmap([
    "zoom" =>12,
    "readonly"=>true,
    "multiple"=>false,
   "markers"=>[
        [
            "name"=>"Avinguda Prat de la Riba",
            "location"=> [
                "lat"=>41.1176215,
                "lng"=>1.2460229000000709
            ]
        ]
    ]
    
])


@gmap([
    "multiple"=>true,
    "readonly"=>true,
    "size" => "300x300",
    "markers"=>[
        [
            "name"=>"Avinguda Prat de la Riba",
            "location"=> [
                "lat"=>41.1176215,
                "lng"=>1.2460229000000709
            ]
        ],
        [
            "name"=>"Pere Martell 49",
            "infobox"=>"Pere Martell 49",
            "location"=> [
                "lat"=>41.1126923, 
                "lng"=>1.242945500000019
            ]
        ]
    ]
    
]) 