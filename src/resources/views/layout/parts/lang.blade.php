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
						"title" => language_flag(['class'=>'mr-2','style'=>'width:20px'])." ".__('tgn::strings.language :code',['code'=>language()->getCode()]) ,
						"url" => '',
						"children" => $items
					]
				]
				
				
			])
		@endif
	@endif

@endif