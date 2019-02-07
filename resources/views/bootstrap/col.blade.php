<div 
	@isset($id) id="{{$id}}" @endif

	class="@if(isset($size))col-sm-{{ $size }} @else col @endif {{ $class or '' }} " 
	style="{{ $style or '' }}" 
 	{!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}
>
	{{ $slot }}
</div>