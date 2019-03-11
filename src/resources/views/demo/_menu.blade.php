@nav([
	'items' => [	
		[
			"title" => __('Home'),
			"route" => 'webcomponents.demo',
			'icon' => 'home'
		],
		[
			"title" => __('Items'),
			"route" => 'webcomponents.demo.items.index',
			'icon' => 'box'
		],
		[
			"title" => __('Types'),
			"route" => 'webcomponents.demo.types.index',
			'icon' =>'cog'
		]

	],
	"navigation"=> 'drilldown',
	'id'=>'main-menu',
	'class'=>'nav-dark',
	'fullwidth'=>true

])