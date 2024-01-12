 
@gmap([
    "name"=>"map_simple",
    
])


@gmap([
    "name"=>"map_simple3",
    "zoom"=>10,
    "addmarkerbtn" => false,
    "center" =>"43.3051042,-1.9774373999999852",
    "geolocate"=>false,
    'maptype'=>'hybrid',
    "readonly"=>false,
    
])


@gmap([
    "zoom" =>12,
    "multiple"=>true,
    "name"=>"map_simple2",
    "id"=>"iddelcampo",
    "placeholder"=>"Buscador",
    "addmarkerbtntext"=>"Dale!",
    "icon" => "search",
    "height"=>"600px",
    "label"=>"Titol camp",
    "sidelabel"=>false,
    "helptext"=>"lalala",
    "readonly"=>true,
    "fitbounds"=>true,
    "show-infobox" =>true,
    "cluster" => true,
   
    "value"=>[
        [
            "name"=>"Avinguda 'Prat de la Riba",
            
            "location"=> [
                "lat"=>41.11826840786932,
                "lng"=>1.2491561674552365
            ],
            "infobox" => "<h5>Títol</h5><div>Infobox amb HTML i <strong>apostrofs</strong> 'simples'  i \"dobles\"</div> ",
        ],
        [
            "location"=> [
                "lat"=>41.1176215,
                "lng"=>1.2460229000000709
            ],
            // "infobox" => route('webcomponents.markerinfobox',['id'=>1]),

        ],
        [
            "location"=> [
                "lat"=>41.1176215,
                "lng"=>1.2460229000000709
            ],
        ],
        [
            "location"=> [
                "lat"=>41.1176215,
                "lng"=>1.2460229000000709
            ],
        ]
    ]
    
])

<hr class="big"/>

<h5>Marcadors personalitzats</h5>
<p>Si activem el paràmetre <code>custommarkers</code> podem fer servir marcadors customitzats.</p>
<p>Per a cada marcador, podem definir els següents atributs:</p>
<ul>
    <li><code>shape</code>: Defineix la forma (MAP_PIN,MAP_PIN_HOLE,MAP_PIN_ALT,SQUARE_PIN, SHIELD, ROUTE, SQUARE, SQUARE_ROUNDED, CIRCLE, CIRCLE_PIN)</li>
    <li><code>backgroundcolor</code>: Defineix el color de fons del marcador (hexadecimal)</li>
    <li><code>borderwidth</code>: Mida de la vora</li>
    <li><code>bordercolor</code>: Color de la vora</li>
    <li><code>label</code>: etiqueta a mostrar. </li>
    <li><code>labelposition</code>: Posició de l'etiqueta: internal o external</li>
    <li><code>icon</code>: nom fontawesome de la icona</li>
    <li><code>color</code>: color de l'etiqueta o icona</li>
    <li><code>opacity</code>: Transparència de la icona (entre 0 i 1)</li>
    <li><code>scale</code>: Escala. És un multiplicador. És a dir que escala 1 és la mida normal, 2 el doble, 0.5 la meitat, etc.</li>
</ul>

@gmap([
    "name"=>"map_custom_1",
    'custommarkers'=>true,
    'markeroptions'=>[
        // 'shape'=>'SHIELD',
        "icon" => 'far fa-star',
        'color' => "#ffff00",
        'bordercolor'=>'#00ff00',
        'borderwidth'=>2,
        "backgroundcolor" => '#ff4499',
        // 'opacity'=>0.5,
        // 'scale'=>3
    ],
    "markers"=>[
        [
            "name"=>"Avinguda Prat de la Riba",
            "infobox"=>"Avinguda Prat de la Riba",
            "location"=> [
                "lat"=>41.1176215,
                "lng"=>1.2460229000000709
            ]
        ],
    ]
])

@gmap([
    "zoom" =>14,
    "multiple"=>true,
    "name"=>"map_multiple",
    "search"=>true,
    'placeholder'=>"Busca ubicació!",
    "addmarkerbtn" => true,
    "animation" => true,
    "cluster" => true,
    "fitbounds" => true,
    "custommarkers"=>true,
    "inputicon" => "search",
    "color"=>"success",
    "markers"=>[
        [
            "name"=>"Avinguda Prat de la Riba",
            "infobox"=>"Avinguda Prat de la Riba",
            "location"=> [
                "lat"=>41.1176215,
                "lng"=>1.2460229000000709
            ],
            "icon" => 'far fa-star',
            'color' => "#ffffff",
            'bordercolor'=>'#ffff00',
            'borderwidth'=>3,
            "backgroundcolor" => '#ff4499',
            // 'label'=>'<i class="fas icon fa-star">mierda</i>',
            // 'labelposition'=>"external"
            // 'shape' => 'SQUARE_PIN'
        ],
        [
            "name"=>"Pere Martell 49",
            "infobox"=>"Pere Martell 49",
            "location"=> [
                "lat"=>41.1126923, 
                "lng"=>1.242945500000019
            ],
            "label" => "1",
            'color' => "#ffffff",
            'backgroundcolor' => "#0066ff",
            "opacity"=>0.5,
            'shape' => 'CIRCLE_PIN',
            
        //     'labelposition'=>"external"
            
        ],
        [
            "name"=>"Otro sitio",
            "infobox"=>"Otro sitio",
            "location"=> [
                "lat"=>41.0999623021731, 
                "lng"=>1.133002214129533
            ],
            "label" => "Text llarg",
            "color"=>"#333",
            'shape' => 'CIRCLE',
            'labelposition'=>"external",
            
            
            
        ],
        

    ],
    "controls" =>[
        "zoom" => false,
        "mapType"=> true,
        "scale"=> true,
        "streetView" => true,
        "rotate" => true,
        "fullscreen"=> true,

    ],
    'theme' =>json_decode('[
        {
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f5f5f5"
                }
            ]
        },
        {
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#616161"
                }
            ]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#f5f5f5"
                }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#bdbdbd"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#eeeeee"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#757575"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#e5e5e5"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#9e9e9e"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#ffffff"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#757575"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dadada"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#616161"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#9e9e9e"
                }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#e5e5e5"
                }
            ]
        },
        {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#eeeeee"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#c9c9c9"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#9e9e9e"
                }
            ]
        }
    ]')

    
])

 
<hr/> 

<h4>Como imágen</h4>

@gmap([
    "zoom" =>12,
    "static"=>true,
    "multiple"=>false,
    "mapcontainerclass"=>"mb-3",
    "class"=>"img-fluid img-thumbnail",
    // 'circlesides' => 10,
    "markers"=>[
        [
            "name"=>"Avinguda Prat de la Riba",
            "location"=> [
                "lat"=>41.1176215,
                "lng"=>1.2460229000000709
            ]
        ],
        [
            "type"=>"polygon",
            'bordercolor'=>'#ffff00',
            'backgroundcolor'=>'#ffff00',
            'opacity'=>0.3,
            'borderweight'=>1,
            "path"=> [
                ["lat"=>41.12247630285357, "lng"=> 1.2344448815315445],
                ["lat"=>41.119631345252984, "lng"=> 1.2656872521370133],
                ["lat"=>41.100748047319826, "lng"=> 1.2656872521370133],
            ]
        ],
       
        [
            "type"=>"polyline",
            // 'bordercolor'=>'#00ff00',
            // 'borderweight'=>5,
            "path"=> [
                ["lat"=>41.104366721973975, "lng"=> 1.2641910439247273],
                ["lat"=>41.11264454441927, "lng"=> 1.2727741127723835],
                ["lat"=>41.11962814534913, "lng"=> 1.2710574990028523],
                ["lat"=>41.118593584686224, "lng"=> 1.2827304726356648],
                ["lat"=>41.12583516687488, "lng"=> 1.2823871498817585],
            ]
        ],
        [
            "type"=>"rectangle",
            'bordercolor'=>'#0000ff',
            'backgroundcolor'=>'#0000ff',
            // 'borderweight'=>0,
            // 'opacity'=>1,
            "bounds"=> [
                "east"=> 1.2785078400642202,
                "north"=> 41.13281836412454,
                "south"=> 41.12324997916519,
                "west"=> 1.2517286652595327
            ]
        ],
        [
            "type"=>"circle",
            'bordercolor'=>'#00ff00',
            'backgroundcolor'=>'#00ff00',
            "center"=> ["lat"=> 41.11724518181344, "lng"=> 1.2545549258297095],
            "radius" =>1201.5089211410261 

        ]

    ]
    
])



@gmap([
    "multiple"=>true,
    "static"=>true,
    "width" => "400",
    "height" => "400",
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
        ],
        [
            "name"=>"",
            "location"=> [
                "lat"=>41.0999623021731, 
                "lng"=>1.133002214129533
            ]
        ]
    ]
    
])  
<hr class="big"/>



<h5>Ajax markers</h5>


@gmap([
    "name"=>"map_ajax",
    "zoom"=>config('webcomponents.gmaps.default_zoom'),
    "center" =>config('webcomponents.gmaps.tgn_coords'),
    "geolocate"=>false,
    "fitbounds"=>false,
    "multiple"=>true,
    "cluster"=>true,
    'url' => route('webcomponents.mapmarkers'),
    'method' => 'POST',
    'readonly'=>true,
])

 @gmap([
    "name"=>"map_ajax_2",
    "zoom"=>config('webcomponents.gmaps.default_zoom'),
    "center" =>config('webcomponents.gmaps.tgn_coords'),
    "geolocate"=>false,
    "fitbounds"=>false,
    "multiple"=>true,
    "cluster"=>true,
    'url' => route('webcomponents.mapmarkers'),
    'method' => 'POST',
    'readonly'=>true
])  



 
 @gmap([
    "zoom" =>12,
    "multiple"=>false,
    "center" =>config('webcomponents.gmaps.tgn_coords'),
    "name"=>"map_shapes",
    "search"=>true,
    "label"=>"Amb formes",
    'helptext'=>"Pots esborrar seleccionant la forma o marcador i prement SUPR o DELETE",
    "sidelabel"=>false,
    "shapes"=>[
        'polygon','rectangle','circle','polyline'
    ],
    "shapes_options"=>[
        "borderwidth"=>2,
        "bordercolor"=>"#0000ff",
        "backgroundcolor" =>"#000066",
    ],
    "addmarkerbtn" => true,
    "controls" =>[
        "zoom" => true,
        "mapType"=> true,
        "scale"=> true,
        "streetView" => true,
        "rotate" => true,
        "fullscreen"=> true,

    ],
    'showcoords'=>true
    
])




@gmap([
    "zoom" =>12,
    "multiple"=>true,
    "center" =>config('webcomponents.gmaps.tgn_coords'),
    "name"=>"map_shapes_multi",
    "search"=>true,
    "label"=>"Amb formes multiple",
    "sidelabel"=>true,
    "shapes"=>[
        'polygon','rectangle','circle','polyline'
    ],
    "addmarkerbtn" => false
    ,
    'showcoords'=>true
    
    
])


@gmap([
    "zoom" =>12,
    "multiple"=>true,
    "center" =>config('webcomponents.gmaps.tgn_coords'),
    "name"=>"map_shapes_multi_def_value",
    "search"=>true,
    "label"=>"Amb formes amb valor per defecte",
    "sidelabel"=>true,
    'fitbounds'=>true,
    "shapes"=>[
        'polygon','rectangle','circle','polyline'
    ],
    "addmarkerbtn" => false,
    'showcoords'=>true,
    'markers'=>[
        [
            "name"=>"Avinguda Prat de la Riba",
            
            "location"=> [
                "lat"=>41.1176215,
                "lng"=>1.2460229000000709
            ]
        ],
        [
            "type"=>"polygon",
            'bordercolor'=>'#ffff00',
            'backgroundcolor'=>'#ffff00',
            'opacity'=>0.3,
            'borderweight'=>1,
            "path"=> [
                ["lat"=>41.12247630285357, "lng"=> 1.2344448815315445],
                ["lat"=>41.119631345252984, "lng"=> 1.2656872521370133],
                ["lat"=>41.100748047319826, "lng"=> 1.2656872521370133],
            ]
        ],
       
        [
            "type"=>"polyline",
            // 'bordercolor'=>'#00ff00',
            // 'borderweight'=>5,
            "path"=> [
                ["lat"=>41.104366721973975, "lng"=> 1.2641910439247273],
                ["lat"=>41.11264454441927, "lng"=> 1.2727741127723835],
                ["lat"=>41.11962814534913, "lng"=> 1.2710574990028523],
                ["lat"=>41.118593584686224, "lng"=> 1.2827304726356648],
                ["lat"=>41.12583516687488, "lng"=> 1.2823871498817585],
            ]
        ],
        [
            "type"=>"rectangle",
            'bordercolor'=>'#0000ff',
            'backgroundcolor'=>'#0000ff',
            // 'borderweight'=>0,
            // 'opacity'=>1,
            "bounds"=> [
                "east"=> 1.2785078400642202,
                "north"=> 41.13281836412454,
                "south"=> 41.12324997916519,
                "west"=> 1.2517286652595327
            ]
        ],
        [
            "type"=>"circle",
            'bordercolor'=>'#00ff00',
            'backgroundcolor'=>'#00ff00',
            "center"=> ["lat"=> 41.11724518181344, "lng"=> 1.2545549258297095],
            "radius" =>1201.5089211410261 

        ]
    ]
    
    
])

