@if(isset($item["separator"]) && $item["separator"])
	<hr/>
@else

	<li 
		id="{{ $id }}"
		class="{{ $class  }} " > 
			 {{-- @dump($item)  --}}
			 {{-- @dump($navigation) --}}


		@if($url=$object->getUrl())
		
			<a href='{{ $url }}' title="{{ $title }}" data-placement='right' class='{{ $linkclass }}' >
			
		@else
			<span title="{{ $title }}" data-placement='right' class='{{ $linkclass }}'>
		@endif
		
		
		@textAndIcon($title,$icon,$iconoptions)
		

		@if($navigation=="drilldown" && $children)
			 @if($object->hasUrl()) 
			 	<span class='opener'><span class='opener-icon'>@icon('arrow-right')</span></span>
			 @else	
				<span class='opener-icon'>@icon('arrow-right')</span>
			@endif
		@endif
				
		@if($object->hasUrl()) 
			</a>
		@else 
			</span>
		@endif

		@if($children)
			@if($navigation=="collapse" )
			
				<div class='toggler {{ $collapsed?"collapsed":"" }}' aria-expanded='true' data-toggle='collapse' href='#sub{{$id}}' >@icon('angle-up')</div>
				<ul class='subnav collapse {{ $collapsed?"":"in" }} ' aria-expanded='true' id='sub{{$id}}'>
			
			@elseif($navigation=="drilldown")

				<ul id='sub{{$id}}'>
					<li><a href='#' class='back'>@icon('arrow-left') {{ __("Back") }}</a></li>
			@else
				{{-- <span class='caret'></span> --}}
				<div href='#' class='toggler' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' href='#sub{{$id}}'>@icon('angle-up')</div>
				<ul class='dropdown-menu' id='sub{{$id}}'>
			@endif
					@foreach ($children as $key => $item)
						@navitem($item)
					@endforeach

				</ul>
		@endif

		
	</li>

@endif