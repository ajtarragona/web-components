<div 
	@isset($id) id="{{$id}}" @endif

	class="@if(isset($size))col-sm-{{ $size }} @else col @endif {{ $class or '' }} " 
	style="{{ $style or '' }}" 
 	 {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}

>
	{{ $slot }}
</div>