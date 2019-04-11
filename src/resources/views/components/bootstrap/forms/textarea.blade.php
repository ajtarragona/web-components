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
	'class'=>$containerclass,
	'hasfeedback' => (isset($helptext) && $helptext)
])

	@include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.forms.inputicon')

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
	
	@include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.forms.helptext')

@endformgroup