@php
	if($errors->has($name)) $containerclass.=' is-invalid ';
@endphp

@formgroup([
	'container'=> $container,
	'label'=> $label,
	'sidelabel'=> $sidelabel,
	'name'=>$name, 
	'disabled'=> $disabled, 
	'required'=> $required, 
	'outlined'=> $outlined, 
	'id'=> $id, 
	'size'=> $size, 
	'class'=>$containerclass
])

	@include('ajtarragona-web-components::bootstrap.forms.inputicon')
	
	<input 
		id="{{$id}}"
	    type="{{ $type }}" 
		name="{{ $name }}" 
		class="{{ $class  }} " 
		value="{{ $value or old($name) }}" 
		@istrue($required ,'required="required"')
		@istrue($disabled ,'disabled="true"')
		@istrue($readonly ,'readonly="true"')
		@istrue($multiple ,'multiple="true"')
		title="{{ $title }}" 
		placeholder="{{ $placeholder }}" 
		

		{!! renderAttributes($attributes, $hiddenattributes) !!} 
		{!! renderData($data) !!}

	/>
	@include('ajtarragona-web-components::bootstrap.forms.helptext')


@endformgroup