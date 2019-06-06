@php
	if($errors->has($name)) $containerclass.=' with-feedback is-invalid ';
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
	'class'=>$containerclass. ' form-group-textarea',
	'hasfeedback' => (isset($helptext) && $helptext)
])

	@include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.forms.inputicon')
	
	<div class="flex-grow-1 form-control-container" >
	
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

		>{{ isset($value)?$value:old($name) }}</textarea>
	</div>

	@include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.forms.helptext')

@endformgroup