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

	@include('ajtarragona-web-components::bootstrap.forms.icon')

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
		{!! html_attributes(isset($attributes)?$attributes:false) !!}
   		{!! html_attributes(isset($data)?$data:false,'data') !!}

	>{{ $value or old($name) }}</textarea>
	@include('ajtarragona-web-components::bootstrap.forms.helptext')

@endformgroup