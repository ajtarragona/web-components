<div class="d-flex flex-grow-1 flex-column">
	<div class="flex-grow-1">
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
			'id'=>'main-menu-ul',
			'class'=>'nav-dark',
			'fullwidth'=>true

		])	
	</div>

	<div clas="mb-0 mt-auto">
		@nav([
			'items' => [	
				[
					"title" => __('Splash'),
					"route" => 'home',
					'icon' => 'globe-europe'
				],
				

			],
			"navigation"=> 'drilldown',
			'id'=>'main-menu-ul',
			'class'=>'nav-dark',
			'fullwidth'=>true

		])	
	</div>
</div>