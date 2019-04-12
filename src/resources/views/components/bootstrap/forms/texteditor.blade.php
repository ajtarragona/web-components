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
	'class'=>$containerclass,
	'hasfeedback' => (isset($helptext) && $helptext)
])

	@include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.forms.inputicon')


	<div 
		id="{{$id}}"
	    name="{{ $name }}" 
		class="{{ $class  }}" 
		data-placeholder="{{ $placeholder }}"
		data-read-only="{{ (isset($readonly) && $readonly)?"true":"false"}}"
		data-theme="{{ $theme }}"
		data-tools="{{ $toolbar }}"
		
		{!! renderAttributes($attributes, $hiddenattributes) !!} 
		{!! renderData($data) !!}
		>
		{!! $value or old($name) !!}
	</div>

	

	@include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.forms.helptext')

@endformgroup