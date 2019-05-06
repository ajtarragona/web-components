{{-- 	

@button(
	[
		'style'=>'primary',
		'type'=>'button',
		'size'=>'sm',
		'data' =>
		[
			'toggle'=>'collapse',
			'target'=>'#lang-selector-items',
		]
	]
	)
	{!! language_flag(['class'=>'','style'=>'width:20px']) !!}
	@lang('tgn::strings.language :code',['code'=>language()->getCode()])
@endbutton
<div class="collapse bg-dark text-white" id="lang-selector-items">
	@list
		@foreach(language_items() as $item)
			@li(['style'=>'secondary','href'=>$item["url"]])
				{{ $item["title"]}}
			@endli
			
		@endforeach
	@endlist
</div>
 --}}
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
						"url" => '',
						'icon' => language_flag(['class'=>'','style'=>'width:20px']),
						"children" => $items
					]
				]
				
				
			])
		@endif
	@endif

@endif