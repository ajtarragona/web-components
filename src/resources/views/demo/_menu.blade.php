@nav([
	'items' => [	
		[
			"title" => __('tgn::demo.Home'),
			"route" => 'webcomponents.demo',
			'icon' => 'home'
		],
		[
			"title" => __('tgn::demo.Items'),
			"route" => 'webcomponents.demo.items.index',
			'icon' => 'box'
		],
		[
			"title" => __('tgn::demo.Types'),
			"route" => 'webcomponents.demo.types.index',
			'icon' =>'cog'
		]

	],
	"navigation"=> 'drilldown',
	'id'=>'main-menu',
	'class'=>'nav-dark',
	'fullwidth'=>true

])