@php
	if(!isset($class)) $class="";

	if(isset($name) && $errors->has($name)){
		$class.=' is-invalid ';
	}
	if(isset($hasfeedback) && $hasfeedback){
		$class.=' with-feedback ';
	}
	
@endphp


@if(!isset($container) || (isset($container) && $container))
<div 
	class="form-group 
		{{ $class or '' }} 
		@if(!isset($outlined) || (isset($outlined) && $outlined===true)) outlined @endif 
		@istrue($sidelabel ,'sidelabel') 
		@istrue($disabled ,'disabled') 
		@isset($size) form-group-{{ $size }}  @endif
		@istrue($required ,'required')
	"
	{!! html_attributes(isset($attributes)?$attributes:false) !!}
   		{!! html_attributes(isset($data)?$data:false,'data') !!}
>
@endif
	
	@if(!empty($label))
    	<label for="{{ $id or ''}}" class="col-form-label col-form-label-{{ $size or 'md' }}  ">{{ $label }}</label>
	@endif

	{{ $slot }}


@if(!isset($container) || (isset($container) && $container))
	
    @if(isset($name) && $errors->has($name))
    	<div class="invalid-feedback">
	        {!! $errors->first($name) !!}
	    </div>
	@endif
</div>
@endif
