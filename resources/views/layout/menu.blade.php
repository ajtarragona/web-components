{{-- @php
	$items=[	
		[
			"title" => __('Home'),
			"icon" => 'home',
			"route" => 'home'
		]
	];

	// dump($items);

@endphp

@nav([
	"navigation"=> 'drilldown',
	'id'=>'main-menu',
	'class'=>'nav-dark',
	"items"=> $items,
	"data" => [
		"opened"=> $currentpath
	]
	
])


 --}}