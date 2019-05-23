<div 
	@isset($id) id="{{$id}}" @endif

	class="input-group {{ isset($class)?$class:''  }} @isset($size) input-group-{{ $size }}  @endif "
		
		{!! html_attributes(isset($attributes)?$attributes:false) !!}
   		{!! html_attributes(isset($data)?$data:false,'data') !!}
		
>
	{{ $slot }}
</div>