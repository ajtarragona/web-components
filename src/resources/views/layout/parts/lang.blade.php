@if(function_exists('language'))
	
	@if($items=language_items())
		@if(count($items)>1)
			@nav([
				'id'=>'lang-selector',
				"navigation"=> 'collapse',
				'class'=>'nav-dark',
				'fullwidth'=>true,
				"items"=> [
					[
						"title" => __('tgn::strings.language :code',['code'=>language()->getCode()]) ,
						"icon" => 'language',
						"url" => '',
						"children" => $items
					]
				]
				
				
			])
		@endif
	@endif

@endif