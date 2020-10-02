
{{-- @gmap([
    "name"=>"map_simple",
])


@gmap([
    "name"=>"map_simple3",
    "zoom"=>10,
    "addmarkerbtn" => false,
    "center" =>"43.3051042,-1.9774373999999852",
    "geolocate"=>false,
    'maptype'=>'hybrid'
])


@gmap([
    "zoom" =>12,
    "multiple"=>false,
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
    "value"=>
        [
            "name"=>"Avinguda 'Prat de la Riba",
            "location"=> [
                "lat"=>41.1176215,
                "lng"=>1.2460229000000709
            ],
            "infobox" => "<h5>Títol</h5><div>Infobox amb HTML i <strong>apostrofs</strong> 'simples'  i \"dobles\"</div> ",
        ]
    
    
]) --}}


@gmap([
    "zoom" =>14,
    "multiple"=>true,
    "name"=>"map_multiple",
    "search"=>false,
    "addmarkerbtn" => true,
    "animation" => true,
    "cluster" => true,
    "fitbounds" => true,
    "customicons"=>true,
    "markers"=>[
        [
            "name"=>"Avinguda Prat de la Riba",
            "infobox"=>"Avinguda Prat de la Riba",
            "location"=> [
                "lat"=>41.1176215,
                "lng"=>1.2460229000000709
            ],
            "icon" => 'ambulance',
            'iconcolor' => "#ffff00",
            "color" => '#ff4499'
        ],
        [
            "name"=>"Pere Martell 49",
            "infobox"=>"Pere Martell 49",
            "location"=> [
                "lat"=>41.1126923, 
                "lng"=>1.242945500000019
            ],
            "icon" => 'circle',
            
        ]
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

{{-- 
<hr/>

<h4>Como imágen</h4>

@gmap([
    "zoom" =>12,
    "static"=>true,
    "multiple"=>false,
    "mapcontainerclass"=>"mb-3",
    "class"=>"img-fluid img-thumbnail",
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
    
])  --}}


<h5>Ajax markers</h5>
{{-- @dump(config('webcomponents.gmaps.tgn_coords')); --}}

@gmap([
    "name"=>"map_ajax",
    "zoom"=>config('webcomponents.gmaps.default_zoom'),
    "center" =>config('webcomponents.gmaps.tgn_coords'),
    "geolocate"=>false,
    "fitbounds"=>false,
    "multiple"=>true,
    "cluster"=>true,
    'url' => route('webcomponents.mapmarkers'),
    'method' => 'POST'
])
