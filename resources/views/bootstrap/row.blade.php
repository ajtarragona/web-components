<div 
	@isset($id) id="{{$id}}" @endif
	class="row {{ $class or '' }}" 
 	{!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}
	style="{{ $style or '' }}" 
>
	{{ $slot }}
</div>