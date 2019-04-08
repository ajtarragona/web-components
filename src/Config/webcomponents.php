<?php

return [
	
	'theme' => 'bootstrap',
	'credits'=> env('APP_CREDITS'),
	'icon'=> env('APP_ICON','globe'),
	'autopublish' => true,
	'demo' =>[
		"tables_prefix" => "ajt",
		"tables" => [
			"items" => 'items',
			"types" => 'types'
		]
	],
	"gmaps" => [
		"api_key" => env("GOOGLE_MAPS_API_KEY"),
		"default_zoom" => env("GOOGLE_MAPS_DEFAULT_ZOOM"),
		"tgn_coords" => env("GOOGLE_MAPS_TGN_COORDS"),
	]
	
];

