<div 
	@isset($id) id="{{$id}}" @endif
	class="row {{ $class or '' }}" 
 	{!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}

	style="{{ $style or '' }}" 
>
	{{ $slot }}
</div>