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

	<textarea 
		id="{{$id}}"
	    name="{{ $name }}" 
		class="{{ $class  }}" 
		@istrue($required ,'required="required"')
		@istrue($disabled ,'disabled="true"')
		@istrue($readonly ,'readonly="true"')
		title="{{ $title }}" 
		placeholder="{{ $placeholder }}" 
		rows="{{ $rows  }}"

		{!! renderAttributes($attributes, $hiddenattributes) !!} 
		{!! renderData($data) !!}

	>{{ $value or old($name) }}</textarea>
	
	@include('ajtarragona-web-components::bootstrap.forms.helptext')

@endformgroup