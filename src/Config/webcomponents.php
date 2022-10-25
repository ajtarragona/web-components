<?php

return [
	
	'theme' => 'bootstrap',
	'credits'=> env('APP_CREDITS'),
	'icon'=> env('APP_ICON','globe'),
	'login_bg'=> env('APP_LOGIN_BG','vendor/ajtarragona/img/default-login-bg.jpg'),
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
	],
	"charts" => [
		"palettes" =>[
            "default" =>["#36a2eb","#ff6384","#ffcd56","#3ed9c9","#ceec97","#f4b393","#fc60a8","#7a28cb","#494368","#ed254e","#f9dc5c","#f4fffd","#011936","#465362"],
            "autumn" => ["#a4243b","#d8c99b","#d8973c","#bd632f","#273e47","#ffbf41", "#e1f2fe", "#b2b1cf", "#77625c", "#49392c"],
            "winter" => ["#36A2FF","#C781FF","#9EC7FF","#63C7FF","#63A3FF","#704AFF","#7F4AFF","#7F4FFF","#807DFF","#4A7FFF"],
			"blue" => ["#36a2eb","#5baced","#76b6f0","#8dc0f2","#a2caf5","#b6d4f7","#c9dff9","#dbeafb","#edf4fd","#ffffff"],
			"red" => ["#ed476a","#f26079","#f77789","#fb8b99","#fe9fa9","#ffb3ba","#ffc6cb","#ffd9dc","#ffeced","#ffffff"],
			"orange" => ["#ffcd56","#ffd26a","#ffd87e","#ffdd90","#ffe3a3","#ffe8b5","#ffeec8","#fff3da","#fff9ec","#ffffff"],
			"green" => ["#3ed9a0","#5fdeaa","#78e2b5","#8ee7bf","#a3ebc9","#b6f0d4","#c9f4df","#dbf8e9","#edfbf4","#ffffff"],

        ]
	]
	
];

