<div 
	@isset($id) id="{{$id}}" @endif
	class="row {{ isset($class)?$class:'' }}" 
 	{!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}

	style="{{ isset($style)?$style:'' }}" 
>
	{{ $slot }}
</div>