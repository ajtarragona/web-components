<?php

return [
	
	'theme' => 'bootstrap',
	'credits'=> env('APP_CREDITS'),
	'icon'=> env('APP_ICON','globe'),
	'login_bg'=> env('APP_LOGIN_BG','vendor/ajtarragona/img/default-login-bg.jpg'),
	'login_theme'=> env('APP_LOGIN_THEME',false),
	'autopublish' => true,
	'language' => [
		'enabled' => env('APP_LANGUAGE_SELECTOR',false)
	],
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

