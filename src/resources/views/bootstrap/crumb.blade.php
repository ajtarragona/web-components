@if($url)
	<a 
		id="{{ $id }}"
		class="{{ $class  }} "
		href="{{ $url }}" >@textAndIcon($name,$icon)</a>

@else
	<li 
		id="{{ $id }}"
		class="{{ $class  }} " > 
			
			@textAndIcon($name,$icon)
			
	</li>
@endif