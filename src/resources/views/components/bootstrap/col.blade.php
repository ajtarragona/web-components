<div 
	@isset($id) id="{{$id}}" @endif

	class="@if(isset($size))col-md-{{ $size }} @else col @endif {{ isset($class)?$class:'' }} " 
	style="{{ isset($style)?$style:'' }}" 
 	 {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}

>
	{{ $slot }}
</div>