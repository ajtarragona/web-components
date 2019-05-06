<ul 
	id="{{ $id }}"
	class="{{ $class  }} " 
	{!! renderAttributes($attributes, $hiddenattributes) !!} 
	{!! renderData($data) !!}
	>
	
	@foreach($items  as $item)
		@navitem($item)
	@endforeach
</ul>