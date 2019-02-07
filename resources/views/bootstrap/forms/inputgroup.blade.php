<div 
	@isset($id) id="{{$id}}" @endif

	class="input-group {{ $class or '' }} @isset($size) input-group-{{ $size }}  @endif "
	{!! html_attributes(isset($attributes)?$attributes:false) !!}
   		{!! html_attributes(isset($data)?$data:false,'data') !!}
>
	{{ $slot }}
</div>